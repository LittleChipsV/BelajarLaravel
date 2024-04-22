@extends('layouts.admin')
@section('judul', 'Edit Data Guru')
@section('content')
<form action="/guru/{{ $guru->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nama-guru">Nama guru</label>
            <input required autofocus type="text" name='nama_guru' id="nama-guru" class="form-control @error('nama_guru')is-invalid @enderror" placeholder="Masukkan nama guru" value="{{ $guru->nama_guru }}">
            @error('nama_guru')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jenis-kelamin">Jenis Kelamin</label>
            <select required class="form-control @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin" id="jenis-kelamin">
                <option value="laki" {{ $guru->jenis_kelamin == 'laki' ? "selected" : "" }}>Laki</option>
                <option value="perempuan" {{ $guru->jenis_kelamin == 'perempuan' ? "selected" : "" }}>Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="mata-pelajaran">Mengampu</label>
            <select required class="form-control @error('id_mata_pelajaran')is-invalid @enderror" name="id_mata_pelajaran" id="mata-pelajaran">
                @foreach($daftar_mata_pelajaran as $mata_pelajaran)
                <option value="{{ $mata_pelajaran->id }}" {{$mata_pelajaran->id == $guru->mataPelajaran->id ? "selected" : ""}}>{{ $mata_pelajaran->nama_mata_pelajaran }}</option>
                @endforeach
            </select>
            @error('id_mata_pelajaran')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/guru" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
