@extends('layouts.admin')
@section('judul', 'Data Guru')
@section('content')
<div class="p-3">
<div class="card" style="width: 24rem;" >
    <div class="card-body">
        <p>Nama: {{$data->nama_guru}}<p>
        <p>Jenis kelamin: {{$data->jenis_kelamin}}</p>
    </div>
</div>
    <a href="/guru" class="btn btn-primary my-3">Kembali</a>
</div>
@endsection