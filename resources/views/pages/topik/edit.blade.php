@extends('layouts.admin')
@section('judul', 'Edit Data Topik')
@section('content')
<form action="/topik/{{ $topik->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nama-topik">Nama topik</label>
            <input autofocus required type="text" name='nama_topik' id="nama-topik" class="form-control" value="{{ $topik->nama_topik }}" placeholder="Masukkan nama topik">
            @error('nama_topik')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="mata-pelajaran">Mata pelajaran</label>
            <select required class="form-control" name="id_mata_pelajaran" id="mata-pelajaran">
                @foreach($daftar_mata_pelajaran as $mata_pelajaran)
                <option value="{{ $mata_pelajaran->id }}" {{ $mata_pelajaran->id == $topik->mataPelajaran->id ? "selected" : "" }}>{{ $mata_pelajaran->nama_mata_pelajaran }}</option>
                @endforeach
            </select>
            @error('id_mata_pelajaran')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/topik" class="btn btn-success">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
