<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerGuru extends Controller
{
    public function index() {
        $data_guru = DB::table('tabel_guru')->get();

        return view('pages.guru.index_guru', compact('data_guru'));
    }

    public function tambahGuru() {
        $daftar_guru = DB::table('tabel_guru')->pluck('nama_guru');

        return view('pages.guru.tambah_guru', compact('daftar_guru'));
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

        Alert::success("Sukses!", "Berhasil menambah data");
        return redirect('/guru');
    }

    public function show($id){
        $data = DB::table('tabel_guru')->where('id_guru', $id)->first();
        return view('pages.guru.detail_guru', compact('data'));
    }
}
