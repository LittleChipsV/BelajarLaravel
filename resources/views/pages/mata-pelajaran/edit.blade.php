@extends('layouts.admin')
@section('judul', 'Edit Data Mata Pelajaran')

@section('content')
<form action="/mata-pelajaran/{{ $mata_pelajaran->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nama-mata-pelajaran">Nama mata pelajaran </label>
            <input required autofocus type="text" name='nama_mata_pelajaran' id="nama-mata-pelajaran" class="form-control @error('nama_mata_pelajaran')is-invalid @enderror" placeholder="Masukkan nama mata pelajaran" value="{{ $mata_pelajaran->nama_mata_pelajaran }}">
            @error('nama_mata_pelajaran')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/mata-pelajaran" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
