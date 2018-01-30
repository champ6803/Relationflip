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

class EmployeeController extends Controller {
    #region view

      public function employee(){
        $department_id = request()->get('department_id');
        $depname = request()->get('department_name');
        $employees = DB::table('employee')
                 ->where('employee.department_id', $department_id)
                   ->orderBy('employee_id', 'asc')
                ->paginate(1000);
        return  view('admin.employeeSetting', ['employees' => $employees]) ->with('depname', $depname);
    }
}
