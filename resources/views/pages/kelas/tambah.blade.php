@extends('layouts.admin')
@section('judul', 'Tambah Kelas')
@section('content')
<form action="/kelas" method="POST">
    @csrf
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nama-kelas">Nama Kelas </label>
            <input required autofocus type="text" name='nama_kelas' id="nama-kelas" class="form-control @error('nama_kelas')is-invalid @enderror" placeholder="Masukkan nama kelas" value="{{ old('nama_kelas') }}">
            @error('nama_kelas')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/kelas" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
