@extends('layouts.admin')
@section('judul', 'Daftar Kelas')
@section('tabel')
<a href="/kelas/create" class="btn btn-primary my-3">Tambah Data Kelas</a>
<table id="dataTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftar_kelas as $key => $value)
        <tr>
            <td scope="row">{{ $key + 1 }}</td>
            <td>{{ $value->nama_kelas }}</td>
            <td class="mr-3">
                <a href="/kelas/{{ $value->id }}" class="btn btn-info">Show</a>
                <a href="/kelas/{{ $value->id }}/edit" class="btn btn-success">Edit</a>
                <a href="{{ route('kelas.destroy', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
