<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {

        // dd('HomeController@index');
        return view('modules.home');
    }
}
