@extends('layouts.admin')
@section('judul', 'Data Nilai')
@section('content')
<div class="card" style="width: 24rem;">
    <h2 class="card-header">Nilai Id ke-{{ $nilai->id }}</h2>
    <div class="card-body">
        @can('isGuru')
        <p><b>Nama siswa:</b> {{ $nilai->siswa->nama_siswa }}<p>
        <p><b>Kelas:</b> {{ isset($nilai->siswa->kelas->nama_kelas) ? $nilai->siswa->kelas->nama_kelas : '-' }}<p>
        @endcan
        <p><b>Mata pelajaran | Kelas:</b> {{ "{$nilai->topik->tupleMataPelajaranKelas->mataPelajaran->nama_mata_pelajaran} | {$nilai->topik->tupleMataPelajaranKelas->kelas->nama_kelas}" }}</p>
        <p><b>Topik:</b> {{ $nilai->topik->nama_topik }}</p>
        <p><b>Nilai:</b> {{ $nilai->nilai }}</p>
    </div>
</div>
<a href="/nilai" class="btn btn-primary my-3">Kembali</a>
@endsection
