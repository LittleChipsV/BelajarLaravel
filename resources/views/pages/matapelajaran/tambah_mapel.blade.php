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
            <select name="id_guru" id="daftar_guru">
                @forelse($daftar_guru as $guru)
                    <option value="{{ $guru->id_guru }}">{{ $guru->nama_guru }}</option>
                @empty
                    <option value="" disabled>Belum ada guru</option>
                @endforelse
            </select>
            @error('id_guru')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="p-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
</form>
@endsection