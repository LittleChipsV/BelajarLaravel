@extends('layouts.admin')
@section('judul', 'Tambah Data Tuple Mata Pelajaran Kelas')
@section('content')
<form action="/tuple_mata_pelajaran_kelas" method="POST">
    @csrf
    <div class="col-lg-6">
        <div class="form-group">
            <label for="mata_pelajaran">Mata pelajaran</label>
            <select required class="form-control @error('id_mata_pelajaran')is-invalid @enderror" name="id_mata_pelajaran" id="mata_pelajaran">
                <option disabled selected>Pilih mata pelajaran</option>
                @foreach($daftar_mata_pelajaran as $mata_pelajaran)
                <option value="{{ $mata_pelajaran->id }}" {{old('id_mata_pelajaran') == $mata_pelajaran->id ? "selected" : ""}}>{{ $mata_pelajaran->nama_mata_pelajaran }}</option>
                @endforeach
            </select>
            @error('id_mata_pelajaran')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kelas">kelas</label>
            <select required class="form-control @error('id_kelas')is-invalid @enderror" name="id_kelas" id="kelas">
                <option disabled selected>Pilih kelas</option>
                @foreach($daftar_kelas as $kelas)
                <option value="{{ $kelas->id }}" {{old('id_kelas') == $kelas->id ? "selected" : ""}}>{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
            @error('id_kelas')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/tuple_mata_pelajaran_kelas" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
