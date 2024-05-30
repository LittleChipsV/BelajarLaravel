@extends('layouts.admin')
@section('judul', 'Daftar Mata Pelajaran')
@section('tabel')
<a href="/mata-pelajaran/create" class="btn btn-primary my-3">Tambah Data Mata Pelajaran</a>
<div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mata Pelajaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftar_mata_pelajaran as $key => $value)
            <tr>
                <td scope="row">{{ $key + 1 }}</td>
                <td>{{ $value->nama_mata_pelajaran }}</td>
                <td class="mr-3">
                    <a href="/mata-pelajaran/{{ $value->id }}" class="btn btn-info">Show </a>
                    <a href="/mata-pelajaran/{{ $value->id }}/edit" class="btn btn-success">Edit</a>
                    <a href="{{ route('mata-pelajaran.destroy', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
