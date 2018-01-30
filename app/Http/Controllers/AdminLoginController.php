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

class AdminLoginController extends Controller {
    #region view

    public function adminLogin() {
        return view('admin.adminLogin');
    }

    public function adminConsole() {
        return view('admin.adminConsole');
    }

    #endregion

    public function checkAdminLogin(DatabaseManager $db) {
        try {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = "A";
            $checkLogin = DB::table('user')->where(['username' => $username, 'password' => $password, 'role' => $role])->first();
            
            if (count($checkLogin) > 0) {
                session_start();
                $_SESSION['a_user'] = $checkLogin->username; 
                return response()->json(array('msg' => 'success'));
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
            $sqlEmployeeInfo = "select e.first_name_th,e.last_name_th,e.gender,e.age,e.status,e.email,e.phone,e.unit,d.name as department_name,c.name as company_name, u.username, u.password from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN user as u on u.user_id = e.user_id
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
            $data = json_decode($_POST['source']);
            $sqlCheckPassword = "select * from user as u where u.username = '$data->username' and u.password = $data->password";
            $checkPassword = $db->select($sqlCheckPassword);

            if (count($checkPassword) > 0) {
                DB::table('user')
                        ->where('username', $data->username)
                        ->update(['password' => $data->new_password]);
            } else {
                return response('notupdate');
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response('updated');
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

    function logoutAdmin() {
        session_start();
        session_destroy();
        $result = (new AdminLoginController)->adminLogin();
        echo $result;
    }

}
