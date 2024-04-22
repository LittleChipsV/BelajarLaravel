<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\{Guru, MataPelajaran};
use Illuminate\Database\QueryException;

class ControllerGuru extends Controller
{
    public function index(){
        confirmDelete("Hapus Guru", "Apakah kamu yakin ingin menghapus data ini?");

        return view('pages.guru.index', ['daftar_guru' => Guru::with('mataPelajaran')->get()]);
    }


    // ==== CREATE ====
    public function create(){
        return view('pages.guru.tambah', ['daftar_mata_pelajaran' => MataPelajaran::all()]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'jenis_kelamin' => ['required', 'string', Rule::in(['laki', 'perempuan'])],
            'id_mata_pelajaran' => 'required|numeric|exists:tabel_mata_pelajaran,id'
        ]);

        try{
            Guru::create($data);
            Alert::success("Sukses!", "Data guru berhasil ditambah");
            return redirect('/guru');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== READ ====
    public function show(Guru $guru){
        return view('pages.guru.detail', ['guru' => $guru->load('mataPelajaran')]);
    }


    // ==== UPDATE ====
    public function edit(Guru $guru){
        return view('pages.guru.edit', ['guru' => $guru->load('mataPelajaran'), 'daftar_mata_pelajaran' => MataPelajaran::all()]);
    }

    public function update(Request $request, Guru $guru){
        $data = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'jenis_kelamin' => ['required', 'string', Rule::in(['laki', 'perempuan'])],
            'id_mata_pelajaran' => 'required|numeric|exists:tabel_mata_pelajaran,id'
        ]);

        try{
            $guru->update($data);
            Alert::success('Sukses!', 'Data guru berhasil diperbarui');
            return redirect('/guru');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== DELETE ====
    public function destroy(Guru $guru){
        try{
            $guru->delete();
            Alert::success('Sukses!', 'Data guru berhasil dihapus');
            return redirect('/guru');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }
}
