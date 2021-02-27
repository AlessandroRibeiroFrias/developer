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

Route::group(['prefix' => 'developers'], function () {
    Route::get('', 'App\Http\Controllers\ControllerDeveloper@index');
    Route::get('/{id_developer}', 'App\Http\Controllers\ControllerDeveloper@show')->where('id_developer', '[0-9]+');
    Route::post('', 'App\Http\Controllers\ControllerDeveloper@store');
    Route::put('/{id_developer}', 'App\Http\Controllers\ControllerDeveloper@update')->where('id_developer', '[0-9]+');
    Route::delete('/{id_developer}', 'App\Http\Controllers\ControllerDeveloper@destroy')->where('id_developer', '[0-9]+');
});
