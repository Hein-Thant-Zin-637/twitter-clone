<?php

use App\Http\Controllers\RegisterConroller;
use App\Models\Post;
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
    return view('layouts.index');
})->middleware('guest')->name('welcome');

Route::get('/singup/{step}',  [App\Http\Controllers\RegisterController::class,'index'])->name('singup');
Route::post('/singup/{step}',  [App\Http\Controllers\RegisterController::class,'store']);

Route::get('/singin/{step}',  [App\Http\Controllers\LoginController::class,'index'])->name('singin');
Route::post('/singin/{step}',  [App\Http\Controllers\LoginController::class,'store']);

Route::get('/logout', [App\Http\Controllers\LoginController::class,'logout'])->name('logout');
Route::get('/addaccount', [App\Http\Controllers\LoginController::class,'addaccount'])->name('addaccount');

Route::get('/home', function () {
    return view('twitter.index');
})->middleware('auth')->name('home');

Route::get('/explore', function () {
    return view('twitter.explore');
})->middleware('auth')->name('explore');

Route::get('/notification', function () {
    return view('twitter.notification');
})->middleware('auth')->name('notification');

Route::get('/bookmark', function () {
    return view('twitter.bookmark');
})->middleware('auth')->name('bookmark');

Route::get('/post/{user_name}/status/{id}', function ($user_name, $id) {
    $post = Post::find($id);
    return view('twitter.show',[ 'post'=>$post ]);
})->middleware('auth')->name('postdetail');



Route::get('/dashboard', function () {
    return view('admin.index');
});

