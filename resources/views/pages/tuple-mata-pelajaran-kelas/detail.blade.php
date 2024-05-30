@extends('layouts.admin')
@section('judul', 'Data Guru')
@section('content')
<div class="card" style="width: 24rem;" >
    <h2 class="card-header">Tuple ke-{{ $tuple_mata_pelajaran_kelas->id }}</h2>
    <div class="card-body">
        <p><b>Nama mata pelajaran:</b> {{ $tuple_mata_pelajaran_kelas->mataPelajaran->nama_mata_pelajaran }}<p>
        <p><b>Nama kelas:</b> {{ $tuple_mata_pelajaran_kelas->kelas->nama_kelas }}<p>
    </div>
</div>
<a href="/tuple_mata_pelajaran_kelas" class="btn btn-primary my-3">Kembali</a>
@endsection
