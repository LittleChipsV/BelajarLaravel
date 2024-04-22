@extends('layouts.admin')
@section('judul', 'Daftar Nilai')

<!-- Page Heading -->
@section('tabel')
<a href="/nilai/create" class="btn btn-primary my-3">Tambah Data Nilai</a>
<table id="dataTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Mata Pelajaran</th>
            <th scope="col">Topik</th>
            <th scope="col">Nilai</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftar_nilai as $key => $value)
        <tr>
            <td scope="row">{{$key + 1}}</td>
            <td>{{ $value->siswa->nama_siswa }}</td>
            <td>{{ $value->topik->mataPelajaran->nama_mata_pelajaran }}</td>
            <td>{{ $value->topik->nama_topik }}</td>
            <td>{{ $value->nilai }}</td>
            <td class="mr-3">
                <a href="/nilai/{{ $value->id }}" class="btn btn-info">Show</a>
                <a href="/nilai/{{ $value->id }}/edit" class="btn btn-success">Edit</a>
                <a href="{{ route('nilai.destroy', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
