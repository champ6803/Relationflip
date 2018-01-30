<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of AppointmentController
 *
 * @author Champ
 */
use Faker\DefaultGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use Monolog\Logger as Monolog;
use Illuminate\Log\Writer;
use Illuminate\Database\DatabaseManager;

class AppointmentController extends Controller {

    public function getClientAppointment(DatabaseManager $db) {
        try {

            $dateNow = \Carbon\Carbon::now();
            $dateNow->modify('-30 day');
            $date = $dateNow->format('Y-m-d');

            $counselor_id = $_POST['counselor_id'];

            $appointment = DB::table('appointment')
                    ->join('evaluation', 'evaluation.eva_id', '=', 'appointment.eva_id')
                    ->join('employee', 'employee.employee_id', '=', 'evaluation.employee_id')
                    ->join('user', 'user.user_id', '=', 'employee.user_id')
                    ->select('appointment.*', 'user.username', 'employee.employee_id', 'employee.phone as ep')
                    ->where('counselor_id', $counselor_id)
                    ->where('appointment.result', '<>', 'N')
                    ->where('appointment.result', '<>', 'R')
                    ->orderByRaw("FIELD(appointment.result,'W','S','P','D')")
                    ->where('appointment.appointment_date', '>', $date)
                    ->get();
        } catch (Exception $e) {
            return response($e->getMessage());
        }
        return response($appointment);
    }

    public function updateStatusAppointment() {
        try {
            $counselor_id = $_POST['counselor_id'];
            $appointment_id = $_POST['appointment_id'];
            $status = $_POST['status'];
            $mail_status = $_POST['mail_status'];

            DB::table('appointment')
                    ->where('appointment_id', $appointment_id)
                    ->update(['result' => $status]);

            DB::table('email_queue')
                    ->where('appointment_id', $appointment_id)
                    ->update(['status' => $mail_status]);
        } catch (Exception $e) {
            return response($e->getMessage());
        }
        return response('success');
    }

    public function getCounselingDetail(DatabaseManager $db) {
        try {
            $employee_id = $_POST['employee_id'];
            $appointment_id = $_POST['appointment_id'];

//            $date = \Carbon\Carbon::now();
//            $sqlRound = "select r.round_id, d.department_id, c.company_id from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN round_evaluation as r on c.company_id = r.company_id
//                          where e.employee_id = $employee_id and r.start_date <= '$date' and r.end_date >= '$date'";
//
//            $infoRound = $db->select($sqlRound);
//            $round_id = $infoRound[0]->round_id;
            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;
            $round_id = $eva[0]->round_id;
            $appointmentAll = DB::table('meeting')
                    ->join('appointment', 'appointment.appointment_id', '=', 'meeting.appointment_id')
                    ->where('appointment.eva_id', $eva_id)
                    ->where('appointment.round_id', $round_id)
                    ->where('meeting.result', '<>', 'E')
                    ->get();

            $appointment = DB::table('appointment')
                    ->where('appointment_id', $appointment_id)
                    ->first();
            $employee = DB::table('employee')
                    ->where('employee_id', $employee_id)
                    ->first();
        } catch (Exception $e) {
            return response($e->getMessage());
        }
        return response()->json(array('appointment' => $appointment, 'employee' => $employee, 'counseling_number' => count($appointmentAll)));
    }

    public function getMeetingRecord(DatabaseManager $db) {
        try {
            $employee_id = $_POST['employee_id'];
            $appointment_id = $_POST['appointment_id'];

            $meetingRecord = DB::table('meeting')
                    ->where('appointment_id', $appointment_id)
                    ->get();

            $employee = DB::table('employee')
                    ->where('employee_id', $employee_id)
                    ->first();
        } catch (Exception $e) {
            return response($e->getMessage());
        }
        return response()->json(array('meetingRecord' => $meetingRecord[0], 'employee' => $employee));
    }

