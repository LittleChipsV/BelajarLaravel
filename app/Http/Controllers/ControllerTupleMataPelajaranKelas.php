<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{TupleMataPelajaranKelas, MataPelajaran, Kelas};
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;

class ControllerTupleMataPelajaranKelas extends Controller
{
    public function index(){
        confirmDelete("Hapus Tuple", "Apakah kamu yakin ingin menghapus data ini?");

        $daftar_tuple_mata_pelajaran_kelas = TupleMataPelajaranKelas::with(['mataPelajaran', 'kelas'])->get();
        return view('pages.tuple-mata-pelajaran-kelas.index', compact('daftar_tuple_mata_pelajaran_kelas'));
    }


    // CREATE
    public function create(){
        return view('pages.tuple-mata-pelajaran-kelas.tambah', [
            'daftar_mata_pelajaran' => MataPelajaran::all(),
            'daftar_kelas' => Kelas::all(),
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'id_mata_pelajaran' => 'required',
            'id_kelas' => 'required',
        ]);

        try{
            TupleMataPelajaranKelas::create($data);
            Alert::success("Sukses!", "Data tuple mata pelajaran kelas berhasil ditambah");
            return redirect('/tuple_mata_pelajaran_kelas');
        }catch(QueryException $ex){
            if ($ex->errorInfo[1] == 1062) {
                Alert::error('Terjadi kesalahan', 'Data tuple mapel-kelas yang sama sudah ada.');
            } else {
                Alert::error('Terjadi kesalahan', $ex->getMessage());
            }

            return redirect()->back();
        }
    }


    // ==== READ ====
    public function show(TupleMataPelajaranKelas $tuple_mata_pelajaran_kela){
        return view('pages.tuple-mata-pelajaran-kelas.detail', [
            'tuple_mata_pelajaran_kelas' => $tuple_mata_pelajaran_kela->load(['mataPelajaran', 'kelas']),
        ]);
    }


     // ==== UPDATE ====
     public function edit(TupleMataPelajaranKelas $tuple_mata_pelajaran_kela){
        return view('pages.tuple-mata-pelajaran-kelas.edit', [
            'tuple_mata_pelajaran_kelas' => $tuple_mata_pelajaran_kela,
            'daftar_mata_pelajaran' => MataPelajaran::all(),
            'daftar_kelas' => Kelas::all(),
        ]);
    }

    public function update(Request $request, TupleMataPelajaranKelas $tuple_mata_pelajaran_kela){
        $data = $request->validate([
            'id_mata_pelajaran' => 'required',
            'id_kelas' => 'required',
        ]);

        try{
            $tuple_mata_pelajaran_kela->update($data);
            Alert::success("Sukses!", "Data tuple mata pelajaran kelas berhasil diubah");
            return redirect('/tuple_mata_pelajaran_kelas');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== DELETE ====
    public function destroy(TupleMataPelajaranKelas $tuple_mata_pelajaran_kela){
        try{
            $tuple_mata_pelajaran_kela->delete();
            Alert::success('Sukses!', 'Data tuple mata pelajaran kelas berhasil dihapus');
            return redirect('/tuple_mata_pelajaran_kelas');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }
}
