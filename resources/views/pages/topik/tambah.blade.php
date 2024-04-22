@extends('layouts.admin')
@section('judul', 'Tambah Data Topik')
@section('content')
<form action="/topik" method="POST">
    @csrf
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nama-topik">Nama topik</label>
            <input autofocus required type="text" name='nama_topik' value="{{ old('nama_topik') }}" id="nama-topik" class="form-control @error('nama_topik')is-invalid @enderror" placeholder="Masukkan nama topik">
            @error('nama_topik')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="mata-pelajaran">Mata pelajaran</label>
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
            <a href="/topik" class="btn btn-success">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
