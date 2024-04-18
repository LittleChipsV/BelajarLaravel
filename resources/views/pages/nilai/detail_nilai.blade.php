@extends('layouts.admin')
@section('judul', 'Data Nilai')
@section('content')
<div class="p-3">
<div class="card" style="width: 24rem;" >
    <div class="card-body">
        <p>Nama siswa: {{$data->nama_siswa}}<p>
        <p>Nilai: {{$data->nilai}}</p>
        <p>Mata pelajaran: {{$data->nama_mapel}}</p>
        <p>Topik: {{$data->nama_topik}}</p>
    </div>
</div>
    <a href="/nilai" class="btn btn-primary my-3">Kembali</a>
</div>
@endsection