    public function saveCounseling() {
        try {
            $counselor_id = $_POST['counselor_id'];
            $employee_id = $_POST['employee_id'];
            $appointment_id = $_POST['appointment_id'];
            $meet_result = $_POST['meet_result'];
            $counseling_detail = json_decode($_POST['counseling_detail']);
            $counseling_rf_index = json_decode($_POST['counseling_rf_index']);
            $counseling_result = json_decode($_POST['counseling_result']);


            if ($meet_result == 'A') {
                $appointment = DB::table('appointment')
                        ->where('appointment_id', $appointment_id)
                        ->first();

                $timetable = DB::table('timetable')
                        ->where('counselor_id', $counselor_id)
                        ->where('date', '=', $counseling_result->next_appointment_date)
                        ->where('start_time', $counseling_result->next_appointment_start)
                        ->where('end_time', $counseling_result->next_appointment_end)
                        ->get();

                $appointment_same = DB::table('appointment')
                        ->where('counselor_id', $counselor_id)
                        ->where('appointment_date', '=', $counseling_result->next_appointment_date)
                        ->where('start_time', $counseling_result->next_appointment_start)
                        ->where('end_time', $counseling_result->next_appointment_end)
                        ->get();

                if (count($timetable) > 0 && count($appointment_same) == 0) {
//                    $timetable_id = $timetable[0]->timetable_id;
//                    DB::table('timetable')->where('timetable_id', '=', $timetable_id)->delete();
                    DB::table('meeting')->insert(
                            ['appointment_id' => $appointment_id, 'result' => $meet_result, 'round' => $counseling_detail->counseling_number,
                                'counseling_date' => $counseling_detail->counseling_date, 'start_time' => $counseling_detail->start_time,
                                'end_time' => $counseling_detail->end_time, 'match' => $counseling_detail->rf_index, 'reason' => $counseling_detail->other,
                                'argee' => $counseling_detail->counseling_confirm, 'environment' => $counseling_rf_index->environment_work,
                                'corporate_governance' => $counseling_rf_index->organ_manage, 'relationship' => $counseling_rf_index->work_relation,
                                'stability_growth' => $counseling_rf_index->work_stable, 'acceptance' => $counseling_rf_index->self_esteem,
                                'benefits' => $counseling_rf_index->benefit, 'physical_health' => $counseling_rf_index->physical_health,
                                'mental_health' => $counseling_rf_index->mental_health, 'family' => $counseling_rf_index->family,
                                'friend' => $counseling_rf_index->friend, 'financial_security' => $counseling_rf_index->money_stable,
                                'general_problem' => $counseling_result->general_prob, 'problem_survey' => $counseling_result->discover_prob,
                                'troubleshooting' => $counseling_result->fix_prob, 'summary' => $counseling_result->result,
                                'evaluation' => $counseling_result->assessment, 'following_up' => $counseling_result->follow,
                                'suggest_other' => $counseling_result->suggest, 'forwarding' => $counseling_result->refer,
                                'summary_company' => $counseling_result->company_result, 'summary_client' => $counseling_result->client_result,
                                'create_by' => 'admin', 'last_update_by' => 'admin']
                    );
                    DB::table('appointment')
                            ->insert([
                                'eva_id' => $appointment->eva_id, 'counselor_id' => $appointment->counselor_id, 'round_id' => $appointment->round_id,
                                'appointment_date' => $counseling_result->next_appointment_date, 'start_time' => $counseling_result->next_appointment_start,
                                'end_time' => $counseling_result->next_appointment_end, 'result' => 'S',
                                'create_by' => $counselor_id, 'last_update_by' => $counselor_id
                    ]);

                    DB::table('appointment')
                            ->where('appointment_id', $appointment_id)
                            ->update(['result' => 'P']);

                    DB::table('email_queue')
                            ->where('appointment_id', $appointment_id)
                            ->update(['status' => 'Y']);
                } else {
                    return response('fail');
                }
            } else {
                DB::table('meeting')->insert(
                        ['appointment_id' => $appointment_id, 'result' => $meet_result, 'round' => $counseling_detail->counseling_number,
                            'counseling_date' => $counseling_detail->counseling_date, 'start_time' => $counseling_detail->start_time,
                            'end_time' => $counseling_detail->end_time, 'match' => $counseling_detail->rf_index, 'reason' => $counseling_detail->other,
                            'argee' => $counseling_detail->counseling_confirm, 'environment' => $counseling_rf_index->environment_work,
                            'corporate_governance' => $counseling_rf_index->organ_manage, 'relationship' => $counseling_rf_index->work_relation,
                            'stability_growth' => $counseling_rf_index->work_stable, 'acceptance' => $counseling_rf_index->self_esteem,
                            'benefits' => $counseling_rf_index->benefit, 'physical_health' => $counseling_rf_index->physical_health,
                            'mental_health' => $counseling_rf_index->mental_health, 'family' => $counseling_rf_index->family,
                            'friend' => $counseling_rf_index->friend, 'financial_security' => $counseling_rf_index->money_stable,
                            'general_problem' => $counseling_result->general_prob, 'problem_survey' => $counseling_result->discover_prob,
                            'troubleshooting' => $counseling_result->fix_prob, 'summary' => $counseling_result->result,
                            'evaluation' => $counseling_result->assessment, 'following_up' => $counseling_result->follow,
                            'suggest_other' => $counseling_result->suggest, 'forwarding' => $counseling_result->refer,
                            'summary_company' => $counseling_result->company_result, 'summary_client' => $counseling_result->client_result,
                            'create_by' => 'admin', 'last_update_by' => 'admin']
                );

                DB::table('appointment')
                        ->where('appointment_id', $appointment_id)
                        ->update(['result' => 'P']);

                DB::table('email_queue')
                        ->where('appointment_id', $appointment_id)
                        ->update(['status' => 'Y']);
            }
        } catch (Exception $e) {
            return response($e->getMessage());
        }
        return response('success');
    }

}
