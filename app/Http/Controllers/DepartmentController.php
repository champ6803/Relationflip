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

class DepartmentController extends Controller {
    #region view

    public function department(){
        $company_id = request()->get('company_id');
        $departments = DB::table('department')
                 ->where('department.company_id', $company_id)
                  ->where('department.status_active', "Y")
                   ->orderBy('department_id', 'asc')
                ->paginate(5);
        return  view('admin.departmentSetting', ['departments' => $departments]) ->with('companys', $company_id);
    } 
    public function searchDepartmentByName(DatabaseManager $db) {
        $name = request()->get('name');
          $company_id = request()->get('company_id');
        try {
            $departments = DB::table('department')
                    ->where('department.status_active', "Y")
                    ->where('department.name', 'like', "%$name%")
                    ->orderBy('department_id', 'desc')
                    ->paginate(5);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return  view('admin.departmentSetting', ['departments' => $departments]) ->with('companys', $company_id);
    }
    public function updateDepartment(DatabaseManager $db) { // company
        $depid = $_POST['depid'];
        $depname = $_POST['depname'];
        try {
             DB::table('department')
            ->where('department_id', $depid)
            ->update(['name' => $depname ]);
               return response('success');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    
    public function deleteDepartment(DatabaseManager $db) { // company
        $depid = $_POST['depid'];
        try {
             DB::table('department')
            ->where('department_id', $depid)
            ->update(['status_active' => "N"]);
               return response('success');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    
    }
    
    public function addDepartment(DatabaseManager $db) { // department
        $depname = $_POST['depname'];
        $comid = $_POST['comid'];
        $date = \Carbon\Carbon::now();
        try {
                DB::table('department')->insert(
                    ['name' => $depname, 'status_active' => "Y", 'create_date' => $date, 'last_update_date' => $date,
                        'create_by' => 'admin', 'last_update_by' => 'admin', 'company_id' => $comid]);
       return response('success');
           
                } catch (\Exception $e) {
            return response($e->getMessage());
        }

          
    }
}
