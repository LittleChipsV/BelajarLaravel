<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerNilai extends Controller
{
    public function index() {
        return view('pages.nilai.index_nilai');
    }

    public function tambahNilai() {
        return view('pages.nilai.tambah_nilai');
    }
}
