<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group([ "middleware" => ['auth:sanctum', config('jetstream.auth_session'), 'verified'] ], function() {
    Route::get('/dashboard', [DataController::class, "dashboard"])->name('dashboard');

    Route::get('/datapemeliharaaan', [DataController::class,'index'])->name('data.index');

    Route::group([ "middleware" => ['role:admin'] ], function() {
        Route::get('/user', [ UserController::class, "index_view" ])->name('user');
        Route::view('/user/new', "pages.user.user-new")->name('user.new');
        Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
        Route::get('/tambahdata', [DataController::class,'tambah_data_index'])->name('data.tambah.index');

        Route::post('/datapemeliharaaan', [DataController::class,'tambah_data'])->name('data.tambah');

        Route::get('/edit/{id}', [DataController::class, 'edit_data_index'])->name('edit.index');
        Route::post('/editdata/{id}', [DataController::class,'edit_data'])->name('data.edit');

        Route::post('/hapus/{id}', [DataController::class,'hapus_data'])->name('data.hapus');
    });

});

Route::get('/tambahdata', [DataController::class,'tambah_data_index'])->name('data.tambah.index');
