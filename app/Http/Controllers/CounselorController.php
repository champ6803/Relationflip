<?php

/**
 * Created by PhpStorm.
 * User: Champ
 * Date: 28/6/2560
 * Time: 14:58
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use Illuminate\Database\DatabaseManager;

class CounselorController extends Controller {

    public function counselor() {
        return view('counselor.counselor');
    }

    public function counselorDetail() {
        return view('counselor.counselorDetail');
    }

    public function getSelectedTopic(DatabaseManager $db) {
        $employee_id = $_POST['employee_id'];
        $sqlEvaTopic = "select et.topic_id from evaluation_detail_topic as et
                        where et.eva_id = (SELECT MAX(eva_id) FROM evaluation WHERE employee_id = $employee_id)";
        $evaTopic = $db->select($sqlEvaTopic);
        return response($evaTopic);
    }

    public function getPointTopicPerPerson(DatabaseManager $db) {
        try {
            $sqlTopic = "select * from master_topic";
            $topic = $db->select($sqlTopic);

            $arrayTopic = array();
            for ($i = 1; $i < count($topic); $i++) {
                $sqlCounselingTopic = "select * from counseling_topic as c where c.topic_id = $i";
                $counselingTopic = $db->select($sqlCounselingTopic);
                array_push($arrayTopic, $counselingTopic);
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            return response($msg);
        }
        return response()->json($arrayTopic);
    }

    public function getCounselor(DatabaseManager $db) {
        try {
            $filter = json_decode($_POST['filter']);
            if ($filter != "") {
                $counselor = DB::table('counselor')
                        ->whereIn('counselor_id', $filter)
                        ->orderByRaw("FIELD(counselor_id,$filter[0], $filter[1], $filter[2], $filter[3])")
                        ->get();
            } else {
                $counselor = DB::table('counselor')
                        ->get();
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response($counselor);
    }

    public function getCounselorDetail() {
        try {
            $counselor_id = $_POST['counselor_id'];
            $counselor = DB::table('counselor')->where(['counselor_id' => $counselor_id])->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response($counselor);
    }

    public function updateAppointment(DatabaseManager $db) {
        $next_appointment_date = $_POST['next_appointment_date'];
        $next_appointment_start = $_POST['next_appointment_start'];
        $next_appointment_end = $_POST['next_appointment_end'];
        $appointment_ids = $_POST['appointment_ids'];
        $counselor_id = $_POST['counselor_id'];
        $employee_id = $_POST['employee_ids'];

        try {
            $timetable = DB::table('timetable')
                    ->where('counselor_id', $counselor_id)
                    ->where('date', '=', $next_appointment_date)
                    ->where('start_time', $next_appointment_start)
                    ->where('end_time', $next_appointment_end)
                    ->get();
            $appointment = DB::table('appointment')
                    ->where('counselor_id', $counselor_id)
                    ->where('appointment_date', '=', $next_appointment_date)
                    ->where('start_time', $next_appointment_start)
                    ->where('end_time', $next_appointment_end)
                    ->get();

            if (count($timetable) > 0 && count($appointment) == 0) {
                DB::table('appointment')
                        ->where('appointment_id', $appointment_ids)
                        ->update(['start_time' => $next_appointment_start,
                            'end_time' => $next_appointment_end,
                            'appointment_date' => $next_appointment_date]);
//                $timetable_id = $timetable[0]->timetable_id;
//                DB::table('timetable')->where('timetable_id', '=', $timetable_id)->delete();
            } else {
                return response('fail');
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response('success');
    }

}
