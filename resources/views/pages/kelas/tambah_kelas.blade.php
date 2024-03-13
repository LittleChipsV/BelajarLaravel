@extends('layouts.admin')
@section('judul', 'Tambah Kelas')
@section('content')
    <form action="/kelas" method="POST">
        @csrf
        <div class="form-group p-3">
            <label>Nama Kelas </label>
            <input type="text" name='nama_kelas' class="form-control" placeholder="Masukan Nama Kelas">
            @error('nama_kelas')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="p-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
</form>
@endsection