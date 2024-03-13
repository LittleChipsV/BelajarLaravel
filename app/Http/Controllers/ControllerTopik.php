<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerTopik extends Controller
{
    public function index() {
        return view('pages.topik.index_topik');
    }

    public function tambahTopik() {
        return view('pages.topik.tambah_topik');
    }
}
