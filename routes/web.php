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
    return view('welcome');
});
/*
 * front end routes
 *
 * */
Route::get('index','FrontController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * admin panel routes
 * */
Route::get('admin/index','AdminController@index');
Route::get('admin/create-product','AdminController@create')->name('create.product');
Route::post('admin/store-category','AdminController@storeproduct');
Route::get('admin/add-product','AdminController@add_product');
Route::post('admin/store_product','AdminController@store')->name('store.product');
Route::post('admin/store-variants','AdminController@storevariants')->name('store.variant');
Route::post('admin/storeimage','AdminController@storeimage')->name('store.image');
Route::get('admin/create-variant','AdminController@variant');
Route::post('admin/store-key','AdminController@storevarient')->name('add.key');

/**
 *
 *
 */
Route::get('admin/test','TestController@blur');
Route::post('admin/test','TestController@store')->name('store');





