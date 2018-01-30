<?php

/**
 * Created by PhpStorm.
 * User: Champ
 * Date: 10/6/2560
 * Time: 16:03
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    #region View

    public function index() {
        //$_SESSION['employee_id'] = "";
        
//        
//        if (isset($_SESSION['m_user'])) {
//            $sessionExpired = false;
//            $login_session_duration = 1;
//            $current_time = time();
//            if (isset($_SESSION['loggedin_time']) and isset($_SESSION['m_user'])) {
//                if (((time() - $_SESSION['loggedin_time']) > $login_session_duration)) {
//                    return view('home.index');
//                    //$sessionExpired = true;
//                }
//            }
//
//            if (!$sessionExpired) {
//                return view('contactUs.contactUs');
//            } else {
//                session_start();
//                session_destroy();
//                return view('home.index');
//            }
//        } else {
            return view('home.index');
//        }
    }

    function testFunction() {

        return 'Test';
    }

    public function isLoginSessionExpired() {
//        $login_session_duration = 1;
//        $current_time = time();
//        if (isset($_SESSION['loggedin_time']) and isset($_SESSION["m_user"])) {
//            if (((time() - $_SESSION['loggedin_time']) > $login_session_duration)) {
//                return true;
//            }
//        }
        return false;
    }

    #endregion
}
