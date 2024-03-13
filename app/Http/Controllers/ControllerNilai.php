<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerNilai extends Controller
{
    public function index() {
        $data_nilai = DB::table('tabel_nilai')
        ->select('tabel_nilai.nilai', 'tabel_nilai.id_nilai', 'tabel_siswa.nama_siswa', 'tabel_topik.nama_topik', 'tabel_mata_pelajaran.nama_mapel')
        ->join('tabel_siswa', 'tabel_nilai.id_siswa', '=', 'tabel_siswa.id_siswa')
        ->join('tabel_topik', 'tabel_nilai.id_topik', '=', 'tabel_topik.id_topik')
        ->join('tabel_mata_pelajaran', 'tabel_topik.id_mapel', '=', 'tabel_mata_pelajaran.id_mapel')
        ->join('tabel_guru', 'tabel_mata_pelajaran.id_guru', '=', 'tabel_guru.id_guru')
        ->get();

        return view('pages.nilai.index_nilai', compact('data_nilai'));
    }

    public function tambahNilai() {
        $daftar_siswa = DB::table('tabel_siswa')->get();
        $daftar_topik = DB::table('tabel_topik')
        ->select('tabel_topik.*', 'tabel_guru.nama_guru')
        ->join('tabel_mata_pelajaran', 'tabel_topik.id_mapel', '=', 'tabel_mata_pelajaran.id_mapel')
        ->join('tabel_guru', 'tabel_mata_pelajaran.id_guru', '=', 'tabel_guru.id_guru')
        ->get();

        return view('pages.nilai.tambah_nilai', compact('daftar_siswa', 'daftar_topik'));
    }

    public function nilai(Request $request){
        $request->validate([
            'id_siswa' => 'required|',
            'nilai' => 'required|numeric',
            'id_topik' => 'required|'
        ]);

        DB::table('tabel_nilai')->insert([
            'id_siswa' => $request->id_siswa,
            'nilai' => $request->nilai,
            'id_topik' => $request->id_topik
        ]);

        return redirect('/nilai');
    }
}
