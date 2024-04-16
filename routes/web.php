<?php

use App\Http\Controllers\RegisterConroller;
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


Route::get('/dashboard', function () {
    return view('admin.index');
});

Route::get('/home', function () {
    return view('twitter.index');
});