@extends('layouts.admin')
@section('judul', 'Tambah Mata Pelajaran')
@section('content')
    <form action="/mapel" method="POST">
        @csrf
        <div class="form-group p-3">
            <label>Nama Mata Pelajaran </label>
            <input type="text" name='nama_mapel' class="form-control" placeholder="Masukan Nama Mata Pelajaran">
            @error('nama_mapel')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group p-3">
            <label>Nama Guru Pengampu </label>
            <input type="text" name='nama_guru' class="form-control" placeholder="Masukan Nama Guru Pengampu">
            @error('guru_pengampu')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="p-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
</form>
@endsection