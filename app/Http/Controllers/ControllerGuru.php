<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerGuru extends Controller
{
    public function index() {
        $data_guru = DB::table('tabel_guru')->get();

        return view('pages.guru.index_guru', compact('data_guru'));
    }

    public function tambahGuru() {
        return view('pages.guru.tambah_guru');
    }

    public function guru(Request $request){
        $request->validate([
            'nama_guru' => 'required|',
            'jenis_kelamin' => 'required|'
        ]);

        DB::table('tabel_guru')->insert([
            'nama_guru' => $request->nama_guru,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        return redirect('/guru');
    }
}
