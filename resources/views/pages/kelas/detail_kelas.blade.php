@extends('layouts.admin')
@section('judul', 'Data Kelas')
@section('content')
<div class="p-3">
<div class="card" style="width: 24rem;" >
    <div class="card-body">
        <p>Nama: {{$data->nama_kelas}}<p>
    </div>
</div>
    <a href="/kelas" class="btn btn-primary my-3">Kembali</a>
</div>
@endsection