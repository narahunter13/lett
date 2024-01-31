<?php

use App\Http\Controllers\SuratKeluar\Home as SuratKeluarHome;
use App\Http\Controllers\SuratMasuk\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::prefix('surat-masuk')->group(function () {
    Route::get('/', [Home::class, 'index']);
});

Route::prefix('surat-keluar')->group(function () {
    Route::get('/', [SuratKeluarHome::class, 'index']);
});