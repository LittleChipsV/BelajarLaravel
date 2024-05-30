<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\{Guru, TupleMataPelajaranKelas};
use Illuminate\Database\QueryException;

class ControllerGuru extends Controller
{
    public function index(){
        confirmDelete("Hapus Guru", "Apakah kamu yakin ingin menghapus data ini?");

        return view('pages.guru.index', ['daftar_guru' => Guru::where('role', 'guru')->with('dataMengampu')->get()]);
    }


    // ==== CREATE ====
    public function create(){
        return view('pages.guru.tambah', [
            'daftar_tuple_mata_pelajaran_kelas' => TupleMataPelajaranKelas::all()
        ]);
    }

    public function store(Request $request){
        try {
            $data = $request->validate([
                'name' => 'bail|required|string|max:255|min:4',
                'jenis_kelamin' => 'bail|required|string|in:laki,perempuan',
                'email' => 'bail|required|string|email|unique:users,email',
                'password' => 'bail|required|string|min:6|max:255',
                'id_tuple_mata_pelajaran_kelas' => 'bail|required|array',
                'id_tuple_mata_pelajaran_kelas.*' => 'bail|numeric|exists:mata_pelajaran_kelas,id'
            ]);

            $data['password'] = bcrypt($request['password']);
            $data['role'] = 'guru';

            $guruBaru = Guru::create($data);
            $guruBaru->dataMengampu()->sync($data['id_tuple_mata_pelajaran_kelas']);

            Alert::success("Sukses!", "Data guru berhasil ditambah");
            return redirect('/guru');
        } catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== READ ====
    public function show(Guru $guru){
        return view('pages.guru.detail', ['guru' => $guru->load('dataMengampu')]);
    }


    // ==== UPDATE ====
    public function edit(Guru $guru){
        return view('pages.guru.edit', [
            'guru' => $guru->load('dataMengampu'),
            'daftar_tuple_mata_pelajaran_kelas' => TupleMataPelajaranKelas::with(['mataPelajaran', 'kelas'])->get()
        ]);
    }

    public function update(Request $request, Guru $guru){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'bail|required|string|in:laki,perempuan',
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($guru->id)],
            'id_tuple_mata_pelajaran_kelas' => 'required|array',
            'id_tuple_mata_pelajaran_kelas.*' => 'numeric|exists:mata_pelajaran_kelas,id'
        ]);

        if (!empty($request['password']))
            $data['password'] = bcrypt($request['password']);

        $guru->update($data);
        $guru->dataMengampu()->sync($data['id_tuple_mata_pelajaran_kelas']);

        Alert::success('Sukses!', 'Data guru berhasil diperbarui');
        return redirect('/guru');
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
