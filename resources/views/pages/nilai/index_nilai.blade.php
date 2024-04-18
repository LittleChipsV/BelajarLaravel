@extends('layouts.admin')
@section('judul')
Data Nilai
@endsection
<!-- Page Heading -->
@section('tabel')
<div class="p-3">
    <a href="/tambahnilai" class="btn btn-primary my-3">Tambah Data Nilai</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Topik</th>
                <th scope="col">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_nilai as $key => $value)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$value->nama_siswa}}</td>
                <td>{{$value->nama_mapel}}</td>
                <td>{{$value->nama_topik}}</td>
                <td>{{$value->nilai}}</td>
                    <td class="mr-3">
                    <a href="/nilai/{{$value->id_nilai}}" class="btn btn-info">Show </a>
                    <a href="/nilai/{{$value->id_nilai}}/edit" class="btn btn-success">Edit</a>
                    <a href="/nilai/{{$value->id_nilai }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                </td>
            </div>
            </tr>
        {{--tidak ada data --}}
        </tbody>
            @empty
            <tr colspan="6">
                <td>No data</td>
            </tr>
            @endforelse
    </table>
</div>
@endsection
<link rel="stylesheet" type="text/css"
href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>