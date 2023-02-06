<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeControl;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

    Route::get('profile', [App\Http\Controllers\UserController::class, 'index']);

    Route::get('edit', [App\Http\Controllers\UserController::class, 'edits']);

    Route::POST('edit', [App\Http\Controllers\UserController::class, 'updateUserDetails']);

    Route::post('edited', [App\Http\Controllers\UserController::class, 'updateAvatar']);

    Route::get('category', [App\Http\Controllers\CategoryController::class, 'index']);

    Route::get('create', [App\Http\Controllers\CategoryController::class, 'create']);

    Route::POST('category', [App\Http\Controllers\CategoryController::class, 'store']);

    Route::get('category/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit']);

    Route::put('category/{category}', [App\Http\Controllers\CategoryController::class, 'update']);
});


Route::get("/logins",[homeControl::class,"log"]);

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get("/redirect",[homeControl::class,"redirectFunct"]);


