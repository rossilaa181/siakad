<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::resource('/mahasiswa', MahasiswaController::class);
// Route::get('khs', function () {
//     return view('mahasiswa.khs');
// });

Route::get('/khsmahasiswa/{id}', [MahasiswaController::class, 'khs'])->name('mahasiswa.khs');

Route::get('/khsmahasiswa/cetak_pdf/{id}', [MahasiswaController::class, 'cetak_khs'])->name('cetak_khs');