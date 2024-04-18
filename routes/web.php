<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerhitungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ControllerGuru;
use App\Http\Controllers\ControllerSiswa;
use App\Http\Controllers\ControllerMataPelajaran;
use App\Http\Controllers\ControllerNilai;
use App\Http\Controllers\ControllerKelas;
use App\Http\Controllers\ControllerTopik;

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

Route::get('/siswa', [ControllerSiswa::class, 'index']);
Route::get('/guru', [ControllerGuru::class, 'index']);
Route::get('/kelas', [ControllerKelas::class, 'index']);
Route::get('/nilai', [ControllerNilai::class, 'index']);
Route::get('/mapel', [ControllerMataPelajaran::class, 'index']);
Route::get('/topik', [ControllerTopik::class, 'index']);

Route::post('/siswa', [ControllerSiswa::class, 'siswa']);
Route::post('/guru', [ControllerGuru::class, 'guru']);
Route::post('/kelas', [ControllerKelas::class, 'kelas']);
Route::post('/nilai', [ControllerNilai::class, 'nilai']);
Route::post('/mapel', [ControllerMataPelajaran::class, 'mapel']);
Route::post('/topik', [ControllerTopik::class, 'topik']);

Route::get('/tambahsiswa', [ControllerSiswa::class, 'tambahSiswa']);
Route::get('/tambahguru', [ControllerGuru::class, 'tambahGuru']);
Route::get('/tambahkelas', [ControllerKelas::class, 'tambahKelas']);
Route::get('/tambahnilai', [ControllerNilai::class, 'tambahNilai']);
Route::get('/tambahmapel', [ControllerMataPelajaran::class, 'tambahMapel']);
Route::get('/tambahtopik', [ControllerTopik::class, 'tambahTopik']);

Route::get('/siswa/{id}', [ControllerSiswa::class, 'show']);
Route::get('/guru/{id}', [ControllerGuru::class, 'show']);
Route::get('/kelas/{id}', [ControllerKelas::class, 'show']);
Route::get('/nilai/{id}', [ControllerNilai::class, 'show']);
Route::get('/mapel/{id}', [ControllerMataPelajaran::class, 'show']);
Route::get('/topik/{id}', [ControllerTopik::class, 'show']);