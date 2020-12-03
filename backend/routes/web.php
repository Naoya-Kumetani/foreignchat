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
Route::get('menber/{menber}/result/ajax', 'App\Http\Controllers\ChatsController@getData')->name('chats.result');
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
Route::get('/search/menber', 'App\Http\Controllers\MenberController@search')->name('menbers.search');
Route::get('form', 'App\Http\Controllers\MenberController@form')->name('menbers.form');

