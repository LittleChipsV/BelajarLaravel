@extends('layouts.admin')
@section('judul', 'Data Mata Pelajaran')
@section('content')
<div class="p-3">
<div class="card" style="width: 24rem;" >
    <div class="card-body">
        <p>Nama mapel: {{$data->nama_mapel}}</p>
        <p>Guru pengampu: {{$data->nama_guru}}</p>
    </div>
</div>
    <a href="/mapel" class="btn btn-primary my-3">Kembali</a>
</div>
@endsection