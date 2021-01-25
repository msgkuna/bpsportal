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
Route::group(['middleware' => 'auth'], function(){

    Route::prefix('anggaran')->group(function() {
        Route::get('/', 'AnggaranController@index');

        Route::prefix('akun')->group(function() {
            Route::get('/', 'AkunController@index')->name('akun.index');
            Route::get('file-upload', 'AkunController@fileUpload')->name('akun.upload');
            Route::post('file-upload-post', 'AkunController@fileUploadPost')->name('akun.upload.post');
        });

        Route::prefix('item')->group(function() {
            Route::get('/', 'ItemController@index')->name('item.index');
            Route::get('file-upload', 'ItemController@fileUpload')->name('item.upload');
            Route::post('file-upload-post', 'ItemController@fileUploadPost')->name('item.upload.post');
        });

        Route::prefix('kmpnen')->group(function() {
            Route::get('/', 'KmpnenController@index')->name('kmpnen.index');
            Route::get('file-upload', 'KmpnenController@fileUpload')->name('kmpnen.upload');
            Route::post('file-upload-post', 'KmpnenController@fileUploadPost')->name('kmpnen.upload.post');
        });

        Route::prefix('skmpnen')->group(function() {
            Route::get('/', 'SkmpnenController@index')->name('skmpnen.index');
            Route::get('file-upload', 'SkmpnenController@fileUpload')->name('skmpnen.upload');
            Route::post('file-upload-post', 'SkmpnenController@fileUploadPost')->name('skmpnen.upload.post');
        });

        Route::prefix('kro')->group(function() {
            Route::get('/', 'KroController@index')->name('kro.index');
            Route::get('file-upload', 'KroController@fileUpload')->name('kro.upload');
            Route::post('file-upload-post', 'KroController@fileUploadPost')->name('kro.upload.post');
        });

        Route::prefix('ro')->group(function() {
            Route::get('/', 'RoController@index')->name('ro.index');
            Route::get('file-upload', 'RoController@fileUpload')->name('ro.upload');
            Route::post('file-upload-post', 'RoController@fileUploadPost')->name('ro.upload.post');
        });

    });

});
