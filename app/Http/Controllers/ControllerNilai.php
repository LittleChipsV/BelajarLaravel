<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use App\Models\{Nilai, Topik, User, Siswa, Guru};
use Illuminate\Support\Facades\Auth;

class ControllerNilai extends Controller
{
    public function getSemuaTopikByIdMataPelajaran($idMataPelajaran){
        $topik = Topik::where('id_mata_pelajaran', $idMataPelajaran)->get();

        return response()->json($topik);
    }


    public function index() {
        confirmDelete("Hapus Nilai", "Apakah kamu yakin ingin menghapus data ini?");
        $userSekarang = auth()->user();

        return view('pages.nilai.index', [
            'daftar_nilai' => ($userSekarang->role === 'siswa' ?
                Nilai::with(['siswa.topik.mataPelajaran'])->find($userSekarang->id) :
                Nilai::with('siswa')->get())
        ]);
    }


    // ==== CREATE ====
    public function create() {
        $user = Auth::user();

        $daftarDataMengampu = Guru::where('id', $user->id)->with('dataMengampu')->first();

        $siswa_kelas = Siswa::where('role', 'siswa')->with('kelas')->get();

        foreach ($siswa_kelas as $siswa){
            foreach ($siswa->kelas as $kelas){
                $siswa->kelas = $kelas;
            }
        }

        return view('pages.nilai.tambah', [
            'daftar_siswa' => $siswa_kelas,
            'daftar_topik' => Topik::with('mataPelajaran')->get(),
            'daftar_data_mengampu' => $daftarDataMengampu->dataMengampu
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'id_siswa' => 'required|numeric|exists:tabel_siswa,id',
            'nilai' => 'required|numeric|min:0|max:100',
            'id_topik' => 'required|numeric|exists:tabel_topik,id'
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
        return view('pages.nilai.detail', compact('nilai'));
    }


     // ==== UPDATE ====
     public function edit(Nilai $nilai){
        return view('pages.nilai.edit', [
            'nilai' => $nilai,
            'daftar_siswa' => User::with('siswaKelas')->get(),
            'daftar_topik' => Topik::with('mataPelajaran')->get()
        ]);
    }

    public function update(Request $request, Nilai $nilai){
        $data = $request->validate([
            'id_siswa' => 'required|numeric|exists:tabel_siswa,id',
            'nilai' => 'required|numeric|min:0|max:100',
            'id_topik' => 'required|numeric|exists:tabel_topik,id'
        ]);

        try{
            $nilai->update($data);
            Alert::success('Sukses!', 'Data nilai berhasil diperbarui');
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
