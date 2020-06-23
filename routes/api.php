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

Route::group(['middleware' => 'auth:api', 'namespace' => 'Admin\Api', 'prefix' => 'v1'], function(){
    Route::get('product', 'ProductController@index')->name('api.product.index');
    Route::get('order', 'OrderController@index')->name('api.order.index');
});
