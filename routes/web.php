<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ChangePasswordController;

use Modules\Sdm\Http\Controllers\SdmController;
use Modules\Pengguna\Http\Controllers\PenggunaController;
use Modules\Anggaran\Http\Controllers\AnggaranController;

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
// Route::get('/', function() {
//     return redirect(route('login'));
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [HomeController::class, 'show'])->name('profile.show');
    Route::get('/password/change', [ChangePasswordController::class, 'change'])->name('password.change');
    Route::post('/password', [ChangePasswordController::class, 'update'])->name('password.update');

    Route::get('/sdm', [SdmController::class,'index'])->name('sdm');

    Route::get('/anggaran', [AnggaranController::class, 'index'])->name('anggaran');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    });
});

Route::fallback(function() {
    return 'Hm, why did you land here somehow?';
});
