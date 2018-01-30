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

class RoundController extends Controller {
    #region view

    public function round(){
        $companys = DB::table('company')
                    ->where(['status_active' => "Y"])
                    ->orderBy('company_id', 'asc')
                    ->get();
        
        $rounds = DB::table('round_evaluation')
                ->orderBy('round_id', 'dsc')
                ->paginate(5);
        return  view('admin.roundSetting', ['rounds' => $rounds])->with('companys', $companys);
    }
    
    public function updateRound(DatabaseManager $db) { // round
        $roundName = $_POST['roundName'];
        $startDatee = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $endMeetDate = $_POST['endMeetDate'];
        $roundId = $_POST['roundId'];
        $description = $_POST['description'];
        $comid = $_POST['comid'];
             $date = \Carbon\Carbon::now();
        try {
             DB::table('round_evaluation')
            ->where('round_id', $roundId)
            ->update(['name' => $roundName ,'start_date' => $startDatee,'end_date' => $endDate 
                    ,'end_meet_date' => $endMeetDate , 'last_update_by' => 'admin'
                    ,'last_update_date' => $date
                    , 'description' =>  $description,'company_id' => $comid]);
               return response('success');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function addRound(DatabaseManager $db) { // department
        $roundName = $_POST['roundName'];
        $startDatee = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $endMeetDate = $_POST['endMeetDate'];
        $description = $_POST['description'];
        $comid = $_POST['comid'];
        $date = \Carbon\Carbon::now();
        try {
                DB::table('round_evaluation')->insert(
                    ['name' => $roundName, 'start_date' => $startDatee, 'description' =>  $description , 'end_date' =>  $endDate, 'end_meet_date' =>  $endMeetDate,
                        'create_by' => 'admin', 'last_update_by' => 'admin', 'create_date' => $date ,'last_update_date' => $date,'company_id' => $comid]);
       return response('success');
           
                } catch (\Exception $e) {
            return response($e->getMessage());
        }

          
    }
}
