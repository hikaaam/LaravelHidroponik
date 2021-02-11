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

Route::get('Mobile','MobileAuthController@index');
Route::get('Mobile/{id}','MobileAuthController@show');
Route::post('Mobile','MobileAuthController@store');
Route::put('Mobile/{id}','MobileAuthController@update');
Route::delete('Mobile/{id}','MobileAuthController@destroy');

Route::get('Prototype','MobilePrototypeController@index');
Route::get('Prototype/{id}','MobilePrototypeController@show');
Route::post('Prototype','MobilePrototypeController@store');
Route::put('Prototype/{id}','MobilePrototypeController@update');
Route::delete('Prototype/{id}','MobilePrototypeController@destroy');

Route::get('Login','LoginController@index');
Route::get('Login/{id}','LoginController@show');
Route::post('Login','LoginController@store');
Route::put('Login/{id}','LoginController@update');
Route::delete('Login/{id}','LoginController@destroy');

Route::get('notifications','MobileNotificationController@index');
Route::get('notifications/{id}','MobileNotificationController@show');
Route::post('notifications','MobileNotificationController@store');
Route::put('notifications/{id}','MobileNotificationController@update');
Route::delete('notifications/{id}','MobileNotificationController@destroy');

Route::get('cat','CategoriesController@index');
Route::get('cat/{id}','CategoriesController@show');
