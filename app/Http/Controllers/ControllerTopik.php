<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\{Topik, MataPelajaran};

class ControllerTopik extends Controller
{
    public function index(){
        confirmDelete("Hapus Topik", "Apakah kamu yakin ingin menghapus data ini?");

        return view('pages.topik.index', ['daftar_topik' => Topik::with('mataPelajaran')->get()]);
    }


    // ==== CREATE ====
    public function create() {
        return view('pages.topik.tambah', ['daftar_mata_pelajaran' => MataPelajaran::all()]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_topik' => 'required|string|max:255',
            'id_mata_pelajaran' => 'required|numeric|exists:tabel_mata_pelajaran,id'
        ]);

        try{
            Topik::create($data);
            Alert::success("Sukses!", "Data topik berhasil ditambah");
            return redirect('/topik');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== READ ====
    public function show(Topik $topik){
        return view('pages.topik.detail', compact('topik'));
    }


     // ==== UPDATE ====
     public function edit(Topik $topik){
        return view('pages.topik.edit', ['topik' => $topik, 'daftar_mata_pelajaran' => MataPelajaran::all()]);
    }

    public function update(Request $request, Topik $topik){
        $data = $request->validate([
            'nama_topik' => 'required|string|max:255',
            'id_mata_pelajaran' => 'required|numeric|exists:tabel_mata_pelajaran,id'
        ]);

        try{
            $topik->update($data);
            Alert::success('Sukses!', 'Data topik berhasil diperbarui');
            return redirect('/topik');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }


     // ==== DELETE ====
     public function destroy(Topik $topik){
        try{
            $topik->delete();
            Alert::success('Sukses!', 'Data topik berhasil dihapus');
            return redirect('/topik');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }
}
