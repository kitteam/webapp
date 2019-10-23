<?php

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
    return 'Профилактические работы';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'callback'], function () {
    Route::any('tele2', 'CallbackController@tele2');
});

Route::get('/test', function (Telegram $telegram) {
    $request = $telegram::sendMessage(['chat_id' => env('TELEGRAM_CHAT_ID'), 'text' => 'test']);
    print_r($request);
});
