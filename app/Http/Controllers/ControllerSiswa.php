<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\{Siswa, Kelas};
use Illuminate\Database\QueryException;

class ControllerSiswa extends Controller
{
    public function index(){
        confirmDelete("Hapus Siswa", "Apakah kamu yakin ingin menghapus data ini?");

        return view('pages.siswa.index', ['daftar_siswa' => Siswa::with('kelas')->get()]);
    }

    // ==== CREATE ====
    public function create() {
        return view('pages.siswa.tambah', ['daftar_kelas' => Kelas::all()]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'id_kelas' => 'required|numeric|exists:tabel_kelas,id',
            'jenis_kelamin' => ['required', 'string', Rule::in(['laki', 'perempuan'])]
        ]);

        try{
            Siswa::create($data);
            Alert::success("Sukses!", "Data siswa berhasil ditambah");
            return redirect('/siswa');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== READ ====
    public function show(Siswa $siswa){
        return view('pages.siswa.detail', compact('siswa'));
    }


     // ==== UPDATE ====
     public function edit(Siswa $siswa){
        return view('pages.siswa.edit', ['siswa' => $siswa, 'daftar_kelas' => Kelas::all()]);
    }

    public function update(Request $request, Siswa $siswa){
        $data = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'id_kelas' => 'required|numeric|exists:tabel_kelas,id',
            'jenis_kelamin' => ['required', 'string', Rule::in(['laki', 'perempuan'])]
        ]);

        try{
            $siswa->update($data);
            Alert::success('Sukses!', 'Data siswa berhasil diperbarui');
            return redirect('/siswa');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }


     // ==== DELETE ====
     public function destroy(Siswa $siswa){
        try{
            $siswa->delete();
            Alert::success('Sukses!', 'Data siswa berhasil dihapus');
            return redirect('/siswa');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }
}
