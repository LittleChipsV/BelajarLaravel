<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerGuru extends Controller
{
    public function index() {
        return view('pages.guru.index_guru');
    }

    public function tambahGuru() {
        return view('pages.guru.tambah_guru');
    }
}
