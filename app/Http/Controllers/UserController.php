<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;


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

        

        return redirect('profile');



        
    }

    public function updateAvatar(Request $request){

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', array('user' => Auth::user()));

    }
    


    
    //
}
