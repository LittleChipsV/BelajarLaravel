@extends('layouts.admin')
@section('judul', 'Tambah Guru')
@section('content')
    <form action="/guru" method="POST">
        @csrf
        <div class="form-group p-3">
            <label>Nama Guru </label>
            <input type="text" name='nama_guru' class="form-control" placeholder="Masukan Nama Guru">
            @error('nama_guru')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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