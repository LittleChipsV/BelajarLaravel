@extends('layouts.admin')
@section('judul', 'Data Siswa')
@section('content')
<div class="p-3">
<div class="card" style="width: 24rem;" >
    <div class="card-body">
        <p>Nama siswa: {{$data->nama_siswa}}<p>
        <p>Kelas: {{$data->nama_kelas}}</p>
    </div>
</div>
    <a href="/siswa" class="btn btn-primary my-3">Kembali</a>
</div>
@endsection