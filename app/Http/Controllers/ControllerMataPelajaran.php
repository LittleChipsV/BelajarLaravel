<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ControllerMataPelajaran extends Controller
{
    public function index() {
        $data_mapel = DB::table('tabel_mata_pelajaran')
        ->select('tabel_mata_pelajaran.*', 'tabel_guru.nama_guru')
        ->join('tabel_guru', 'tabel_mata_pelajaran.id_guru', '=', 'tabel_guru.id_guru')
        ->get();

        return view('pages.matapelajaran.index_mapel', compact('data_mapel'));
    }

    public function tambahMapel() {
        $daftar_guru = DB::table('tabel_guru')->select('id_guru', 'nama_guru')->get();

        return view('pages.matapelajaran.tambah_mapel', compact('daftar_guru'));
    }

    public function mapel(Request $request){
        $request->validate([
            'nama_mapel' => 'required|',
            'id_guru' => 'required|exists:tabel_guru,id_guru'
        ]);

        DB::table('tabel_mata_pelajaran')->insert([
            'nama_mapel' => $request->nama_mapel,
            'id_guru' => $request->id_guru
        ]);

        Alert::success("Sukses!", "Berhasil menambah data");
        return redirect('/mapel');
    }

    public function show($id){
        $data = DB::table('tabel_mata_pelajaran')
        ->select('tabel_mata_pelajaran.*', 'tabel_guru.nama_guru')
        ->join('tabel_guru', 'tabel_mata_pelajaran.id_guru', '=', 'tabel_guru.id_guru')
        ->where('id_mapel', $id)
        ->first();

        return view('pages.matapelajaran.detail_mapel', compact('data'));
    }
}
