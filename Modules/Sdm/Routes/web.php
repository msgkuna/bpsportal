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
Route::group(['middleware' => 'auth', 'prefix'=>'sdm'], function(){
    Route::prefix('master')->group(function(){
        Route::get('agama', 'AgamaController')->name('agama');
        Route::get('status', 'StatusController')->name('status');
        Route::get('satker', 'SatkerController')->name('satker');
        Route::get('jabatan', 'JabatanController')->name('jabatan');
        Route::get('pangkat', 'PangkatController')->name('pangkat');
        Route::get('pendidikan', 'PendidikanController')->name('pendidikan');
        Route::get('kawin', 'KawinController')->name('kawin');
        Route::resource('bank', 'BankController')->except(['show']);
        Route::get('tugas', 'TugasController@index')->name('tugas.index');
        Route::get('create', 'TugasController@create')->name('tugas.create');
        Route::post('store', 'TugasController@store')->name('tugas.store');
        Route::delete('destroy', 'TugasController@destroy')->name('tugas.destroy');
        Route::get('fungsional', 'FungsionalController')->name('fungsional');
        Route::get('jenjang', 'JenjangController')->name('jenjang');
    });

    Route::resource('/pegawai', 'PegawaiController');
    Route::get('get_by_tugas', 'PegawaiController@get_by_tugas')->name('pegawai.get_by_tugas');
});
