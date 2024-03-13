<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerMataPelajaran extends Controller
{
    public function index() {
        return view('pages.matapelajaran.index_mapel');
    }

    public function tambahMapel() {
        return view('pages.matapelajaran.tambah_mapel');
    }
}
