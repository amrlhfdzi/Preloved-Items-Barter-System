<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class homeControl extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('status', '0')->get();
        $productsQuery = Product::with('user.userDetail');
        
        // Filter products based on condition
        if ($request->has('condition')) {
            $condition = $request->input('condition');
            $productsQuery->whereIn('condition', $condition);
        }
        
        $products = $productsQuery->paginate(8);
    
        return view('home', compact('categories', 'products'));
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

            $categories = Category::where('status', '0')->get();
            $products = Product::with('user.userDetail')->paginate(8);

            return view('home', compact('categories', 'products'));
    
            
        }
    }

    public function approval()
   {
    return view('approval');
   }



    //
}
