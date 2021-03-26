<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'App\Http\Controllers\InsertDataController@showForm');
Route::post('/form', 'App\Http\Controllers\InsertDataController@insertForm')->name('insert-data');
Route::get('/list', 'App\Http\Controllers\ShowApplicationInfoController@showData')->name('application-list');
Route::get('/update/{id}', 'App\Http\Controllers\ShowApplicationInfoController@updateDataShow')->name('show-applicationUpdate');
Route::post('/update/{id}', 'App\Http\Controllers\ShowApplicationInfoController@updated')->name('application-update');
Route::delete('/delete/{id}', 'App\Http\Controllers\ShowApplicationInfoController@delete')->name('application-delete');
Route::delete('/file/{id}', 'App\Http\Controllers\ShowApplicationInfoController@fileDelete')->name('upload-file-delete');
