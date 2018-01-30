<?php
/**
 * Created by PhpStorm.
 * User: Champ
 * Date: 12/6/2560
 * Time: 20:38
 */

namespace App\Http\Controllers;


class ContactUsController extends Controller
{
    public  function contactUs()
    {
        return view('contactUs.contactUs');
    }
}