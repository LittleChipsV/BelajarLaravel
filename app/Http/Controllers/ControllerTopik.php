<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\{Topik, MataPelajaran, Guru, TupleMataPelajaranKelas};

class ControllerTopik extends Controller
{
    public function index(){
        confirmDelete("Hapus Topik", "Apakah kamu yakin ingin menghapus data ini?");

        return view('pages.topik.index', ['daftar_topik' => Topik::whereIn('id_tuple_mata_pelajaran_kelas', Guru::where('id', auth()->user()->id)->with('dataMengampu')->first()->dataMengampu->pluck('id'))->get()]);
    }


    // ==== CREATE ====
    public function create() {
        $daftarDataMengampu = Guru::where('id', auth()->user()->id)->with('dataMengampu')->first();

        return view('pages.topik.tambah', [
            'daftar_data_mengampu' => $daftarDataMengampu->dataMengampu
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_topik' => 'bail|required|string|min:4|max:255'
        ]);

        if (isset($request['id_tuple_mata_pelajaran_kelas'])) {
            $request->validate(['id_tuple_mata_pelajaran_kelas' => 'bail|required|numeric|exists:mata_pelajaran_kelas,id']);
            $data['id_tuple_mata_pelajaran_kelas'] = $request['id_tuple_mata_pelajaran_kelas'];
        } else {
            $data['id_tuple_mata_pelajaran_kelas'] = Guru::where('id', auth()->user()->id)->with('dataMengampu')->first()->dataMengampu->first()->id;
        }

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
        return view('pages.topik.detail', ['topik' => $topik->load('tupleMataPelajaranKelas')]);
    }


     // ==== UPDATE ====
    public function edit(Topik $topik){
        return view('pages.topik.edit', [
            'topik' => $topik->load('tupleMataPelajaranKelas'),
            'daftar_tuple_mata_pelajaran_kelas' => TupleMataPelajaranKelas::all(),
            'daftar_data_mengampu' => Guru::where('id', auth()->user()->id)->with('dataMengampu')->first()->dataMengampu
        ]);
    }

    public function update(Request $request, Topik $topik){
        $data = $request->validate([
            'nama_topik' => 'required|string|min:4|max:255',
        ]);

        if (isset($request['id_tuple_mata_pelajaran_kelas'])) {
            $request->validate(['id_tuple_mata_pelajaran_kelas' => 'bail|required|numeric|exists:mata_pelajaran_kelas,id']);
            $data['id_tuple_mata_pelajaran_kelas'] = $request['id_tuple_mata_pelajaran_kelas'];
        } else {
            $data['id_tuple_mata_pelajaran_kelas'] = Guru::where('id', auth()->user()->id)->with('dataMengampu')->first()->dataMengampu->first()->id;
        }

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
