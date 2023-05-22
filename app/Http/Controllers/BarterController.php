<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\BarterFormRequest;


class BarterController extends Controller
{

//     public function barterStart()
// {
//     $categories = Category::all();
//     return view('barterDetails', ['categories' => $categories]);
// }

public function barterStart()
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    return view('barterDetails', compact('notifications', 'notificationCount'));
}

public function barterStartExisting()
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
    return view('barterDetailsNew', compact('notifications', 'notificationCount'));
}

// public function barterStartExisting($barterPeople, $selectedProduct)
// {
//     return view('barterDetailsNew')->with('barterPeople', $barterPeople)->with('selectedProduct', $selectedProduct);
// }




    // public function create()
    // {
    //     $categories = Category::all();
    //     return view('barter')
    // }
    //

    public function store(BarterFormRequest $request, $userId)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $barter = $category->barters()->create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $userId,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'quantity' => $validatedData['quantity'],
            'condition' => $validatedData['condition'],
            
            

        ]);

        return $barter->id;
    }

    public function index()
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
    return view('barterApproval', compact('notifications', 'notificationCount'));
}

public function viewHistory()
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
    return view('barterHistory', compact('notifications', 'notificationCount'));
}

public function viewDetails($barterId)
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
    return view('barterHistoryDetails', [
        'selectedHistory' => $barterId,
        'notifications' => $notifications,
        'notificationCount' => $notificationCount,
    ]);
}



}
