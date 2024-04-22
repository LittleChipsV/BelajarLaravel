@extends('layouts.admin')
@section('judul', 'Daftar Siswa')
@section('tabel')
<a href="/siswa/create" class="btn btn-primary my-3">Tambah Data Siswa</a>
<table id="dataTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Kelas</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftar_siswa as $key => $value)
        <tr>
            <td scope="row">{{ $key + 1 }}</td>
            <td>{{ $value->nama_siswa }}</td>
            <td>{{ $value->jenis_kelamin }}</td>
            <td>{{ $value->kelas->nama_kelas }}</td>
            <td class="mr-3">
                <a href="/siswa/{{ $value->id }}" class="btn btn-info">Show</a>
                <a href="/siswa/{{ $value->id }}/edit" class="btn btn-success">Edit</a>
                <a href="{{ route('siswa.destroy', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td class="text-center" colspan="5">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
