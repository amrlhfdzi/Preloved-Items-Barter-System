<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function edits(){
        return view('edit');
    }

    public function updateUserDetails(Request $request)
    {

        $request->validate([
            'username' => ['required','string'],
            'name' => ['required','string'],
            'phone' => ['required','digits:10'],
            'address' => ['required','string','max:499'],
            'description' => ['required','string','max:499'],
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->name
        ]);

        $user->userDetail()->updateOrCreate(
            [
                'user_id' =>  $user->id,
            ],
            [
                'username' => $request->username,
                'phone' => $request->phone,
                'address' => $request->address,
                'description' => $request->description,
            ]

        );

        return redirect()->back()->with('message','User Profile Updated');
    }
    


    
    //
}
