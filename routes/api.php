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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//create a  user
Route::post('register','Api/AuthController@register');
//create a   login
Route::post('login','Api/AuthController@login');

//List Booking
Route::get('bookings','bookingController@index');

// List Single Booking
Route::get('booking/{id}','bookingController@show');

//create a booking
Route::post('booking','bookingController@store');

//Update booking
Route::put('booking','bookingController@store');

//Delete booking
Route::get('booking/{id}','bookingController@destroy');



//List Services
Route::get('services','ServiceController@index');

// List Single Booking
Route::get('service/{id}','ServiceController@show');

//create a booking
Route::post('service','ServiceController@store');

//Update booking
Route::put('service','ServiceController@store');

//Delete booking
Route::get('service/{id}','ServiceController@destroy');