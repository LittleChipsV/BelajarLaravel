@extends('layouts.admin')
@section('judul', 'Data Siswa')
@section('content')
<div class="card" style="width: 24rem" >
    <h3 class="card-header">Siswa ke-{{ $siswa->id }}</h3>
    <div class="card-body">
        <p><b>Nama siswa:</b> {{ $siswa->nama_siswa }}<p>
        <p><b>Jenis kelamin:</b> {{ $siswa->jenis_kelamin }}</p>
        <p><b>Kelas:</b> {{ $siswa->kelas->nama_kelas }}</p>
    </div>
</div>
<a href="/siswa" class="btn btn-primary my-3">Kembali</a>
@endsection