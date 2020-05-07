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

Route::get('/cities', 'CityController@getAll');
Route::get('/cities/{id}', 'CityController@getById');
Route::post('/cities', 'CityController@save');
Route::put('/cities/{id}', 'CityController@update');
Route::delete('/cities/{id}', 'CityController@delete');

Route::get('/operations', 'OperationController@getAll');
Route::get('/operations/{id}', 'OperationController@getById');
Route::post('/operations', 'OperationController@save');
Route::put('/operations/{id}', 'OperationController@update');
Route::delete('/operations/{id}', 'OperationController@delete');
