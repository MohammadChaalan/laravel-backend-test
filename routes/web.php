<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
// Messages Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/message/show','MessagesController@showMessages')->middleware('auth')->name('messages.show');
Route::get('/message/show/{id}', 'MessagesController@showOneMessages')->name('one.message.show');
// End Message Route

// Route Comment
Route::get('/users/comment/add/form', 'UserController@createCommentForm')->name('users.add.comment');
Route::post('/users/comment/add', 'UserController@createComment')->name('users.comment');
// End Route comment