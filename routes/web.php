<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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



Route::get('post',[PostController::class,'index'])->name('post');

Route::post('store/post',[PostController::class,'store'])->name('post.store');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("lists/post",[PostController::class,"getListPost"])->name("get.list.post");

Route::post("store/like",[LikeController::class,"store"])->name("store.like");
