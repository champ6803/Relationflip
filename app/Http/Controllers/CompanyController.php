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

class CompanyController extends Controller {
    #region view

    public function company() {
        $companys = DB::table('company')
                ->where(['status_active' => "Y"])
                ->orderBy('company_id', 'asc')
                ->paginate(5);
        return view('admin.companySetting', ['companys' => $companys]);
    }

    public function searchCompany(DatabaseManager $db) { // company
        try {
            $companys = DB::table('company')
                    ->where(['status_active' => "Y"])
                    ->orderBy('company_id', 'desc')
                    ->paginate(5);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return view('admin.companySetting', ['companys' => $companys]);
    }

    public function searchCompanyByName(DatabaseManager $db) { // company
        $name = request()->get('name');
        try {
            $companys = DB::table('company')
                    ->where('company.status_active', "Y")
                    ->where('company.name', 'like', "%$name%")
                    ->orderBy('company_id', 'desc')
                    ->paginate(5);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return view('admin.companySetting', ['companys' => $companys]);
    }

    public function deleteCompany(DatabaseManager $db) { // company
        $comid = $_POST['comid'];
        try {
            DB::table('company')
                    ->where('company_id', $comid)
                    ->update(['status_active' => "N"]);
            return response('success');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function updateCompany(DatabaseManager $db) { // company
        $comid = $_POST['comid'];
        $comname = $_POST['comname'];
        $package = $_POST['package'];
        $num_package = $_POST['num_package'];
        $date = \Carbon\Carbon::now();
        try {
            DB::table('company')
                    ->where('company_id', $comid)
                    ->update(['name' => $comname, 'package_type' => $package, 'num_package' => $num_package, 'last_update_date' => $date]);
            return response('success');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function addCompany(DatabaseManager $db) { // company
        $comname = $_POST['comname'];
        $package = $_POST['package'];
        $num_package = $_POST['num_package'];
        $date = \Carbon\Carbon::now();
        try {
            DB::table('company')->insert(
                    ['name' => $comname, 'status_active' => "Y", 'create_date' => $date, 'last_update_date' => $date,
                        'package_type' => $package, 'num_package' => $num_package, 'create_by' => 'admin', 'last_update_by' => 'admin', 'objective' => "", 'group_of' => 'A']);
            return response('success');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function checkHasUser() {
        $company_id = $_POST['company_id'];
        $user = DB::table('user')
                ->select('user.username', 'user.password')
                ->join('employee', 'user.user_id', '=', 'employee.user_id')
                ->join('department', 'employee.department_id', '=', 'department.department_id')
                ->join('company', 'department.company_id', '=', 'company.company_id')
                ->where('company.company_id', '=', $company_id)
                ->get();
        return response($user);
    }

}
