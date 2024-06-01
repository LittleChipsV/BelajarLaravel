@extends('layouts.admin')
@section('judul', 'Daftar Siswa')
@section('tabel')
<a href="/siswa/create" class="btn btn-primary my-3">Tambah Data Siswa</a>
<div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Email</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftar_siswa as $key => $value)
            <tr>
                <td scope="row">{{ $key + 1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->jenis_kelamin }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->kelas }}</td>
                <td class="mr-3">
                    <a href="/siswa/{{ $value->id }}" class="btn btn-info">Show</a>
                    <a href="/siswa/{{ $value->id }}/edit" class="btn btn-success">Edit</a>
                    <a href="{{ route('siswa.destroy', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="6">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
