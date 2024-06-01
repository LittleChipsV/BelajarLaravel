<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use App\Models\{Nilai, Topik, User, Siswa, Guru};
use Illuminate\Support\Facades\{Auth, Gate};

class ControllerNilai extends Controller
{
    public function getSemuaTopikByIdMataPelajaran($idMataPelajaran){
        $topik = Topik::where('id_tuple_', $idMataPelajaran)->get();

        return response()->json($topik);
    }


    public function index() {
        confirmDelete("Hapus Nilai", "Apakah kamu yakin ingin menghapus data ini?");

        return view('pages.nilai.index', [
            'daftar_nilai' => (Gate::allows('isSiswa') ?
            Nilai::where('id_siswa', auth()->user()->id)->with(['topik.tupleMataPelajaranKelas'])->get():
            Nilai::with(['siswa.kelas', 'topik.tupleMataPelajaranKelas'])->get())
        ]);
    }


    // ==== CREATE ====
    public function create() {
        $siswa_kelas = Siswa::where('role', 'siswa')->with('kelas')->get();

        foreach ($siswa_kelas as $siswa){
            foreach ($siswa->kelas as $kelas){
                $siswa->kelas = $kelas;
            }
        }

        return view('pages.nilai.tambah', [
            'daftar_siswa' => $siswa_kelas,
            'daftar_topik' => Topik::whereIn('id_tuple_mata_pelajaran_kelas', Guru::where('id', auth()->user()->id)->with('dataMengampu')->first()->dataMengampu->pluck('id'))->get(),
            'daftar_data_mengampu' => Guru::where('id', auth()->user()->id)->with('dataMengampu')->first()->dataMengampu
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'id_siswa' => 'bail|required|numeric|exists:users,id',
            'nilai' => 'bail|required|numeric|min:0|max:100',
            'id_topik' => 'bail|required|numeric|exists:topik,id'
        ]);

        try{
            Nilai::create($data);
            Alert::success("Sukses!", "Data nilai berhasil ditambah");
            return redirect('/nilai');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->errorInfo[1] === 1062 ? 'Data sudah pernah ditambahkan' : $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== READ ====
    public function show(Nilai $nilai){
        return view('pages.nilai.detail', ['nilai' => $nilai->load(['siswa.kelas', 'topik.tupleMataPelajaranKelas'])]   );
    }


     // ==== UPDATE ====
     public function edit(Nilai $nilai){
        $siswa_kelas = Siswa::where('role', 'siswa')->with('kelas')->get();

        foreach ($siswa_kelas as $siswa){
            foreach ($siswa->kelas as $kelas){
                $siswa->kelas = $kelas;
            }
        }

        return view('pages.nilai.edit', [
            'nilai' => $nilai->load(['siswa.kelas', 'topik.tupleMataPelajaranKelas']),
            'daftar_siswa' => $siswa_kelas,
            'daftar_topik' => Topik::whereIn('id_tuple_mata_pelajaran_kelas', Guru::where('id', auth()->user()->id)->with('dataMengampu')->first()->dataMengampu->pluck('id'))->get(),
            'daftar_data_mengampu' => Guru::where('id', auth()->user()->id)->with('dataMengampu')->first()->dataMengampu
        ]);
    }

    public function update(Request $request, Nilai $nilai){
        $data = $request->validate([
            'nilai' => 'bail|required|numeric|min:0|max:100',
            'id_topik' => 'bail|required|numeric|exists:topik,id'
        ]);

        try{
            $nilai->update($data);
            Alert::success("Sukses!", "Data nilai berhasil ditambah");
            return redirect('/nilai');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->errorInfo[1] === 1062 ? 'Data sudah pernah ditambahkan' : $ex->getMessage());
            return redirect()->back();
        }
    }


    // ==== DELETE ====
    public function destroy(Nilai $nilai){
        try{
            $nilai->delete();
            Alert::success('Sukses!', 'Data nilai berhasil dihapus');
            return redirect('/nilai');
        }catch(QueryException $ex){
            Alert::error('Terjadi kesalahan', $ex->getMessage());
            return redirect()->back();
        }
    }
}
