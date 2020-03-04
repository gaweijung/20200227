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

// Route::get('/', function () {
//     return view('font/index');
// });

Route::get('/news', 'FrontController@news');


// Route::get('logoin', 'HomeController@index');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::get('/home/news', 'NewsController@index')->middleware('auth');

Route::post('/home/news/store', 'NewsController@store')->middleware('auth');

Route::get('/home/news/create', 'NewsController@create')->middleware('auth');

Route::get('/home/news/edit/{id}', 'NewsController@edit')->middleware('auth');

Route::post('/home/news/updata/{id}', 'NewsController@updata')->middleware('auth');

Route::post('/home/news/delete/{id}', 'NewsController@delete')->middleware('auth');
