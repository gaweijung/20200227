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
Route::get('/news/{id}', 'FrontController@news_detail');

Route::get('/products', 'FrontController@products');
Route::get('/products/{product_id}', 'FrontController@products_detail');
Route::get('/contact', 'FrontController@contact');
Route::post('/contact/sort', 'FrontController@contact');
Route::get('/product_detail', 'FrontController@product_detail'); //結帳買
Route::get('/add_cart/{product_id}', 'FrontController@add_cart'); //加入購物車
Route::get('/cart', 'FrontController@cart_total'); //購物車總攬


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

Route::post('home/ajax_delete_news_img', 'NewsController@ajax_delete_news_img')->middleware('auth');

Route::post('/home/ajax_post_sort', 'NewsController@ajax_post_sort')->middleware('auth');


//產品管理
Route::get('/home/products', 'ProductsController@index')->middleware('auth');

Route::post('/home/products/store', 'ProductsController@store')->middleware('auth');

Route::get('/home/products/create', 'ProductsController@create')->middleware('auth');

Route::get('/home/products/edit/{id}', 'ProductsController@edit')->middleware('auth');

Route::post('/home/products/updata/{id}', 'ProductsController@updata')->middleware('auth');

Route::post('/home/products/delete/{id}', 'ProductsController@delete')->middleware('auth');


//產品類別管理
Route::get('/home/productType', 'ProductTypeController@index')->middleware('auth');

Route::post('/home/productType/store', 'ProductTypeController@store')->middleware('auth');

Route::get('/home/productType/create', 'ProductTypeController@create')->middleware('auth');

Route::get('/home/productType/edit/{id}', 'ProductTypeController@edit')->middleware('auth');

Route::post('/home/productType/updata/{id}', 'ProductTypeController@updata')->middleware('auth');

Route::post('/home/productType/delete/{id}', 'ProductTypeController@delete')->middleware('auth');
