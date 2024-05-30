@extends('layouts.admin')
@section('judul', 'Edit Data Tuple Mata Pelajaran Kelas')
@section('content')
<form action="/tuple_mata_pelajaran_kelas/{{ $tuple_mata_pelajaran_kelas->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-lg-6">
        <div class="form-group">
            <label for="mata-pelajaran">Mata pelajaran</label>
            <select required class="form-control" name="id_mata_pelajaran" id="mata-pelajaran">
                @foreach($daftar_mata_pelajaran as $mata_pelajaran)
                <option value="{{ $mata_pelajaran->id }}" {{ $mata_pelajaran->id == $tuple_mata_pelajaran_kelas->mataPelajaran->id ? "selected" : "" }}>{{ $mata_pelajaran->nama_mata_pelajaran }}</option>
                @endforeach
            </select>
            @error('id_mata_pelajaran')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kelas">kelas</label>
            <select required class="form-control @error('id_kelas')is-invalid @enderror" name="id_kelas" id="kelas">
                @foreach($daftar_kelas as $kelas)
                <option value="{{ $kelas->id }}" {{ $kelas->id == $tuple_mata_pelajaran_kelas->kelas->id ? "selected" : "" }}>{{ $kelas->nama_kelas }}</option>
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
