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

Route::as('members.')->middleware('auth')->group(function () {
Route::get('/members', 'App\Http\Controllers\memberController@members')->name('members');
Route::get('/members/{member}', 'App\Http\Controllers\memberController@show')->name('show');
Route::get('me/edit', 'App\Http\Controllers\memberController@edit')->name('edit');
Route::post('me/edit', 'App\Http\Controllers\memberController@update')->name('update');
Route::get('/search/member', 'App\Http\Controllers\memberController@search')->name('search');
Route::get('form', 'App\Http\Controllers\memberController@form')->name('form');
});

Route::as('chats.')->middleware('auth')->group(function () {
Route::get('rooms', 'App\Http\Controllers\ChatsController@rooms')->name('rooms');
Route::get('/member/{member}/room', 'App\Http\Controllers\ChatsController@room')->name('room');
Route::get('/member/{member}/fetch', 'App\Http\Controllers\ChatsController@fetch')->name('fetch');
Route::get('/member/{member}/getData', 'App\Http\Controllers\ChatsController@getData')->name('getData');
// scrollメソッドにもrouting必要か
// Route::get('member/{member}/result/ajax', 'App\Http\Controllers\ChatsController@getData')->name('result');
Route::post('/member/{member}/add', 'App\Http\Controllers\ChatsController@add')->name('add');
Route::post('{member}/delete', 'App\Http\Controllers\ChatsController@delete')->name('delete');
});


Route::prefix('timelines')->as('timelines.')->group(function () {
    Route::middleware('auth')->group(function () {
    Route::get('/', 'App\Http\Controllers\TimelinesController@timelines')->name('timelines');
    Route::post('store', 'App\Http\Controllers\TimelinesController@store')->name('store');
    Route::post('{timeline}/delete', 'App\Http\Controllers\TimelinesController@delete')->name('delete');
    Route::post('{timeline}/reply', 'App\Http\Controllers\TimelinesController@reply')->name('reply');
    });
    Route::get('{timeline}', 'App\Http\Controllers\TimelinesController@show')->name('show');
});

