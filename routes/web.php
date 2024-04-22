<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BerhitungController,
    DashboardController,
    PelangganController,
    ControllerGuru,
    ControllerSiswa,
    ControllerMataPelajaran,
    ControllerNilai,
    ControllerKelas,
    ControllerTopik
};

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

Route::resource('siswa', ControllerSiswa::class);
Route::resource('guru', ControllerGuru::class);
Route::resource('kelas', ControllerKelas::class);
Route::resource('nilai', ControllerNilai::class);
Route::resource('mata-pelajaran', ControllerMataPelajaran::class);
Route::resource('topik', ControllerTopik::class);


// Route::get('/siswa', [ControllerSiswa::class, 'index']);
// Route::get('/guru', [ControllerGuru::class, 'index']);
// Route::get('/kelas', [ControllerKelas::class, 'index']);
// Route::get('/nilai', [ControllerNilai::class, 'index']);
// Route::get('/mapel', [ControllerMataPelajaran::class, 'index']);
// Route::get('/topik', [ControllerTopik::class, 'index']);

// // Routes buat tambah data (CREATE)
// Route::get('/tambahsiswa', [ControllerSiswa::class, 'create']);
// Route::get('/tambahguru', [ControllerGuru::class, 'create']);
// Route::get('/tambahkelas', [ControllerKelas::class, 'create']);
// Route::get('/tambahnilai', [ControllerNilai::class, 'create']);
// Route::get('/tambahmapel', [ControllerMataPelajaran::class, 'create']);
// Route::get('/tambahtopik', [ControllerTopik::class, 'create']);

// Route::post('/siswa', [ControllerSiswa::class, 'store']);
// Route::post('/guru', [ControllerGuru::class, 'store']);
// Route::post('/kelas', [ControllerKelas::class, 'store']);
// Route::post('/nilai', [ControllerNilai::class, 'store']);
// Route::post('/mapel', [ControllerMataPelajaran::class, 'store']);
// Route::post('/topik', [ControllerTopik::class, 'store']);

// // Routes buat read data spesifik (READ)
// Route::get('/siswa/{id}', [ControllerSiswa::class, 'show']);
// Route::get('/guru/{id}', [ControllerGuru::class, 'show']);
// Route::get('/kelas/{id}', [ControllerKelas::class, 'show']);
// Route::get('/nilai/{id}', [ControllerNilai::class, 'show']);
// Route::get('/mapel/{id}', [ControllerMataPelajaran::class, 'show']);
// Route::get('/topik/{id}', [ControllerTopik::class, 'show']);

// // Routes buat update data (UPDATE)
// Route::get('/siswa/{id}/edit', [ControllerSiswa::class, 'edit']);
// Route::get('/guru/{id}/edit', [ControllerGuru::class, 'edit']);
// Route::get('/kelas/{id}/edit', [ControllerKelas::class, 'edit']);
// Route::get('/nilai/{id}/edit', [ControllerNilai::class, 'edit']);
// Route::get('/mapel/{id}/edit', [ControllerMataPelajaran::class, 'edit']);
// Route::get('/topik/{id}/edit', [ControllerTopik::class, 'edit']);

// Route::put('/siswa/{id}', [ControllerSiswa::class, 'update']);
// Route::put('/guru/{id}', [ControllerGuru::class, 'update']);
// Route::put('/kelas/{id}', [ControllerKelas::class, 'update']);
// Route::put('/nilai/{id}', [ControllerNilai::class, 'update']);
// Route::put('/mapel/{id}', [ControllerMataPelajaran::class, 'update']);
// Route::put('/topik/{id}', [ControllerTopik::class, 'update']);
