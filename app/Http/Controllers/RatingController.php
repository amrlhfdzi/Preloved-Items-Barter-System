<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;

class RatingController extends Controller
{

    public $productId;
    public $receiverId;
    

    public function viewRating($productId,$receiverId)
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
    return view('productRatingDetails', [
        'selectedProduct' => $productId,
        'selectedReceiver' => $receiverId,
        'notifications' => $notifications,
        'notificationCount' => $notificationCount,
    ]);
}

public function viewExistingRating($ratingId)
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
    return view('existingProductRating', [
        'selectedRating' => $ratingId,
        'notifications' => $notifications,
        'notificationCount' => $notificationCount,
    ]);
}

public function viewExistingRatings($ratingId)
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
    return view('existingProductRatings', [
        'selectedRating' => $ratingId,
        'notifications' => $notifications,
        'notificationCount' => $notificationCount,
    ]);
}

// public function viewMyRating()
// {
//     $user = Auth::user();
//     $notifications = $user->notifications()->latest()->get();
//     $notificationCount = $user->unreadNotifications->count();
    
//     return view('viewMyRating', compact('notifications', 'notificationCount'));
// }

// public function viewMyRating($productId)
// {
//     $user = Auth::user();
//     $notifications = $user->notifications()->latest()->get();
//     $notificationCount = $user->unreadNotifications->count();
    
//     // Retrieve the rating details based on the product ID
//     $rating = Rating::where('product_id', $productId)
//         ->where('user_id', auth()->id())
//         ->first();

//     return view('rating.view', compact('rating','notifications', 'notificationCount'));
// }

public function viewMyRating()
{
    $userId = Auth::id();
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
    // Retrieve the rating details based on the product ID and user ID
    // Retrieve the ratings where the logged-in user's ID matches the receiver ID
    $ratings = Rating::where('receiver_id', $userId)->get();

    

    $averageRating = Rating::where('receiver_id', $userId)->avg('rating');

    

    if ($ratings) {
        return view('viewMyRating', compact('ratings', 'notifications', 'notificationCount','averageRating'));
    } else {
        // Rating not found, handle the case accordingly (e.g., show an error message)
        return redirect()->back()->with('error', 'Rating not found.');
    }
}


public function viewRatings($barterId,$senderId)
{
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
    return view('productRatingDetailsNew', [
        'selectedBarter' => $barterId,
        'selectedSender' => $senderId,
        'notifications' => $notifications,
        'notificationCount' => $notificationCount,
    ]);
}




    //
}
