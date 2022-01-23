<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cc', 'ShortLinkController@index')->name('generate.shorten.link'); // cc url после домена
Route::post('/cc', 'ShortLinkController@store')->name('generate.shorten.link.post'); // сохраняет ссылку в БД
Route::get('/{code}', 'ShortLinkController@shortenLink')->name('shorten.link'); // code динамический параметр


