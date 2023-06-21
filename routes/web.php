<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return to_route('post.index');
});

Route::resource('post', PostController::class)->middleware('auth');


Route::post('login', [AuthController::class, 'store'])->name("auth.login");
Route::get('logout', [AuthController::class, 'destroy'])->name("logout");
Route::get('login', [AuthController::class, "create"])->name("login");

Route::get('register', [UserAccountController::class, 'create'])->name("useraccount.create");
Route::post('register', [UserAccountController::class, 'store'])->name("useraccount.store");
Route::get('users/{user}',[UserAccountController::class, 'show'])->name("useraccount.show");
Route::get('users/following/{user}',[UserAccountController::class, 'following'])->name("useraccount.following");

