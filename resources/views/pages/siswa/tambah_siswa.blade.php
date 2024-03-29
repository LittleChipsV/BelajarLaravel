@extends('layouts.admin')
@section('judul', 'Tambah Siswa')
@section('content')
    <form action="/siswa" method="POST">
        @csrf
        <div class="form-group p-3">
            <label>Nama Siswa </label>
            <input type="text" name='nama_siswa' class="form-control" placeholder="Masukan Nama Siswa">
            @error('nama_siswa')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group p-3">
            <label>Kelas </label>
            <select name="id_kelas" id="daftar_kelas">
                @forelse ($daftar_kelas as $kelas)
                    <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
                @empty
                    <option value="" disabled>Belum ada kelas</option>
                @endforelse
            </select>
        </div>
        <div class="form-group p-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin">
                <option value="laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="p-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
</form>
@endsection