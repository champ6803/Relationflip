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
use App\Http\Controllers\HomeController;
use Monolog\Logger as Monolog;
use Illuminate\Log\Writer;
use Illuminate\Database\DatabaseManager;

class AdminController extends Controller {

    public function admin() {
        return view('admin.admin');
    }

    public function getCompany() {
        try {
            $companys = DB::table('company')
                    ->orderBy('company_id', 'asc')
                    ->get();
        } catch (Exception $e) {
            return response($e->getMessage());
        }
        return response($companys);
    }

}
