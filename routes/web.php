<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

//admin route
Route::get('/', function() {
    return redirect()->route('admin-login');
});
Route::group(['prefix' => 'admin'], function() {

    Route::get('/login', 'App\Http\Controllers\AdminController@loginPage')->name('admin-login');
    Route::post('login', 'App\Http\Controllers\AdminController@login')->name('adminlogin-check');
    Route::get('/signup', 'App\Http\Controllers\AdminController@registerPage')->name('admin-signup');
    Route::post('/signup', 'App\Http\Controllers\AdminController@register')->name('register');
    Route::get('/logout', 'App\Http\Controllers\AdminController@logout')->name('logout');

Route::group(['middleware' => ['auth:admin']], function() {

    Route::get('/dashboard', 'App\Http\Controllers\InsertDataController@welcomePage')->name('welcome-page');
    Route::get('/app-type', 'App\Http\Controllers\InsertDataController@applicationTypeShow')->name('type-show');
    Route::post('/app-types', 'App\Http\Controllers\InsertDataController@storeType')->name('store-type');
    Route::get('/nid-file', 'App\Http\Controllers\InsertDataController@showNidFile')->name('nidfile-show');
    Route::post('/nidupload','App\Http\Controllers\InsertDataController@storeNid')->name('nid-store');
    Route::get('/form', 'App\Http\Controllers\InsertDataController@showForm')->name('application-form');
    Route::post('/form', 'App\Http\Controllers\InsertDataController@insertApplicationData')->name('insert-data');
    Route::get('/list', 'App\Http\Controllers\ShowApplicationInfoController@showData')->name('application-list');
    Route::get('app-view/{id}', 'App\Http\Controllers\ShowApplicationInfoController@applicationView')->name('application-show');
    Route::get('/update/{id}', 'App\Http\Controllers\ShowApplicationInfoController@formUpdate')->name('show-applicationUpdate');
    Route::post('/update/{id}', 'App\Http\Controllers\ShowApplicationInfoController@applicationUpdated')->name('application-update');
    Route::delete('/delete/{id}', 'App\Http\Controllers\ShowApplicationInfoController@applicationDelete')->name('application-delete');
    Route::delete('/file/{id}', 'App\Http\Controllers\ShowApplicationInfoController@fileDelete')->name('upload-file-delete');
    Route::get('/filelist/{id}', 'App\Http\Controllers\ShowApplicationInfoController@fileList')->name('allfile-show');
    Route::get('/generate-pdf/{id}', 'App\Http\Controllers\ShowApplicationInfoController@generatePDF')->name('pdf-download');
    Route::get('/download/{id}', 'App\Http\Controllers\ShowApplicationInfoController@download');
});

});

// Route::get('/test','App\Http\Controllers\AdminController@test')->name('test');
