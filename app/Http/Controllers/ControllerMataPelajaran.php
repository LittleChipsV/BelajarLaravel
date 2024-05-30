<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use App\Models\MataPelajaran;

class ControllerMataPelajaran extends Controller
{
    public function index(){
        confirmDelete("Hapus Mata Pelajaran", "Apakah kamu yakin ingin menghapus data ini?");

        return view('pages.mata-pelajaran.index', ['daftar_mata_pelajaran' => MataPelajaran::all()]);
    }


    // ==== CREATE ====
    public function create(){
        return view('pages.mata-pelajaran.tambah');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_mata_pelajaran' => 'required|string|max:255|unique:mata_pelajaran'
        ]);

        try {
            MataPelajaran::create($data);
            Alert::success("Sukses!", "Data mata pelajaran berhasil ditambah");
            return redirect('/mata-pelajaran');
        } catch (QueryException $ex) {
            Alert::error('Terjadi kesalahan', $ex->errorInfo[1] === 1062 ? 'Data sudah pernah ditambahkan' : $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== READ ====
    public function show(MataPelajaran $mataPelajaran){
        return view('pages.mata-pelajaran.detail', ['mata_pelajaran' => $mataPelajaran]);
    }


     //==== UPDATE ====
     public function edit(MataPelajaran $mataPelajaran){
        return view('pages.mata-pelajaran.edit', ['mata_pelajaran' => $mataPelajaran]);
    }

    public function update(Request $request, MataPelajaran $mataPelajaran){
        $data = $request->validate([
            'nama_mata_pelajaran' => 'required|string|max:255|unique:mata_pelajaran'
        ]);

        try {
            $mataPelajaran->update($data);
            Alert::success('Sukses!', 'Data mata pelajaran berhasil diperbarui');
            return redirect('/mata-pelajaran');
        } catch (QueryException $ex) {
            Alert::error('Terjadi kesalahan', $ex->errorInfo[1] === 1062 ? 'Data duplikat dengan data lain' : $ex->getMessage());
            return redirect()->back();
        }
    }


     // ==== DELETE ====
     public function destroy(MataPelajaran $mataPelajaran){
        try{
            $mataPelajaran->delete();
            Alert::success('Sukses!', 'Data mata pelajaran berhasil dihapus');
            return redirect('/mata-pelajaran');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }
}
