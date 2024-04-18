<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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

        Alert::success("Sukses!", "Berhasil menambah data");
        return redirect('/kelas');
    }

    public function show($id){
        $data = DB::table('tabel_kelas')->where('id_kelas', $id)->first();
        return view('pages.kelas.detail_kelas', compact('data'));
    }
}
