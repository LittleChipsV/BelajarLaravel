<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerhitungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;

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
    return view('welcome');
});

Route::get('/tes', function () {
    return view('tes');
});

Route::get('/hitung', [BerhitungController::class, 'hitung']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/pelanggan', [PelangganController::class, 'index']);