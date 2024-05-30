@extends('layouts.admin')
@section('judul', 'Data Nilai')
@section('content')
<div class="card" style="width: 24rem;">
    <h2 class="card-header">Nilai Id ke-{{ $nilai->id }}</h2>
    <div class="card-body">
        <p><b>Nama siswa:</b> {{ $nilai->siswa->nama_siswa }}<p>
        <p><b>Nilai:</b> {{ $nilai->nilai }}</p>
        <p><b>Mata pelajaran:</b> {{ $nilai->topik->mataPelajaran->nama_mata_pelajaran }}</p>
        <p><b>Topik:</b> {{ $nilai->topik->nama_topik }}</p>
    </div>
</div>
<a href="/nilai" class="btn btn-primary my-3">Kembali</a>
@endsection
