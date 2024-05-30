@extends('layouts.admin')
@section('judul', 'Daftar Tuple Mata Pelajaran-Kelas')
@section('tabel')
<a href="/tuple_mata_pelajaran_kelas/create" class="btn btn-primary my-3">Tambah Data Tuple Mata Pelajaran-Kelas</a>
<div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mata Pelajaran</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftar_tuple_mata_pelajaran_kelas as $key => $value)
            <tr>
                <td scope="row">{{$key + 1}}</td>
                <td>{{ $value->mataPelajaran->nama_mata_pelajaran }}</td>
                <td>{{ $value->kelas->nama_kelas }}</td>
                <td class="mr-3">
                    <a href="/tuple_mata_pelajaran_kelas/{{ $value->id }}" class="btn btn-info">Show</a>
                    <a href="/tuple_mata_pelajaran_kelas/{{ $value->id }}/edit" class="btn btn-success">Edit</a>
                    <a href="{{ route('tuple_mata_pelajaran_kelas.destroy', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />
