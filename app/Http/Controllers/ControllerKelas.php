<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerKelas extends Controller
{
    public function index() {
        $data_kelas = DB::table('tabel_kelas')->get();

        return view('pages.kelas.index_kelas', compact('data_kelas'));
    }

    public function tambahKelas() {
        return view('pages.kelas.tambah_kelas');
    }

    public function kelas(Request $request){
        $request->validate([
            'nama_kelas' => 'required|',
        ]);

        DB::table('tabel_kelas')->insert([
            'nama_kelas' => $request->nama_kelas
        ]);

        return redirect('/kelas');
    }
}
