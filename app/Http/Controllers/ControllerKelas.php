<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerKelas extends Controller
{
    public function index() {
        return view('pages.kelas.index_kelas');
    }

    public function tambahKelas() {
        return view('pages.kelas.tambah_kelas');
    }
}
