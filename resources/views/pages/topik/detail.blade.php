@extends('layouts.admin')
@section('judul', 'Data Topik')
@section('content')
<div class="card" style="width: 24rem;">
    <h2 class="card-header">Topik ke-{{ $topik->id }}</h2>
    <div class="card-body">
        <p><b>Nama topik:</b> {{ $topik->nama_topik }}<p>
        <p><b>Mata pelajaran:</b> {{ $topik->tupleMataPelajaranKelas->mataPelajaran->nama_mata_pelajaran }}</p>
        <p><b>Kelas:</b> {{ $topik->tupleMataPelajaranKelas->kelas->nama_kelas }}</p>
    </div>
</div>
<a href="/topik" class="btn btn-primary my-3">Kembali</a>
@endsection
