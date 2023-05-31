<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Category;
use App\Models\Barter;
use App\Models\Rating;


class UserController extends Controller
{
    public function index(){

    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();

     // Calculate the average rating based on the receiver ID
     $receiverId = Auth::id();
     $averageRating = Rating::where('receiver_id', $receiverId)->avg('rating');

        return view('profile', compact('notifications', 'notificationCount', 'averageRating'));
    }

    public function edits(){
        return view('edit');
    }

    public function updateUserDetails(Request $request)
    {

      

        // $request->validate([
        //     'username' => ['string'],
        //     'name' => ['string'],
        //     'phone' => ['digits:10'],
        //     'address' => ['string','max:499'],
        //     'description' => ['string','max:499'],
    
        // ]);

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
                'phone' => $request->phone ?? '',
                'address' => $request->address ?? '',
                'description' => $request->description ?? '',
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

        return view('edit', array('user' => Auth::user()));

    }

    public function indexes()
    {
        $users = User::whereNull('approved_at')->get();

        return view('admin.userApproval', compact('users'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        // return redirect()->route('admin.userApproval')->withMessage('User approved successfully');
        return redirect('users')->withMessage('User approved successfully');
    }

    public function reject($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        // return redirect()->route('admin.userApproval')->withMessage('User approved successfully');
        return redirect('users')->withMessage('User reject successfully');
    }

    public function showProducts(User $user)
    {
        $products = $user->products;
        $users = Auth::user();
        $notifications = $users->notifications()->latest()->get();
        $notificationCount = $users->unreadNotifications->count();
        $barters = Barter::all();

        // $receiverId = Auth::id();
        $averageRating = Rating::where('receiver_id', $user->id)->avg('rating');

        return view('userProductPage', [
            'user' => $user,
            'products' => $products,
            'notifications' => $notifications,
            'notificationCount' => $notificationCount,
            'barters' => $barters,
            'averageRating' => $averageRating,
        ]);
    }

    public function showRatings(User $user)
    {
        $products = $user->products;
        $users = Auth::user();
        $notifications = $users->notifications()->latest()->get();
        $notificationCount = $users->unreadNotifications->count();
        $barters = Barter::all();

        $receiverId = Auth::id();
        $averageRating = Rating::where('receiver_id', $user->id)->avg('rating');
        $ratings = Rating::where('receiver_id', $user->id)->get(); // Retrieve the ratings for the selected user


        return view('userRatingPage', [
            'user' => $user,
            'products' => $products,
            'notifications' => $notifications,
            'notificationCount' => $notificationCount,
            'barters' => $barters,
            'averageRating' => $averageRating,
            'ratings' => $ratings,
        ]);
    }

    

    // public function categories()
    // {
    //     $categories = Category::where('status','0')->get();
    //     return view('home', compact('categories'));
    // }

    public function list(){
        $users = User::paginate(10);
        return view('admin.userList', compact('users'));
    }

    
    public function edit(int $userId){
        $user = User::findOrFail($userId);
        return view('admin.userEdit', compact('user'));
    }

    public function update(Request $request, int $userId)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
        ]);
    
        $user = User::findOrFail($userId);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        return redirect('userList')->with('message', 'User updated successfully');
    }

    public function destroy(int $userId){
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('userList')->with('message', 'User deleted successfully');
    }
    


    


    
    //
}
