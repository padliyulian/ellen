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
Route::group(['namespace' => 'Customer'], function(){
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('/product/{product}', 'ProductController@show')->name('product.show');
    Route::post('/product', 'ProductController@order')->name('product.order');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/product', 'ProductController@index')->name('product-admin.index');
    Route::get('/product/add', 'ProductController@add')->name('product-admin.add');
    Route::get('/product/{product}', 'ProductController@show')->name('product-admin.show');
    Route::post('/product', 'ProductController@store')->name('product-admin.store');
    Route::patch('/product/{product}', 'ProductController@update')->name('product-admin.update');
    Route::delete('/product/{product}', 'ProductController@destroy')->name('product-admin.destroy');
});
