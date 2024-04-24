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


Route::get('/home', function () {
    return view('twitter.index');
});

//Admin
Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


//admin-post
Route::get('/admin/post-table',[App\Http\Controllers\PostController::class,'adminPostTable'])->name('post-table');
Route::get('/admin/post-detail/{id}',[\App\Http\Controllers\ReportController::class,'detail'])->name('post-detail');
Route::delete('/admin/delete-post/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('delete-post');


//admin-report-post
Route::get('/admin/report-post-table',[App\Http\Controllers\ReportController::class,'adminReportPostTable'])->name('report-post-table');

//admin-user
Route::get('/admin/user-table',[App\Http\Controllers\BanController::class,'adminUserTable'])->name('user-table');
Route::get('/admin/ban-user/{id}',[\App\Http\Controllers\BanController::class,'banForm'])->name('ban-form');
Route::post('/admin/ban-user',[\App\Http\Controllers\BanController::class,'ban'])->name('ban-form');
Route::delete('/admin/unban/{id}', [App\Http\Controllers\BanController::class, 'delete'])->name('unban');

