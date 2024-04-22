@extends('layouts.admin')
@section('judul', 'Daftar Topik')

<!-- Page Heading -->
@section('tabel')
<a href="/topik/create" class="btn btn-primary my-3">Tambah Data Topik</a>
<table id="dataTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Mata Pelajaran</th>
            <th scope="col">Nama Topik</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftar_topik as $key => $value)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $value->mataPelajaran->nama_mata_pelajaran }}</td>
            <td>{{ $value->nama_topik }}</td>
                <td class="mr-3">
                <a href="/topik/{{ $value->id }}" class="btn btn-info">Show</a>
                <a href="/topik/{{ $value->id }}/edit" class="btn btn-success">Edit</a>
                <a href="{{ route('topik.destroy', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>

</table>
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
