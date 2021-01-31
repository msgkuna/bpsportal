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
Route::group(['middleware' => 'auth', 'prefix' => 'anggaran'], function(){
        Route::get('dipa', 'DipaController')->name('dipa');

        Route::group(['prefix'=>'data/kro', 'as'=>'kro.'], function() {
            Route::get('/', 'KroController@index')->name('index');
            Route::get('file-upload', 'KroController@fileUpload')->name('upload');
            Route::post('file-upload-post', 'KroController@fileUploadPost')->name('upload.post');
        });

        Route::group(['prefix'=>'data/ro', 'as'=>'ro.'], function() {
            Route::get('/', 'RoController@index')->name('index');
            Route::get('file-upload', 'RoController@fileUpload')->name('upload');
            Route::post('file-upload-post', 'RoController@fileUploadPost')->name('upload.post');
        });

        Route::group(['prefix'=>'data/komponen', 'as'=>'kmpnen.'], function() {
            Route::get('/', 'KmpnenController@index')->name('index');
            Route::get('file-upload', 'KmpnenController@fileUpload')->name('upload');
            Route::post('file-upload-post', 'KmpnenController@fileUploadPost')->name('upload.post');
        });

        Route::group(['prefix'=>'data/subkomponen', 'as'=>'skmpnen.'], function() {
            Route::get('/', 'SkmpnenController@index')->name('index');
            Route::get('file-upload', 'SkmpnenController@fileUpload')->name('upload');
            Route::post('file-upload-post', 'SkmpnenController@fileUploadPost')->name('upload.post');
        });

        Route::group(['prefix'=>'data/akun', 'as'=>'akun.'], function() {
            Route::get('/', 'AkunController@index')->name('index');
            Route::get('file-upload', 'AkunController@fileUpload')->name('upload');
            Route::post('file-upload-post', 'AkunController@fileUploadPost')->name('upload.post');
        });

        Route::group(['prefix'=>'data/detail', 'as'=>'item.'], function() {
            Route::get('/', 'ItemController@index')->name('index');
            Route::get('file-upload', 'ItemController@fileUpload')->name('upload');
            Route::post('file-upload-post', 'ItemController@fileUploadPost')->name('upload.post');
        });

        Route::prefix('master')->group(function() {
            Route::get('satker', 'MsatkerController')->name('msatker');
            Route::get('dept', 'MdeptController')->name('mdept');
            Route::get('unit', 'MunitController')->name('munit');
            Route::get('lokasi', 'MlokasiController')->name('mlokasi');
            Route::get('kabkota', 'MkabkotaController')->name('mkabkota');
            Route::get('program', 'MprogramController')->name('mprogram');
            Route::get('giat', 'MgiatController')->name('mgiat');
            Route::get('akun', 'MakunController')->name('makun');
        });
});
