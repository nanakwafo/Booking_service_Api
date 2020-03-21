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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//create a  user
Route::post ('register', 'AuthenticationController@register');
//create a   login
Route::post ('login', 'AuthenticationController@login');

//List Booking
Route::get ('bookings', 'bookingController@index');

// List Single Booking
Route::get ('booking/{id}', 'bookingController@show');

//create a booking
Route::post ('booking', 'bookingController@store');

//Update booking
Route::patch ('booking', 'bookingController@store');

//Delete booking
Route::get ('booking/{id}', 'bookingController@destroy');


//List Services
Route::get ('services', 'ServiceController@index');

// List Single Service
Route::get ('service/{id}', 'ServiceController@show');

//create a Service
Route::post ('service', 'ServiceController@store');

//Update Service
Route::patch ('service/{id}', 'ServiceController@update');

//Delete Service
Route::delete ('service/{id}', 'ServiceController@destroy');