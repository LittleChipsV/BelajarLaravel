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

        return view('pages.siswa.index', [
            'daftar_siswa' => Siswa::where('role', 'siswa')->with('kelas')->get()->map(function($siswa){
                $siswa->kelas = $siswa->kelas->isEmpty() ? "-" : $siswa->kelas->first()->nama_kelas;
                return $siswa;
            })
        ]);
    }

    // ==== CREATE ====
    public function create() {
        return view('pages.siswa.tambah', ['daftar_kelas' => Kelas::all()]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'bail|required|string|max:255|min:4',
            'jenis_kelamin' => 'bail|required|string|in:laki,perempuan',
            'email' => 'bail|required|string|email|unique:users,email',
            'password' => 'bail|required|string|max:255|min:6',
            'id_kelas' => 'bail|required|numeric|exists:kelas,id'
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'siswa';

        try {
            $siswaBaru = Siswa::create($data);
            $siswaBaru->kelas()->attach($request['id_kelas']);

            Alert::success("Sukses!", "Data siswa berhasil ditambah");
            return redirect('/siswa');
        } catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }

    // ==== READ ====
    public function show(Siswa $siswa){
        $siswa = $siswa->load('kelas');
        $siswa->kelas = $siswa->kelas->isEmpty() ? "-" : $siswa->kelas->first()->nama_kelas;

        return view('pages.siswa.detail', ['siswa' => $siswa]);
    }


     // ==== UPDATE ====
     public function edit(Siswa $siswa){
        $siswa_kelas = $siswa->load('kelas');


        foreach ($siswa_kelas->kelas as $kelas){
            $siswa_kelas->kelas = $kelas;
        }

        return view('pages.siswa.edit', [
            'siswa' => $siswa_kelas,
            'daftar_kelas' => Kelas::all()
        ]);
    }

    public function update(Request $request, Siswa $siswa){
        $data = $request->validate([
            'name' => 'bail|required|string|max:255',
            'jenis_kelamin' => 'bail|required|string|in:laki,perempuan',
            'email' => ['bail', 'required', 'string', 'email', Rule::unique('users', 'email')->ignore($siswa->id)],
            'id_kelas' => 'bail|required|numeric|exists:kelas,id'
        ]);

        if (!empty($request['password'])){
            $request->validate(['password' => 'bail|required|string|max:255|min:6']);
            $data['password'] = bcrypt($request['password']);
        }

        try {
            $siswa->update($data);
            $siswa->kelas()->sync($request['id_kelas']);
            Alert::success('Sukses!', 'Data siswa berhasil diperbarui');
            return redirect('/siswa');
        } catch(QueryException $ex){
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
