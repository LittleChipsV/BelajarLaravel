<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerSiswa extends Controller
{
    public function index() {
        $data_siswa = DB::table('tabel_siswa')
        ->select('tabel_siswa.*', 'tabel_kelas.nama_kelas')
        ->join('tabel_kelas', 'tabel_siswa.id_kelas', '=', 'tabel_kelas.id_kelas')
        ->get();

        return view('pages.siswa.index_siswa', compact('data_siswa'));
    }

    public function tambahSiswa() {
        $daftar_kelas = DB::table('tabel_kelas')->get();

        return view('pages.siswa.tambah_siswa', compact('daftar_kelas'));
    }

    public function siswa(Request $request){
        $request->validate([
            'nama_siswa' => 'required|',
            'id_kelas' => 'required|',
            'jenis_kelamin' => 'required|'
        ]);

        DB::table('tabel_siswa')->insert([
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_kelas' => $request->id_kelas
        ]);

        Alert::success("Sukses!", "Berhasil menambah data");
        return redirect('/siswa');
    }

    public function show($id){
        $data = DB::table('tabel_siswa')
        ->select('tabel_siswa.*', 'tabel_kelas.nama_kelas')
        ->join('tabel_kelas', 'tabel_siswa.id_kelas', '=', 'tabel_kelas.id_kelas')
        ->where('id_siswa', $id)
        ->first();

        return view('pages.siswa.detail_siswa', compact('data'));
    }
}
