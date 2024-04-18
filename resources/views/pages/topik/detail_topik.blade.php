@extends('layouts.admin')
@section('judul', 'Data Topik')
@section('content')
<div class="p-3">
<div class="card" style="width: 24rem;" >
    <div class="card-body">
        <p>Nama topik: {{$data->nama_topik}}<p>
        <p>Mata pelajaran: {{$data->nama_mapel}}</p>
    </div>
</div>
    <a href="/topik" class="btn btn-primary my-3">Kembali</a>
</div>
@endsection