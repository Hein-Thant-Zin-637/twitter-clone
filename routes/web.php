<?php

use App\Http\Controllers\RegisterConroller;

use App\Models\Chat;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
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

Route::get('/auth/google', [App\Http\Controllers\RegisterController::class,'redirectToGoogle'])->name('google-auth');
Route::get('/auth/google/callback', [App\Http\Controllers\RegisterController::class,'handleGoogleCallback']);

Route::get('/singup/{step}',  [App\Http\Controllers\RegisterController::class,'index'])->name('singup');
Route::post('/singup/{step}',  [App\Http\Controllers\RegisterController::class,'store']);

Route::get('/singin/{step}',  [App\Http\Controllers\LoginController::class,'index'])->name('singin');
Route::post('/singin/{step}',  [App\Http\Controllers\LoginController::class,'store']);

Route::get('/logout', [App\Http\Controllers\LoginController::class,'logout'])->name('logout');

//chat
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'chat'])->name('chat');
Route::get('/chat/{id}', [App\Http\Controllers\ChatController::class, 'conversation'])->name('conversation');
Route::get('/chat/conversation/{sender_id}/{reciever}', [App\Http\Controllers\ChatController::class, 'conversationDetail'])->name('conversationDetail');
Route::delete('/chat/conversation/delete/{id}', [App\Http\Controllers\ChatController::class, 'deleteConversation'])->name('deleteConversation');
Route::post('/chat/conversation/sendMessage/{id}', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('sendMessage');
Route::get('/imageUpload', ImageUpload::class);


Route::get('/dashboard', function () {
    return view('admin.index');
});
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

Route::get('/setting', function () {
    return view('twitter.setting');
})->middleware('auth')->name('setting');

Route::get('/{user_name}/status/{id}', function ($user_name, $id) {
    $post = Post::find($id);
    return view('twitter.show',[ 'post'=>$post ]);
})->middleware('auth')->name('postdetail');



//profile
Route::get('/{user_name}', function ($user_name) {
    $user = User::where('user_name',$user_name)->first();
    if((auth()->user()?->hasBlock($user->id))){
        return back();
    }elseif((auth()->user()?->hasBlocked($user->id))){
        return back();
    }else{
        return view('twitter.profile',[ 'user' => $user]);
    }
})->middleware('auth')->name('profile');

Route::post('/update-profile',[\App\Http\Controllers\UserController::class,'update'])->name('update-profile');



//Admin
Route::get('/admin/dashboard',[App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');



//admin-post
Route::get('/admin/post-table',[App\Http\Controllers\PostController::class,'adminPostTable'])->name('post-table');
Route::get('/admin/post-detail/{id}',[\App\Http\Controllers\ReportController::class,'detail'])->name('post-detail');
Route::delete('/admin/delete-post/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('delete-post');

//admin-report-post
Route::get('/admin/report-post-table',[App\Http\Controllers\ReportController::class,'adminReportPostTable'])->name('report-post-table');

//admin-report-message
Route::get('/admin/report-message-table',[App\Http\Controllers\MessageReportController::class,'adminReportMessageTable'])->name('report-message-table');
Route::get('/admin/ban-span-message-user/{id}',[\App\Http\Controllers\MessageReportController::class,'banForm'])->name('ban-span-message-form');
Route::post('/admin/ban-span-message-user',[\App\Http\Controllers\MessageReportController::class,'ban'])->name('ban-span-message-form');
Route::delete('/admin/delete-chat/{id}', [App\Http\Controllers\MessageReportController::class, 'deleteChat'])->name('delete-chat');


//admin-user
Route::get('/admin/user-table',[App\Http\Controllers\BanController::class,'adminUserTable'])->name('user-table');
Route::get('/admin/ban-user/{id}',[\App\Http\Controllers\BanController::class,'banForm'])->name('ban-form');
Route::post('/admin/ban-user',[\App\Http\Controllers\BanController::class,'ban'])->name('ban-form');
Route::delete('/admin/unban/{id}', [App\Http\Controllers\BanController::class, 'delete'])->name('unban');
Route::get('/admin/user-detail/{id}',[\App\Http\Controllers\UserController::class, 'detail'])->name('user-detail');
