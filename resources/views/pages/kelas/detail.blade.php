@extends('layouts.admin')
@section('judul', 'Data Kelas')
@section('content')
<div class="card" style="width: 24rem;" >
    <h2 class="card-header">Kelas Id ke-{{ $kelas->id }}</h2>
    <div class="card-body">
        <p><b>Nama kelas:</b> {{ $kelas->nama_kelas }}<p>
    </div>
</div>
<a href="/kelas" class="btn btn-primary my-3">Kembali</a>
@endsection
