<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Faker\DefaultGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\EmailQueueController;
use Monolog\Logger as Monolog;
use Illuminate\Log\Writer;
use Illuminate\Database\DatabaseManager;

/**
 * Description of EmailQueueController
 *
 * @author champ6803
 */
class EmailQueueController extends Controller {

    public function saveEmailQueue(DatabaseManager $db) {
        try {
            $employee_id = request()->get('employee_id');
            $type = request()->get('type');

//            $employee = DB::table('employee')
//                    ->where(['employee_id' => $employee_id])
//                    ->select('email', 'first_name_th', 'rf_client_code')
//                    ->get();

            $date = \Carbon\Carbon::now();
            $sqlRound = "select r.round_id, d.department_id, c.company_id from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN round_evaluation as r on c.company_id = r.company_id
                          where e.employee_id = $employee_id order by r.round_id DESC";

            $infoRound = $db->select($sqlRound);
            $round_id = $infoRound[0]->round_id;
            $sqlEva = "select * from evaluation as e where e.round_id = $round_id and e.employee_id = $employee_id";
            $infoEva = $db->select($sqlEva);

            $appointment = DB::table('appointment')
                    ->where('eva_id', $infoEva[0]->eva_id)
                    ->get();

//            $counselor = DB::table('counselor')
//                    ->where('counselor_id', '=', $appointment[0]->counselor_id)
//                    ->select('email', 'first_name_th', 'rf_id')
//                    ->get();

            $create_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment[0]->appointment_date . " " . $appointment[0]->start_time)->toDateTimeString();

            DB::table('email_queue')->insert(
                    ['appointment_id' => $appointment[0]->appointment_id, 'counselor_id' => $appointment[0]->counselor_id, 'employee_id' => $employee_id, 'type' => $type, 'status' => 'N', 'appointment_date' => $create_date,
                        'create_by' => 'admin', 'last_update_by' => 'admin']
            );
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return response('success');
    }

}
