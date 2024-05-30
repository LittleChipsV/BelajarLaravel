@extends('layouts.admin')
@section('judul', 'Data Siswa')
@section('content')
<div class="card" style="width: 24rem" >
    <h3 class="card-header">Siswa Id ke-{{ $siswa->id }}</h3>
    <div class="card-body">
        <p><b>Nama siswa:</b> {{ $siswa->name }}<p>
        <p><b>Email:</b> {{ $siswa->email }}<p>
        <p><b>Kelas:</b> {{ $siswa->kelas }}</p>
    </div>
</div>
<a href="/siswa" class="btn btn-primary my-3">Kembali</a>
@endsection
