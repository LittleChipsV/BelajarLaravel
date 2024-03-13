<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerSiswa extends Controller
{
    public function index() {
        return view('pages.siswa.index_siswa');
    }

    public function tambahSiswa() {
        return view('pages.siswa.tambah_siswa');
    }
}
