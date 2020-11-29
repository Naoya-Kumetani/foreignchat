<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenberController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/menbers', 'App\Http\Controllers\MenberController@menbers')->name('menbers');
Route::get('/menbers/{menber}', 'App\Http\Controllers\MenberController@show')->name('menbers.show');
Route::get('me/edit', 'App\Http\Controllers\MenberController@edit')->name('menbers.edit');
Route::post('me/edit', 'App\Http\Controllers\MenberController@update')->name('menbers.update');
Route::get('rooms', 'App\Http\Controllers\ChatsController@rooms')->name('chats.rooms');
Route::get('/menber/{menber}/room', 'App\Http\Controllers\ChatsController@room')->name('chats.room');
Route::post('/menber/{menber}/add', 'App\Http\Controllers\ChatsController@add')->name('chats.add');
Route::get('/result/ajax', 'App\Http\Controllers\ChatsController@getData')->name('chats.result');