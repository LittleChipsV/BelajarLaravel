@extends('layouts.admin')
@section('judul', 'Data Mata Pelajaran')
@section('content')
<div class="card" style="width: 24rem;" >
    <h2 class="card-header">Mata Id Pelajaran ke-{{ $mata_pelajaran->id }}</h2>
    <div class="card-body">
        <p><b>Nama mata pelajaran:</b> {{$mata_pelajaran->nama_mata_pelajaran}}</p>
    </div>
</div>
<a href="/mata-pelajaran" class="btn btn-primary my-3">Kembali</a>
@endsection
