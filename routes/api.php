<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'cors'], function () {

    //...
    //Route::group(['namespace' => 'Api\Auth'], function () {
    Route::post('sign-up', 'App\Http\Controllers\Api\Auth\UserController@signUp');
    Route::post('sign-in', 'App\Http\Controllers\Api\Auth\UserController@signIn');
    Route::post('logout', 'App\Http\Controllers\Api\Auth\UserController@logout ');


    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('requisition', 'App\Http\Controllers\Api\Admin\RequisitionController@requisitionRequest');
        Route::post('requisition-list', 'App\Http\Controllers\Api\Admin\RequisitionController@getRequisitionList');
    });
    // });
    //...

});

// if api not found
Route::fallback(function () {
    return response()->routeNotFound();
});
