@extends('layouts.admin')
@section('judul', 'Tambah Data Guru')
@section('content')
<form action="/guru" method="POST">
    @csrf
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nama-guru">Nama Guru</label>
            <input required autofocus type="text" name='nama_guru' id="nama-guru" class="form-control @error('nama_guru')is-invalid @enderror" value="{{ old('nama_guru') }}" placeholder="Masukkan nama guru">
            @error('nama_guru')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jenis-kelamin">Jenis Kelamin</label>
            <select required class="form-control @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin" id="jenis-kelamin">
                <option selected disabled>Pilih jenis kelamin</option>
                <option {{ old('jenis_kelamin') == 'laki' ? 'selected' : '' }} value="laki">Laki</option>
                <option {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }} value="perempuan">Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="mata-pelajaran">Mengampu</label>
            <select required class="form-control @error('id_mata_pelajaran')is-invalid @enderror" name="id_mata_pelajaran" id="mata-pelajaran">
                <option selected disabled>Pilih mata pelajaran</option>
                @foreach($daftar_mata_pelajaran as $mata_pelajaran)
                <option {{ old('id_mata_pelajaran') == $mata_pelajaran->id ? 'selected' : '' }} value="{{ $mata_pelajaran->id }}">{{ $mata_pelajaran->nama_mata_pelajaran }}</option>
                @endforeach
            </select>
            @error('id_mata_pelajaran')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/guru" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
