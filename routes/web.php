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

Route::get('/' , 'FrontController@index');

Route::get('/', function () {
    return view('font/index');
});

Route::get('/news', 'FrontController@news');


Route::get('logoin', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
