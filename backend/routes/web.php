<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
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
Route::get('/members', 'App\Http\Controllers\memberController@members')->name('members');
Route::get('/members/{member}', 'App\Http\Controllers\memberController@show')->name('members.show');
Route::get('me/edit', 'App\Http\Controllers\memberController@edit')->name('members.edit');
Route::post('me/edit', 'App\Http\Controllers\memberController@update')->name('members.update');
Route::get('rooms', 'App\Http\Controllers\ChatsController@rooms')->name('chats.rooms');
Route::get('/member/{member}/room', 'App\Http\Controllers\ChatsController@room')->name('chats.room');
Route::post('/member/{member}/add', 'App\Http\Controllers\ChatsController@add')->name('chats.add');
Route::get('member/{member}/result/ajax', 'App\Http\Controllers\ChatsController@getData')->name('chats.result');
Route::get('/timelines', 'App\Http\Controllers\TimelinesController@timelines')->name('timelines.timelines');
Route::prefix('timelines')->as('timelines.')->group(function () {
    Route::middleware('auth')->group(function () {
    Route::get('create', 'App\Http\Controllers\TimelinesController@create')->name('create');
    Route::post('store', 'App\Http\Controllers\TimelinesController@store')->name('store');
    Route::post('{timeline}/delete', 'App\Http\Controllers\TimelinesController@delete')->name('delete');
    Route::post('{timeline}/reply', 'App\Http\Controllers\TimelinesController@reply')->name('reply');
    });
    Route::get('{timeline}', 'App\Http\Controllers\TimelinesController@show')->name('show');
});
Route::get('/search/member', 'App\Http\Controllers\memberController@search')->name('members.search');
Route::get('form', 'App\Http\Controllers\memberController@form')->name('members.form');

