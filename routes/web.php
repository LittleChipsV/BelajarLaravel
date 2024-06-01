<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{
    BerhitungController,
    ControllerGuru,
    ControllerSiswa,
    ControllerMataPelajaran,
    ControllerNilai,
    ControllerKelas,
    ControllerTopik,
    ControllerTupleMataPelajaranKelas
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
Route::get('/tes', function () {
    return view('tes');
});

Route::get('/hitung', [BerhitungController::class, 'hitung']);


// ------ Website Penilaian Siswa  --------

Route::get('/', fn() => view('index') );
Auth::routes();
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', fn() => view('pages.dashboard') )->name('dashboard');
    Route::middleware('can:isAdmin')->group(function () {
        Route::resource('mata-pelajaran', ControllerMataPelajaran::class);
        Route::resource('siswa', ControllerSiswa::class);
        Route::resource('guru', ControllerGuru::class);
        Route::resource('kelas', ControllerKelas::class);
        Route::resource('tuple_mata_pelajaran_kelas', ControllerTupleMataPelajaranKelas::class);
    });

    Route::middleware('can:isGuru')->group(function() {
        Route::resource('topik', ControllerTopik ::class);
        Route::resource('nilai', ControllerNilai::class);
    });

    Route::resource('nilai', ControllerNilai::class)->only(['index', 'show'])->middleware('can:isSiswaAtauGuru');
    Route::get('/topik/get/{idMataPelajaran}', [ControllerNilai::class, 'getSemuaTopikByIdMataPelajaran']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
