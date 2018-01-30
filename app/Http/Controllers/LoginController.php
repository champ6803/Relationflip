<?php

/**
 * Created by PhpStorm.
 * User: Champ
 * Date: 12/6/2560
 * Time: 22:59
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

class LoginController extends Controller {
    #region View

    public function login() {
        return view('login.login');
    }

    public function verifyProfile() {
        return view('login.verifyProfile');
    }

    #endregion

    public function checkLogin(DatabaseManager $db) {
        try {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $checkLogin = DB::table('user')->where(['username' => $username, 'password' => $password])->first();

            if (count($checkLogin) > 0) {
                session_start();
                if ($checkLogin->role == 'E') {
                    $employee = DB::table('employee')->where(['user_id' => $checkLogin->user_id])->first();
                    $_SESSION['m_user'] = $checkLogin->username;
                    $_SESSION['role'] = $checkLogin->role;
                    $_SESSION['employee_id'] = $employee->employee_id;
                    $_SESSION['department_id'] = $employee->department_id;
                    $_SESSION['employee_name_en'] = $employee->first_name_en;
                    $_SESSION['name'] = $employee->first_name_th . ' ' . $employee->last_name_th;
                    $_SESSION['loggedin_time'] = time();

                    $date = \Carbon\Carbon::now();
                    $sqlRound = "select r.round_id, d.department_id, c.company_id from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN round_evaluation as r on c.company_id = r.company_id
                          where e.employee_id = $employee->employee_id and r.start_date <= '$date' and r.end_meet_date >= '$date'";
                    $infoRound = $db->select($sqlRound);
                    if (count($infoRound) > 0) {
                        $round_id = $infoRound[0]->round_id;
                        $sqlEva = "select * from evaluation as e where e.round_id = $round_id and e.employee_id = $employee->employee_id";
                        $infoEva = $db->select($sqlEva);
                        if (count($infoEva) > 0)
                            $_SESSION['scored'] = 'scored';
                        else {
                            $sqlRoundRF = "select r.round_id, d.department_id, c.company_id from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN round_evaluation as r on c.company_id = r.company_id
                          where e.employee_id = $employee->employee_id and r.start_date <= '$date' and r.end_date >= '$date'";
                            $infoRoundRF = $db->select($sqlRoundRF);
                            if (count($infoRoundRF) > 0) { // เช็คว่ายังมีรอบการทำแบบทดสอบหรือป่าว
                                $_SESSION['scored'] = 'noscore';
                            } else {
                                $_SESSION['scored'] = 'noroundRF';
                            }
                        }
                    } else {
                        $_SESSION['scored'] = 'noround';
                    }

                    return response()->json(array('msg' => 'Employee', 'name' => $employee->first_name_th));
                } else if ($checkLogin->role == 'C') {
                    $counselor = DB::table('counselor')->where(['user_id' => $checkLogin->user_id])->first();
                    $_SESSION['m_user'] = $checkLogin->username;
                    $_SESSION['role'] = $checkLogin->role;
                    $_SESSION['counselor_id'] = $counselor->counselor_id;
                    $_SESSION['name'] = $counselor->first_name_th . ' ' . $counselor->last_name_th;
                    return response()->json(array('msg' => 'Counselor', 'name' => $counselor->first_name_th));
                }
            } else {
                return response()->json(array('msg' => 'fail'));
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function getClientVerify(DatabaseManager $db) {
        try {
            $employee_id = $_POST['employee_id'];
            $sqlEmployeeInfo = "select e.first_name_th,e.last_name_th,e.gender,e.birth_date , e.age,e.status,e.email,e.phone,e.unit,d.name as department_name,c.name as company_name, u.username, u.password from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN user as u on u.user_id = e.user_id
                          where e.employee_id = $employee_id";
            $employeeInfo = $db->select($sqlEmployeeInfo);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response($employeeInfo);
    }

    function changePassword() {
        return view('login.changePassword');
    }

    function updatePassword(DatabaseManager $db) {
        try {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $new_password = $_POST['new_password'];

            $checkPassword = DB::table('user')
                    ->where('username', $username)
                    ->where('password', $password)
                    ->get();

            if (count($checkPassword) > 0) {
                $user = DB::table('user')
                        ->where('username', $username)
                        ->where('password', $password)
                        ->first();
                DB::table('user')
                        ->where('username', $username)
                        ->where('password', $password)
                        ->update(['password' => $new_password]);
            } else {
                return response('notupdate');
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response($user->role);
    }

    function updateProfile(DatabaseManager $db) {
        try {
            $employee_id = $_POST['employee_id'];
            $data = json_decode($_POST['source']);

            DB::table('employee')
                    ->where('employee_id', $employee_id)
                    ->update(['first_name_th' => $data->first_name, 'last_name_th' => $data->last_name, 'age' => $data->age, 'status' => $data->status, 'email' => $data->email, 'phone' => $data->phone, 'unit' => $data->unit]);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response('updated');
    }

    function logout() {
        session_start();
        session_destroy();
        $result = (new HomeController)->index();
        echo $result;
    }

}
