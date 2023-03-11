<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeControl;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MessagesController;

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
        
    // });





    Route::get('profile', [App\Http\Controllers\UserController::class, 'index']);

    Route::get('edit', [App\Http\Controllers\UserController::class, 'edits']);

    Route::POST('edit', [App\Http\Controllers\UserController::class, 'updateUserDetails']);

    Route::post('edited', [App\Http\Controllers\UserController::class, 'updateAvatar']);

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

    // Route::get('viewProduct', [App\Http\Controllers\ProductController::class, 'show']);

    Route::get('wishlist', [App\Http\Controllers\WishlistController::class, 'index']);

    Route::get('messages', [App\Http\Controllers\MessagesController::class, 'index']);




});


Route::get("/logins",[homeControl::class,"log"]);

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

// Route::get("/redirect",[homeControl::class,"redirectFunct"]);


