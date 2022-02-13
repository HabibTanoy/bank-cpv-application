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
Route::post('/application-create', 'App\Http\Controllers\InsertDataController@insertApplicationData');
Route::get('/application-list', 'App\Http\Controllers\ShowApplicationInfoController@showData');
Route::get('/application-details/{id}', 'App\Http\Controllers\ShowApplicationInfoController@applicationView');
Route::get('/application-update/{id}', 'App\Http\Controllers\ShowApplicationInfoController@formUpdate');
Route::post('/application-updated/{id}', 'App\Http\Controllers\ShowApplicationInfoController@applicationUpdated');
Route::delete('/application-delete/{id}', 'App\Http\Controllers\ShowApplicationInfoController@applicationDelete');
