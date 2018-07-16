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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('order')->group(function () {
    Route::post('upload', [
        'as' => 'api.order.upload',
        'uses' => 'OrdersController@upload'
    ]);

    Route::post('check/{email}', [
        'as' => 'api.order.check',
        'uses' => 'OrdersController@check'
    ]);

    Route::post('previous/{id}', [
        'as' => 'api.order.previous',
        'uses' => 'OrdersController@getPreviousOrder'
    ]);

    Route::post('update/item', [
        'as' => 'api.order.update.item',
        'uses' => 'OrdersController@updateItem'
    ]);
});