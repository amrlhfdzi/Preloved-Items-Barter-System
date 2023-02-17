<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class homeControl extends Controller
{
    function index(){

        $categories = Category::where('status','0')->get();
        return view('home', compact('categories'));
        // return view("home");
    }

    function log(){
        return view("logins");
    }

    function redirectFunct()
    {
        $typeuser=Auth::user()->usertype;

        if($typeuser=='1')
        {
            return view('admin.adminpage');
        }

        else{

        $categories = Category::where('status','0')->get();
        return view('home', compact('categories'));
    
            
        }
    }

    public function approval()
   {
    return view('approval');
   }



    //
}
