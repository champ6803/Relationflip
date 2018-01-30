<?php
/**
 * Created by PhpStorm.
 * User: Champ
 * Date: 12/6/2560
 * Time: 20:37
 */

namespace App\Http\Controllers;


class AboutController extends Controller
{
    public function about()
    {
        return view('about.about');
    }
}