<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Kelas;


class ControllerKelas extends Controller
{
    public function index(){
        confirmDelete("Hapus Kelas", "Apakah kamu yakin ingin menghapus data ini?");

        return view('pages.kelas.index', ['daftar_kelas' => Kelas::all()]);
    }


    // ==== CREATE ====
    public function create(){
        return view('pages.kelas.tambah');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:kelas'
        ]);

        try{
            Kelas::create($data);
            Alert::success("Sukses!", "Data kelas berhasil ditambah");
            return redirect('/kelas');
        }catch (QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->errorInfo[1] === 1062 ? 'Data sudah pernah ditambahkan' : $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== READ ====
    public function show(Kelas $kela){
        return view('pages.kelas.detail', ['kelas' => $kela]);
    }


    // ==== UPDATE ====
    public function edit(Kelas $kela){
        return view('pages.kelas.edit', ['kelas' => $kela]);
    }

    public function update(Request $request, Kelas $kela){
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:kelas'
        ]);

        try{
            $kela->update($data);
            Alert::success('Sukses!', 'Data kelas berhasil diperbarui');
            return redirect('/kelas');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->errorInfo[1] === 1062 ? 'Data duplikat dengan data lain' : $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== DELETE ====
    public function destroy(Kelas $kela){
        try{
            $kela->delete();
            Alert::success('Sukses!', 'Data kelas berhasil dihapus');
            return redirect('/kelas');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }
}
