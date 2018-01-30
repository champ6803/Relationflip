<?php

/**
 * Created by PhpStorm.
 * User: Champ
 * Date: 26/6/2560
 * Time: 13:05
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use Illuminate\Database\DatabaseManager;

class TopicController extends Controller {

    function topic() {
        return view('topic.topic');
    }

    function getMasterTopic() {
        $topic = DB::table('master_topic')->get();
        return response()->json($topic);
    }

    function saveTopic(DatabaseManager $db) {
        try {
            $date = \Carbon\Carbon::now();
            $data = json_decode($_POST['source']);
            $employee_id = $_POST['employee_id'];
            $sqlRound = "select r.round_id, d.department_id, c.company_id from employee as e INNER JOIN department as d on e.department_id = d.department_id  INNER JOIN company as c on d.company_id = c.company_id INNER JOIN round_evaluation as r on c.company_id = r.company_id
                          where e.employee_id = $employee_id and r.start_date <= '$date' and r.end_meet_date >= '$date'";
            $infoRound = $db->select($sqlRound);
           
            if (count($infoRound) == 0) {
                return response('no_round');
            } else {
                $round_id = $infoRound[0]->round_id;
                $eva = DB::table('evaluation')->where(['employee_id' => $employee_id, 'round_id' => $round_id])->orderBy('eva_id', 'desc')->get();
                $eva_id = $eva[0]->eva_id;

                $eva_topic = DB::table('evaluation_detail_topic')->where(['eva_id' => $eva_id])->get();
                if (count($eva_topic) == 0) {
                    for ($i = 0; $i < count($data); $i++) {
                        DB::table('evaluation_detail_topic')->insert(['eva_detail_id' => 0, 'eva_id' => $eva_id, 'topic_id' => $data[$i], 'description' => ' ', 'create_by' => 'admin', 'last_update_by' => 'admin']);
                    }
                } else {
                    DB::table('evaluation_detail_topic')->where('eva_id', $eva_id)->delete();
                    for ($i = 0; $i < count($data); $i++) {
                        DB::table('evaluation_detail_topic')->insert(['eva_detail_id' => 0, 'eva_id' => $eva_id, 'topic_id' => $data[$i], 'description' => ' ', 'create_by' => 'admin', 'last_update_by' => 'admin']);
                    }
                }
                return response(count($data));
            }
        } catch (\Exception $e) {
            $e->getMessage();
            return response($e->getMessage());
        }
    }

}
