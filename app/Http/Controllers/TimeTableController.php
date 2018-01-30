<?php

/**
 * Created by PhpStorm.
 * User: Champ
 * Date: 30/6/2560
 * Time: 23:14
 */

namespace App\Http\Controllers;

use Faker\DefaultGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use Monolog\Logger as Monolog;
use Illuminate\Log\Writer;
use Illuminate\Database\DatabaseManager;

class TimeTableController extends Controller {

    public function timeTable() {
        return view('timeTable.timeTable');
    }

    public function getTimeTable(DatabaseManager $db) {
//        $eventStr = [{groupId:100, name:"Group Name", events: [{eventId:1, eventName:"Event Name", startTime: "2009-09-25 10:00:00", endTime: "2009-09-25 11:30:00"}] }];
        try {
            $counselor_id = $_POST['counselor_id'];
            $timeTable = DB::table('timetable')->where('counselor_id', $counselor_id)->get();

//            $timeTable = DB::table('round_evaluation')
//                ->join('timetable', 'timetable.round_id', '=', 'round_evaluation.round_id')
//                ->join('company', 'company.company_id', '=', 'round_evaluation.company_id')
//                ->where('timetable.counselor_id', $counselor_id)
//                ->select('company.name as company_name', 'timetable.*', 'round_evaluation.*')
//                ->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json($timeTable);
    }

    public function getAppointmentTimeTable(DatabaseManager $db) {
        try {
            $counselor_id = $_POST['counselor_id'];
            $appointment = DB::table('appointment')->where('counselor_id', $counselor_id)->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json($appointment);
    }

    public function getGroup(DatabaseManager $db) { // company
        try {
            $group = DB::table('company')->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response($group);
    }

    public function saveTimeTable(DatabaseManager $db) {
        try {
            $dateNow = \Carbon\Carbon::now();
            $counselor_id = request()->get('counselor_id');
            $date = request()->get('date');
            $start_time = request()->get('start_time');
            $end_time = request()->get('end_time');

            $sqlCreate = "select timetable_id,create_date from timetable
                          where date= '$date' AND start_time =  '$start_time' AND end_time = '$end_time' AND counselor_id = $counselor_id";
            $infoCreate = $db->select($sqlCreate);

            $create_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date . " " . $start_time)->toDateTimeString();

            $dateNow = strtotime($dateNow) + 2 * 3600;
            $create_date6 = strtotime($create_date);
            if ($dateNow < $create_date6) {
                if (count($infoCreate) > 0) {
                    $timetable_id = $infoCreate[0]->timetable_id;
                    DB::table('timetable')->where('timetable_id', '=', $timetable_id)->delete();
                } else {
                    $timetable_return = DB::table('timetable')->insertGetId(
                            ['counselor_id' => $counselor_id, 'date' => $date, 'start_time' => $start_time, 'end_time' => $end_time,
                                'create_by' => 'admin', 'last_update_by' => 'admin']
                    );
                }
            } else {
                return response('moretime');
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response(count($infoCreate));
    }

    public function findDate(DatabaseManager $db) {
        $dateNow = \Carbon\Carbon::now();
        $counselor_id = request()->get('_counselor_id');
        $dateNow = strtotime($dateNow) + 6 * 3600;
        $date = date("Y-m-d", $dateNow);
        $time = date("H:i:s", $dateNow);

        $timetable = DB::table('timetable')
                ->select(DB::raw('date'))
                ->where('timetable.counselor_id', $counselor_id)
                ->where('timetable.date', '>=', $date)
                ->orderBy('date')
                ->groupBy('date')
                ->get();

        return response()->json($timetable);
    }

    public function findTimeByDateAndCounsel(DatabaseManager $db) {
        // $counselor_id = $_POST['counselor_id'];
        $dateNow = \Carbon\Carbon::now();
        $counselor_id = request()->get('_counselor_id');
        $dateNow = strtotime($dateNow) + 6 * 3600;
        $newDateNow = date("Y-m-d", $dateNow);
        $time = date("H:i:s", $dateNow);

        $date = request()->get('_date');
        $timetable = DB::table('timetable')
                ->where('timetable.counselor_id', $counselor_id)
                ->where('timetable.date', $date)
                ->where('timetable.start_time', '=', $time)
                //->whereRaw('IF (`timetable.date` = $date, `start_time` > $time)')
                ->orderBy('start_time')
                ->get();
        return response()->json($timetable);
    }

    public function selectTimeTableDate(DatabaseManager $db) {
        $counselor_id = request()->get('_counselor_id');
        $appdate = request()->get('_date');

        $date = \Carbon\Carbon::now();
        $employee_id = request()->get('_employee_id');
        $sqlRound = "select r.round_id, d.department_id, c.company_id from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN round_evaluation as r on c.company_id = r.company_id
              where e.employee_id = $employee_id and r.start_date <= '$date' and r.end_meet_date >= '$date'";

        $dateNow = strtotime($date);
        $dateNow = date("Y-m-d", $dateNow);

        $date6 = strtotime($date) + 6 * 3600;
        $newDate6 = date("Y-m-d", $date6);
        $time = date("H:i:s", $date6);

        $infoRound = $db->select($sqlRound);
        $round_id = $infoRound[0]->round_id;

        $appointment = DB::table('appointment')
                ->where('counselor_id', $counselor_id)
                ->where('appointment_date', $appdate)
                ->get();
        $notSelect = array();
        for ($i = 0; $i < count($appointment); $i++) {
            array_push($notSelect, $appointment[$i]->start_time);
        }

        if ($dateNow == $appdate) {
            $timetable = DB::table('timetable')
                    ->where('timetable.counselor_id', $counselor_id)
                    ->where('timetable.date', $appdate)
                    ->where('timetable.start_time', '>', $time)
                    ->whereNotIn('timetable.start_time', $notSelect)
                    ->orderBy('start_time')
                    ->get();
        } else if ($newDate6 == $appdate) {
            $timetable = DB::table('timetable')
                    ->where('timetable.counselor_id', $counselor_id)
                    ->where('timetable.date', $appdate)
                    ->where('timetable.start_time', '>', $time)
                    ->whereNotIn('timetable.start_time', $notSelect)
                    ->orderBy('start_time')
                    ->get();
        } else {
            $timetable = DB::table('timetable')
                    ->where('timetable.counselor_id', $counselor_id)
                    ->where('timetable.date', $appdate)
                    ->whereNotIn('timetable.start_time', $notSelect)
                    ->orderBy('start_time')
                    ->get();
        }
        return view('timeTable.selectTimeTableDate')->with('timetables', json_decode($timetable, true))->with('date', $appdate)->with('counselor_id', $counselor_id);
        //return dd($timetable);
        //return response()->json($timetable);
    }

    public function saveAppointment(DatabaseManager $db) {
        try {
            $counselor_id = request()->get('_counselor_id');
            $appdate = request()->get('_date');
            $starttime = request()->get('_start');
            $endtime = request()->get('_end');

            $date = \Carbon\Carbon::now();
            $employee_id = request()->get('employee_id');
            $sqlRound = "select r.round_id, d.department_id, c.company_id from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN round_evaluation as r on c.company_id = r.company_id
              where e.employee_id = $employee_id and r.start_date <= '$date' and r.end_meet_date >= '$date'";

            $infoRound = $db->select($sqlRound);
            $round_id = $infoRound[0]->round_id;

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id, 'round_id' => $round_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;

            $appointment = DB::table('appointment')
                    ->where('counselor_id', $counselor_id)
                    ->where('appointment_date', $appdate)
                    ->where('start_time', $starttime)
                    ->where('end_time', $endtime)
                    ->get();

            $notSelect = array();
            for ($i = 0; $i < count($appointment); $i++) {
                array_push($notSelect, $appointment[$i]->start_time);
            }


            if (count($appointment) > 0) {
                //return response('exist');
                return response($notSelect);
            } else {
                $result = DB::table('appointment')->insert(
                        ['eva_id' => $eva_id, 'counselor_id' => $counselor_id, 'round_id' => $round_id, 'appointment_date' => $appdate, 'result' => 'W'
                            , 'create_by' => 'admin',
                            'create_date' => $date, 'last_update_by' => 'admin', 'start_time' => $starttime, 'end_time' => $endtime]);
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response('success');
    }

    public function selectDateTable() {
        return view('timeTable.selectDateTable');
    }

}
