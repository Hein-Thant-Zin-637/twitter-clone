<?php

use App\Http\Controllers\RegisterConroller;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Livewire\ImageUpload;
use Illuminate\Support\Facades\DB;

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

Route::get('/test', function () {
    $message = Message::find(46);
    dd($message->media->media);
});

Route::get('/', function () {
    return view('layouts.index');
})->middleware('guest')->name('welcome');

Route::get('/singup/{step}',  [App\Http\Controllers\RegisterController::class,'index'])->name('singup');
Route::post('/singup/{step}',  [App\Http\Controllers\RegisterController::class,'store']);
Route::get('/singin/{step}',  [App\Http\Controllers\LoginController::class,'index'])->name('singin');
Route::post('/singin/{step}',  [App\Http\Controllers\LoginController::class,'store']);
Route::get('/logout', [App\Http\Controllers\LoginController::class,'logout'])->name('logout');

//chat
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'chat'])->name('chat');
Route::post('/chat/{id}', [App\Http\Controllers\ChatController::class, 'conversation'])->name('conversation');
Route::get('/chat/conversation/{sender_id}/{reciever}', [App\Http\Controllers\ChatController::class, 'conversationDetail'])->name('conversationDetail');
Route::delete('/chat/conversation/delete/{id}', [App\Http\Controllers\ChatController::class, 'deleteConversation'])->name('deleteConversation');
Route::post('/chat/conversation/sendMessage/{id}', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('sendMessage');
Route::get('/imageUpload', ImageUpload::class);


Route::get('/dashboard', function () {
    return view('admin.index');
});

Route::get('/home', function () {
    return view('twitter.index');
});