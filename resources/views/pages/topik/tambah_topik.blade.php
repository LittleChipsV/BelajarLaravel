@extends('layouts.admin')
@section('judul', 'Tambah Topik')
@section('content')
    <form action="/topik" method="POST">
        @csrf
        <div class="form-group p-3">
            <label>Nama Topik </label>
            <input type="text" name='nama_topik' class="form-control" placeholder="Masukan Nama Topik">
            @error('nama_topik')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group p-3">
            <label>Mata pelajaran </label>
            <select name="id_mapel" id="daftar_mapel">
                @forelse($daftar_mapel as $mapel)
                    <option value="{{ $mapel->id_mapel }}">{{ $mapel->nama_mapel }}</option>
                @empty
                    <option value="" disabled>Belum ada mata pelajaran</option>
                @endforelse
            </select>
        </div>
        <div class="p-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
</form>
@endsection