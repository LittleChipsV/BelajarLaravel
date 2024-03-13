<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTopik extends Controller
{
    public function index() {
        $data_topik = DB::table('tabel_topik')
        ->select('tabel_topik.id_topik', 'tabel_topik.nama_topik', 'tabel_mata_pelajaran.nama_mapel')
        ->join('tabel_mata_pelajaran', 'tabel_topik.id_topik', '=', 'tabel_mata_pelajaran.id_mapel')
        ->get();

        return view('pages.topik.index_topik', compact('data_topik'));
    }

    public function tambahTopik() {
        $daftar_mapel = DB::table('tabel_mata_pelajaran')->get();

        return view('pages.topik.tambah_topik', compact('daftar_mapel'));
    }
    
    public function topik(Request $request){
        $request->validate([
            'nama_topik' => 'required|',
            'id_mapel' => 'required|'
        ]);

        DB::table('tabel_topik')->insert([
            'nama_topik' => $request->nama_topik,
            'id_mapel' => $request->id_mapel
        ]);

        return redirect('/mapel');
    }
}
