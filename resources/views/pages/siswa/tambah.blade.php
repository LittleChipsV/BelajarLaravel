@extends('layouts.admin')
@section('judul', 'Tambah Data Siswa')
@section('content')
<form action="/siswa" method="POST">
    @csrf
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nama-siswa">Nama siswa</label>
            <input required autofocus type="text" name='nama_siswa' id="nama-siswa" class="form-control @error('nama_siswa')is-invalid @enderror" value="{{ old('nama_siswa') }}" placeholder="Masukkan nama siswa">
            @error('nama_siswa')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jenis-kelamin">Jenis kelamin</label>
            <select required class="form-control @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin" id="jenis-kelamin">
                <option selected disabled>Pilih jenis kelamin</option>
                <option {{ old('jenis_kelamin') == "laki" ? 'selected' : '' }} value="laki">Laki</option>
                <option {{ old('jenis_kelamin') == "perempuan" ? 'selected' : '' }} value="perempuan">Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select required class="form-control @error('id_kelas')is-invalid @enderror" name="id_kelas" id="kelas">
                <option selected disabled>Pilih kelas</option>
                @foreach ($daftar_kelas as $kelas)
                <option {{ old('id_kelas') == $kelas->id ? 'selected' : '' }} value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
            @error('id_kelas')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/siswa" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection