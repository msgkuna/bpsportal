<?php
// use Illuminate\Support\Facades\Route;
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
    Route::prefix('pengguna')->group(function() {
        Route::get('/', 'PenggunaController@index')->name('pengguna.index');
        Route::get('/create', 'PenggunaController@create')->name('pengguna.create');
        Route::put('/update', 'PenggunaController@update')->name('pengguna.update');
        Route::delete('/destroy/{nip}', 'PenggunaController@destroy')->name('pengguna.destroy');
        Route::get('/show/{nip}', 'PenggunaController@show')->name('pengguna.show');
        Route::get('/edit', 'PenggunaController@edit')->name('pengguna.edit');
        Route::post('/store', 'PenggunaController@store')->name('pengguna.store');
        Route::post('/add/role', 'PenggunaController@addRole')->name('pengguna.add.role');
        Route::post('/remove/role', 'PenggunaController@removeRole')->name('pengguna.remove.role');
        Route::get('/status/update', 'PenggunaController@updateStatus')->name('pengguna.update.status');
    });
    Route::post('/role/add/permission', 'RoleController@addPermission')->name('role.add.permission');
    Route::post('/role/remove/permission', 'RoleController@removePermission')->name('role.remove.permission');
    Route::resource('/role', 'RoleController')->except([
        'create', 'edit', 'update'
    ]);
    Route::resource('/permission', 'PermissionController')->except([
        'create', 'show', 'edit', 'update'
    ]);
    // Route::get('pages', \Modules\Pengguna\Http\Livewire\Role\RolePage::class)->name('role.page');
});
