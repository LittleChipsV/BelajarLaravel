@extends('layouts.admin')
@section('judul', 'Edit Data Siswa')
@section('content')
<form action="/siswa/{{ $siswa->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nama-siswa">Nama Siswa</label>
            <input required autofocus type="text" name='nama_siswa' id="nama-siswa" class="form-control @error('nama_siswa')is-invalid @enderror" placeholder="Masukkan nama siswa" value="{{ $siswa->nama_siswa }}">
            @error('nama_siswa')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jenis-kelamin">Jenis Kelamin</label>
            <select required class="form-control @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin" id="jenis-kelamin">
                <option value="laki" {{ $siswa->jenis_kelamin == 'laki' ? "selected" : "" }}>Laki</option>
                <option value="perempuan" {{ $siswa->jenis_kelamin == 'perempuan' ? "selected" : "" }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select required class="form-control" name="id_kelas" id="kelas">
                @foreach ($daftar_kelas as $kelas)
                <option value="{{ $kelas->id }}" {{ $kelas->id == $siswa->kelas->id ? "selected" : "" }}>{{ $kelas->nama_kelas }}</option>
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
