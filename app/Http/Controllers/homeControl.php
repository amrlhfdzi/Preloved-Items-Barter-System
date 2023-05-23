<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Barter;

class homeControl extends Controller
{
    public function index(Request $request)
    {
        
            // $user = auth()->user();

        $categories = Category::where('status', '0')->get();
        $productsQuery = Product::with('user.userDetail');
        
        // Filter products based on condition
        if ($request->has('condition')) {
            $condition = $request->input('condition');
            $productsQuery->whereIn('condition', $condition);
        }

        $barters = Barter::all();

        
        // $notifications = $user->notifications()->latest()->get();
        // $notificationCount = $user->unreadNotifications->count();
        
        $products = $productsQuery->paginate(8);
    
        return view('home', compact('categories', 'products', 'barters'));
    
}
    
    

    function log(){
        return view("logins");
    }

    function redirectFunct(Request $request)
    {
        $typeuser=Auth::user()->usertype;

        if($typeuser=='1')
        {
            return view('admin.adminpage');
        }

        else{

            $user = Auth::user();

            $categories = Category::where('status', '0')->get();
            $productsQuery = Product::with('user.userDetail');

            $productsQuery->where('user_id', '!=', $user->id);

             // Filter products based on condition
        if ($request->has('condition')) {
            $condition = $request->input('condition');
            $productsQuery->whereIn('condition', $condition);
        }

        $barters = Barter::all();

            $products = $productsQuery->paginate(8);

            $notifications = $user->notifications()->latest()->get();
            $notificationCount = $user->unreadNotifications->count();

            return view('home', compact('categories', 'products','notifications', 'notificationCount', 'barters'));
    
            
        }
    }

    public function approval()
   {
    return view('approval');
   }





    //
}
