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

Route::group(['middleware' => 'auth', 'prefix' => 'pengguna'], function(){
    Route::group(['prefix'=>'user', 'as'=>'user.'], function() {
        Route::post('assign-role', 'UserController@assignRole')->name('assign.role');
        Route::post('revoke-role', 'UserController@revokeRole')->name('revoke.role');
        Route::get('update-status', 'UserController@updateStatus')->name('update.status');
        Route::get('/', 'UserController@index')->name('index');
        Route::post('/store', 'UserController@store')->name('store');
        Route::get('show/{nip}', 'UserController@show')->name('show');
        Route::get('create', 'UserController@create')->name('create') ;
        Route::delete('destroy/{nip}', 'UserController@destroy')->name('destroy');
    });

    Route::group(['prefix'=>'role', 'as'=>'role.'], function() {
        Route::post('assign-permission', 'RoleController@assignPermission')->name('assign.permission');
        Route::post('revoke-permission', 'RoleController@revokePermission')->name('revoke.permission');
        Route::get('/', 'RoleController@index')->name('index');
        Route::post('store', 'RoleController@store')->name('store');
        Route::delete('destroy/{id}', 'RoleController@destroy')->name('destroy');
        Route::get('show/{id}', 'RoleController@show')->name('show');
    });

    Route::group(['prefix'=>'permission', 'as'=>'permission.'], function() {
        Route::get('/', 'PermissionController@index')->name('index');
        Route::post('store', 'PermissionController@store')->name('store');
        Route::delete('destroy/{id}', 'PermissionController@destroy')->name('destroy');
    });
});
