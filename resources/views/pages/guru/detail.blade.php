@extends('layouts.admin')
@section('judul', 'Data Guru')
@section('content')
<div class="card" style="width: 24rem;" >
    <h2 class="card-header">Guru ke-{{ $guru->id }}</h2>
    <div class="card-body">
        <p><b>Nama:</b> {{ $guru->nama_guru }}<p>
        <p><b>Jenis kelamin:</b> {{ $guru->jenis_kelamin }}</p>
        <p><b>Mengampu:</b> {{ $guru->mataPelajaran->nama_mata_pelajaran }}</p>
    </div>
</div>
<a href="/guru" class="btn btn-primary my-3">Kembali</a>
@endsection