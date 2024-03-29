<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeControl;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\BarterController;
use App\Http\Controllers\RatingController;
// use App\Http\Livewire\Messages\ListConversationAndMessages;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",[homeControl::class,"index"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::middleware(['approved'])->group(function () {
    // Route::get("/",[homeControl::class,"index"]);
    Route::get("/redirect",[homeControl::class,"redirectFunct"]);

    });

    Route::get("/approval",[homeControl::class,"approval"]);
    // Route::get('/approval', 'HomeControl@approval')->name('approval');

    // Route::middleware(['admin'])->group(function () {
        Route::get("/users",[UserController::class,"indexes"]);
        Route::get("/users/{user_id}/approve",[UserController::class,"approve"]);
        Route::get("/users/{user_id}/reject",[UserController::class,"reject"]);
        
    // });





    Route::get('profile', [App\Http\Controllers\UserController::class, 'index']);

    Route::get('edit', [App\Http\Controllers\UserController::class, 'edits']);

    Route::POST('edit', [App\Http\Controllers\UserController::class, 'updateUserDetails']);

    Route::post('edited', [App\Http\Controllers\UserController::class, 'updateAvatar']);

    Route::get('/users/{user}/products', [App\Http\Controllers\UserController::class, 'showProducts']);

    Route::get('userList', [App\Http\Controllers\UserController::class, 'list']);

    Route::get('/users/{user_id}/edit', [App\Http\Controllers\UserController::class, 'edit']);

    Route::put('/users/{user_id}', [App\Http\Controllers\UserController::class, 'update']);

    Route::get('/users/{user_id}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

    Route::get('/users/{user}/ratings', [App\Http\Controllers\UserController::class, 'showRatings']);

    








    Route::get('category', [App\Http\Controllers\CategoryController::class, 'index']);

    Route::get('creates', [App\Http\Controllers\CategoryController::class, 'create']);

    Route::POST('category', [App\Http\Controllers\CategoryController::class, 'store']);

    Route::get('category/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit']);

    Route::put('category/{category}', [App\Http\Controllers\CategoryController::class, 'update']);



    // Route::get('upload', [App\Http\Controllers\ProductController::class, 'index']);

    Route::POST('products', [App\Http\Controllers\ProductController::class, 'store']);

    Route::get('create', [App\Http\Controllers\ProductController::class, 'create']);

    Route::get('view', [App\Http\Controllers\ProductController::class, 'index']);

    Route::get('producted/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit']);

    Route::put('producted/{product}', [App\Http\Controllers\ProductController::class, 'update']);

    Route::get('product-image/{product_image_id}/delete', [App\Http\Controllers\ProductController::class, 'destroyImage']);

    Route::get('producted/{product_id}/delete', [App\Http\Controllers\ProductController::class, 'destroy']);

    Route::get('category/{category_slug}/{product_name}', [App\Http\Controllers\ProductController::class, 'productView']);

    Route::get('category/{category_slug}', [App\Http\Controllers\ProductController::class, 'products']);

    Route::get('search', [App\Http\Controllers\ProductController::class, 'searchProducts']);

    // Route::get('/users/{username}/products/{user_id}', [App\Http\Controllers\ProductController::class, 'showUserProducts']);

    // Route::get('/users/{user}/products', 'UserController@showProducts')->name('user.products');

    // Route::get('barters', [App\Http\Controllers\ProductController::class, 'barterStart']);

    // Route::get('viewProduct', [App\Http\Controllers\ProductController::class, 'show']);



    Route::get('wishlist', [App\Http\Controllers\WishlistController::class, 'index']);



    Route::get('messages', [App\Http\Controllers\MessagesController::class, 'index']);

    // Route::get('messages', [App\Http\Controllers\MessagesController::class, 'index']);

    

    Route::get('barters', [App\Http\Controllers\BarterController::class, 'barterStart']);

    Route::post('barterDetails/{userId}', [App\Http\Controllers\BarterController::class, 'store']);

    Route::get('approvals', [App\Http\Controllers\BarterController::class, 'index']);

    Route::get('history', [App\Http\Controllers\BarterController::class, 'viewHistory']);

    Route::get('bartersDetailsExisting', [App\Http\Controllers\BarterController::class, 'barterStartExisting']);

    Route::get('barterHistory/{barterId}', [App\Http\Controllers\BarterController::class, 'viewDetails']);


    // Route::get('bartersDetailsExisting/{barterPeople}/{selectedProduct}', [App\Http\Controllers\BarterController::class, 'barterStartExisting'])->name('bartersDetailsExisting');

    // Route::get('/barter/existing', \App\Http\Livewire\Barter\BarterExistingForm::class)->name('barter.existing');


    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    
    Route::get('/notifications/{notification}', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

    Route::delete('/notifications/clear-all', [App\Http\Controllers\NotificationController::class, 'clearAll'])->name('notifications.clearAll');



    
    Route::post('add-rating', [App\Http\Controllers\RatingController::class, 'add']);

    Route::get('productRate/{productId}/{receiverId}', [App\Http\Controllers\RatingController::class, 'viewRating']);

    // Route::get('/view-rating/{ratingId}', [RatingController::class, 'view'])->name('viewRating');

    Route::get('viewRating/{ratingId}', [App\Http\Controllers\RatingController::class, 'viewExistingRating']);

    Route::get('rating', [App\Http\Controllers\RatingController::class, 'viewMyRating']);

    Route::get('productRates/{barterId}/{senderId}', [App\Http\Controllers\RatingController::class, 'viewRatings']);

    Route::get('viewRatings/{ratingId}', [App\Http\Controllers\RatingController::class, 'viewExistingRatings']);













    




    // Route::get('barter', [App\Http\Controllers\ListConversationAndMessages::class, 'startBarter']);




});


Route::get("/logins",[homeControl::class,"log"]);

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

// Route::get("/redirect",[homeControl::class,"redirectFunct"]);


