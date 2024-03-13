@extends('layouts.admin')
@section('judul', 'Tambah Nilai')
@section('content')
    <form action="/nilai" method="POST">
        @csrf
        <div class="form-group p-3">
            <label>Nilai </label>
            <input type="number" name='nilai' class="form-control" placeholder="Masukan Nilai">
            @error('nilai')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group p-3">
            <label>Nama Siswa </label>
            <input type="text" name='nama_siswa' class="form-control" placeholder="Masukan Nama Siswa">
            @error('nama_siswa')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group p-3">
            <label>Nama Topik </label>
            <input type="text" name='nama_topik' class="form-control" placeholder="Masukan Nama Topik">
            @error('nama_topik')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="p-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
</form>
@endsection