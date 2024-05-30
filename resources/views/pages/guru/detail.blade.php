@extends('layouts.admin')
@section('judul', 'Data Guru')
@section('content')
<div class="card" style="width: 24rem;" >
    <h2 class="card-header">Guru Id ke-{{ $guru->id }}</h2>
    <div class="card-body">
        <p><b>Nama:</b> {{ $guru->name }}<p>
        <p><b>Email:</b> {{ $guru->email }}<p>
        <b>Mengampu:</b>
        @if($guru->dataMengampu->isEmpty())
            -
        @else
            <ul>
                @foreach ($guru->dataMengampu as $data)
                    <li>{{ $data->kelas->nama_kelas }} | {{ $data->mataPelajaran->nama_mata_pelajaran }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
<a href="/guru" class="btn btn-primary my-3">Kembali</a>
@endsection
