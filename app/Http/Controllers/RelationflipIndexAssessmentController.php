<?php

/**
 * Created by PhpStorm.
 * User: Champ
 * Date: 15/6/2560
 * Time: 23:40
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use Illuminate\Database\DatabaseManager;

class RelationflipIndexAssessmentController extends Controller {

    function index(DatabaseManager $db) {
        return view('indexAssessment.questionnaire');
    }

    function assessmentResult() {
        return view('indexAssessment.assessmentResult');
    }

    function assessmentResultForCounselor() {
        return view('indexAssessment.assessmentResultForCounselor');
    }

    function confirmConsultation() {
        return view('indexAssessment.confirmConsultation');
    }

    function resultConsent() {
        return view('indexAssessment.resultConsent');
    }

    function postMasterRelationflipIndexAssessment() {
        $masterRFIA = DB::table('master_relationflip_index_assessment')->get();
        return response()->json($masterRFIA);
    }

    function postOpenEnded() {
        try {
            $employee_id = $_POST['employee_id'];
            $employee = DB::table('employee')->where('employee_id', $employee_id)->first();
            $departmentCompany = DB::table('department')
                    ->join('company', 'department.company_id', '=', 'company.company_id')
                    ->where('department.department_id', '=', $employee->department_id)
                    ->get();

            $openEndedCompany = DB::table('open_ended_company')->where('company_id', $departmentCompany[0]->company_id)->get();
            $openEndedDepartment = DB::table('open_ended_department')->where('department_id', $employee->department_id)->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json(array('openEndedCompany' => $openEndedCompany, 'openEndedDepartment' => $openEndedDepartment));
        //return response($department);
    }

    function saveAnswersIA(DatabaseManager $db) {
        try {
            $date = \Carbon\Carbon::now();
            $employee_id = $_POST['employee_id'];
            $sqlRound = "select r.round_id, d.department_id, c.company_id from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN round_evaluation as r on c.company_id = r.company_id
                          where e.employee_id = $employee_id and r.start_date <= '$date' and r.end_meet_date >= '$date'";

            $infoRound = $db->select($sqlRound);
            $round_id = $infoRound[0]->round_id;
            $sqlEva = "select * from evaluation as e where e.round_id = $round_id and e.employee_id = $employee_id";
            $infoEva = $db->select($sqlEva);
            if (count($infoEva) == 0) {

                ////////////////// แก้ Insert////////////////////
                $sqlInsertEva = "insert into evaluation(employee_id,round_id,pre_rf_index_1,pre_rf_index_2,pre_rf_index_3,	pre_rf_index_4,pre_rf_index_5,pre_rf_index_6
                                  ,pre_rf_index_7,pre_rf_index_8,pre_rf_index_9,pre_rf_index_10,pre_rf_index_11,pre_rf_index_sum_work,pre_rf_index_sum_life	,pre_rf_index_sum_all
                                  ,post_rf_index_1,post_rf_index_2,post_rf_index_3,post_rf_index_4,post_rf_index_5,post_rf_index_6,post_rf_index_7,post_rf_index_8,post_rf_index_9
                                  ,post_rf_index_10,post_rf_index_11,post_rf_index_sum_work,post_rf_index_sum_life,post_rf_index_sum_all,accept_counseling,create_by
                                  ,last_update_by)
                                  values ($employee_id,$round_id,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00
                                  ,0.00,0.00,0.00,0.00,0.00,'Y','admin','admin')";
                $db->insert($sqlInsertEva);
                $sqlLast = "select eva_id from evaluation order by eva_id DESC";
                $eva = $db->select($sqlLast);
                $eva_id = $eva[0]->eva_id;
                ///////////////////////////////////////////////

                $answers = json_decode($_POST['answers']);
                $answerOpenEnded = json_decode($_POST['answerOpenEnded']);

                for ($i = 1; $i < count($answers); $i++) {
                    $sql = "insert into evaluation_detail_relationflip_index_assessment (eva_id,relationflip_index_assessment_id,point,create_by,last_update_by)
                values ($eva_id,$i,$answers[$i],'admin' ,'admin')";
                    $db->insert($sql);
                }

                $company_id = $infoRound[0]->company_id;
                $department_id = $infoRound[0]->department_id;
                if (count($answerOpenEnded) > 0) {
                    for ($i = 0; $i < count($answerOpenEnded); $i++) {
                        $sqlO = "insert into evaluation_detail_open_ended (eva_id,company_id,department_id,answer,create_by,last_update_by)
                values ($eva_id,$company_id,$department_id,'$answerOpenEnded[$i]','admin' ,'admin')";
                        $db->insert($sqlO);
                    }
                }
                session_start();
                unset($_SESSION['scored']);
                $_SESSION['scored'] = 'scored';
            } else {
                return response('scored');
            }
        } catch (\Exception $e) {
            $e->getMessage();
            return response($e->getMessage());
        }
        return response('done');
    }

    function saveAnswersIAPost(DatabaseManager $db) {
        try {
            $date = \Carbon\Carbon::now();
            $employee_id = $_POST['employee_id'];

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;

            $answers = json_decode($_POST['answers']);
            $answerOpenEnded = json_decode($_POST['answerOpenEnded']);

            $eva_detail = DB::table('evaluation_detail_relationflip_index_assessment')
                    ->where('eva_id', $eva_id)
                    ->where('duration', 'A')
                    ->get();

            if (count($eva_detail) == 0) {
                for ($i = 1; $i < count($answers); $i++) {
                    $sql = "insert into evaluation_detail_relationflip_index_assessment (eva_id,relationflip_index_assessment_id,point,duration,create_by,last_update_by)
                values ($eva_id,$i,$answers[$i],'A','admin' ,'admin')";
                    $db->insert($sql);
                }

                $company_id = $infoRound[0]->company_id;
                $department_id = $infoRound[0]->department_id;
                if (count($answerOpenEnded) > 0) {
                    for ($i = 0; $i < count($answerOpenEnded); $i++) {
                        $sqlO = "insert into evaluation_detail_open_ended (eva_id,company_id,department_id,answer,duration,create_by,last_update_by)
                values ($eva_id,$company_id,$department_id,'$answerOpenEnded[$i]','A' ,'admin' ,'admin')";
                        $db->insert($sqlO);
                    }
                }
            } else {
                return response('scored');
            }
        } catch (\Exception $e) {
            $e->getMessage();
            return response($e->getMessage());
        }
        return response('done');
    }

    function getClientDetails(DatabaseManager $db) {
        try {
            $employee_id = $_POST['employee_id'];
            $sqlEmployeeInfo = "select e.first_name_th,e.last_name_th,e.first_accept,e.gender,e.age,e.status,e.email,e.phone,e.unit, e.emergency_contact,e.target , e.child, e.department,d.name as department_name,c.name as company_name, u.username from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN user as u on u.user_id = e.user_id
                          where e.employee_id = $employee_id";
            $employeeInfo = $db->select($sqlEmployeeInfo);

            $date = \Carbon\Carbon::now();

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response()->json(array('employee' => $employeeInfo, 'evaluation' => $eva));
    }

// checked

    function getClientDetailsForCounselor(DatabaseManager $db) {
        try {
            $employee_id = $_POST['employee_id'];
            $sqlEmployeeInfo = "select e.first_name_th,e.last_name_th,e.first_accept,e.gender,e.age,e.status,e.email,e.phone,e.unit, e.emergency_contact,e.target , e.child, e.department,d.name as department_name,c.name as company_name, u.username from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN user as u on u.user_id = e.user_id
                          where e.employee_id = $employee_id";
            $employeeInfo = $db->select($sqlEmployeeInfo);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response($employeeInfo);
    }

    function getScoreAssessment(DatabaseManager $db) {
        try {
            $date = \Carbon\Carbon::now();
            $employee_id = $_POST['employee_id'];

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;

            $sqlAllPoint = "select ed.point,e.create_date from evaluation e join
                        evaluation_detail_relationflip_index_assessment ed 
                        on e.eva_id = ed.eva_id
                        where e.employee_id = $employee_id and e.eva_id = $eva_id and ed.duration = 'B'";
            $allPoint = $db->select($sqlAllPoint);
        } catch (\Exception $e) {
            $e->getMessage();
            return response($e->getMessage());
        }
        return response($allPoint);
    }

// checked

    function getScorePostAssessment(DatabaseManager $db) {
        try {
            $date = \Carbon\Carbon::now();
            $employee_id = $_POST['employee_id'];

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;

            $sqlAllPoint = "select ed.point,e.create_date from evaluation e join
                        evaluation_detail_relationflip_index_assessment ed 
                        on e.eva_id = ed.eva_id
                        where e.employee_id = $employee_id and e.eva_id = $eva_id and ed.duration = 'A'";
            $allPoint = $db->select($sqlAllPoint);
        } catch (\Exception $e) {
            $e->getMessage();
            return response($e->getMessage());
        }
        return response($allPoint);
    }

// checked

    function getMasterTranslation(DatabaseManager $db) {
        try {
            $sqlWorkTranslation = "select * from master_translation where trans_type = 'W'";
            $workTranslation = $db->select($sqlWorkTranslation);

            $sqlLifeTranslation = "select * from master_translation where trans_type = 'L'";
            $lifeTranslation = $db->select($sqlLifeTranslation);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response(array(['workData' => $workTranslation, 'lifeData' => $lifeTranslation]));
    }

    function firstAccept() {
        try {
            $status = $_POST['status'];
            $employee_id = $_POST['employee_id'];
            DB::table('employee')->where('employee_id', $employee_id)->update(['first_accept' => $status]);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    function saveScoreRFIndex(DatabaseManager $db) {
        try {
            $source = json_decode($_POST['source']);
            $date = \Carbon\Carbon::now();
            $employee_id = $_POST['employee_id'];

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;

            DB::table('evaluation')
                    ->where('eva_id', $eva_id)
                    ->update(['pre_rf_index_1' => $source->pre_rf_index_1, 'pre_rf_index_2' => $source->pre_rf_index_2,
                        'pre_rf_index_3' => $source->pre_rf_index_3, 'pre_rf_index_4' => $source->pre_rf_index_4,
                        'pre_rf_index_5' => $source->pre_rf_index_5, 'pre_rf_index_6' => $source->pre_rf_index_6,
                        'pre_rf_index_7' => $source->pre_rf_index_7, 'pre_rf_index_8' => $source->pre_rf_index_8,
                        'pre_rf_index_9' => $source->pre_rf_index_9, 'pre_rf_index_10' => $source->pre_rf_index_10,
                        'pre_rf_index_11' => $source->pre_rf_index_11,
                        'pre_rf_index_sum_work' => $source->pre_rf_index_sum_work,
                        'pre_rf_index_sum_life' => $source->pre_rf_index_sum_life,
                        'pre_rf_index_sum_all' => $source->pre_rf_index_sum_all, 'accept_counseling' => 'B']);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response('success');
    }

// checked

    function saveScorePostRFIndex(DatabaseManager $db) {
        try {
            $source = json_decode($_POST['source']);
            $date = \Carbon\Carbon::now();
            $employee_id = $_POST['employee_id'];

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;

            DB::table('evaluation')
                    ->where('eva_id', $eva_id)
                    ->update(['post_rf_index_1' => $source->post_rf_index_1, 'post_rf_index_2' => $source->post_rf_index_2,
                        'post_rf_index_3' => $source->post_rf_index_3, 'post_rf_index_4' => $source->post_rf_index_4,
                        'post_rf_index_5' => $source->post_rf_index_5, 'post_rf_index_6' => $source->post_rf_index_6,
                        'post_rf_index_7' => $source->post_rf_index_7, 'post_rf_index_8' => $source->post_rf_index_8,
                        'post_rf_index_9' => $source->post_rf_index_9, 'post_rf_index_10' => $source->post_rf_index_10,
                        'post_rf_index_11' => $source->post_rf_index_11,
                        'post_rf_index_sum_work' => $source->post_rf_index_sum_work,
                        'post_rf_index_sum_life' => $source->post_rf_index_sum_life,
                        'post_rf_index_sum_all' => $source->post_rf_index_sum_all, 'accept_counseling' => 'A']);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response('success');
    }

// checked

    function checkAppointment(DatabaseManager $db) {
        try {
            $date = \Carbon\Carbon::now();
            $dateNow = \Carbon\Carbon::now()->format('Y-m-d');
            $employee_id = $_POST['employee_id'];

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;

            $appointment = DB::table('appointment')->select('*')
                    ->where('eva_id', '=', $eva_id)
                    //->where('appointment_date', '>', $dateNow)
                    ->where('result', '<>', 'R')
                    ->where('result', '<>', 'D')
                    ->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response(count($appointment));
    }

// checked

    function checkPackage(DatabaseManager $db) {
        try {
            $department_id = $_POST['department_id'];
            $company = DB::table('company')
                    ->join('department','department.company_id','=','company.company_id')
                    ->select('company.*')
                    ->where('department_id', $department_id)
                    ->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response($company);
    }

// checked

    function information() {
        return view('info.information');
    }

    function getAppointment(DatabaseManager $db) {
        try {
            $date = \Carbon\Carbon::now();
            $dateNow = \Carbon\Carbon::now()->format('Y-m-d');
            $employee_id = $_POST['employee_id'];

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;

            $appointment = DB::table('appointment')
                    ->join('counselor', 'counselor.counselor_id', '=', 'appointment.counselor_id')
                    ->select('appointment.*', 'counselor.first_name_th', 'counselor.last_name_th','counselor.images_name')
                    ->where('appointment.eva_id', '=', $eva_id)
                    ->where('result', '<>', 'R')
                    ->orderBy('appointment_id', 'desc')
                    ->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response($appointment);
    }

// checked

    function checkAccept() {
        try {
            $employee_id = $_POST['employee_id'];

            $employee = DB::table('employee')
                    ->where('employee_id', $employee_id)
                    ->get();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response($employee);
    }

    public function getTopicForCounselor(DatabaseManager $db) {
        try {
            $date = \Carbon\Carbon::now();
            $employee_id = $_POST['employee_id'];

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;

            $sqlTopic = "select mt.name from evaluation e join
                        evaluation_detail_topic ed 
                        on e.eva_id = ed.eva_id
                        join master_topic mt on ed.topic_id = mt.topic_id
                        where e.employee_id = $employee_id and e.eva_id = $eva_id";
            $topic = $db->select($sqlTopic);
        } catch (\Exception $e) {
            $e->getMessage();
            return response($e->getMessage());
        }
        return response($topic);
    }

// checked

    public function getMeetingReport(DatabaseManager $db) {
        try {
            $employee_id = $_POST['employee_id'];

            $eva = DB::table('evaluation')->where(['employee_id' => $employee_id])->orderBy('eva_id', 'desc')->get();
            $eva_id = $eva[0]->eva_id;
            $round_id = $eva[0]->round_id;

            $meetingList = DB::table('meeting')
                    ->join('appointment', 'appointment.appointment_id', '=', 'meeting.appointment_id')
                    ->where('appointment.eva_id', $eva_id)
                    ->where('appointment.round_id', $round_id)
                    ->get();
        } catch (Exception $e) {
            $e->getMessage();
            return response($e->getMessage());
        }
        return response($meetingList);
    }

// checked
    
    function getEmployeeName(){
        try {
            $employee_id = $_POST['employee_id'];
            $employee_name = DB::table('employee')->where(['employee_id' => $employee_id])->get();
            
        } catch (Exception $e) {
            $e->getMessage();
            return response($e->getMessage());
        }
        return response($employee_name);
    }
}
