<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeControl extends Controller
{
    function index(){
        return view("home");
    }

    //
}
