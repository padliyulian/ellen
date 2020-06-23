<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Admin\Api', 'prefix' => 'v1'], function(){
    Route::get('product', 'ProductController@index')->name('api.product.index');
    Route::post('product', 'ProductController@store')->name('api.product.store');
});
