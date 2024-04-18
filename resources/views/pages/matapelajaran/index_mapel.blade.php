@extends('layouts.admin')
@section('judul')
Data Mata Pelajaran
@endsection
<!-- Page Heading -->
@section('tabel')
<div class="p-3">
    <a href="/tambahmapel" class="btn btn-primary my-3">Tambah Data Mata Pelajaran</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mata Pelajaran</th>
                <th scope="col">Guru Pengampu</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_mapel as $key => $value)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$value->nama_mapel}}</td>
                <td>{{ $value->nama_guru}}</td>
                    <td class="mr-3">
                    <a href="/mapel/{{$value->id_mapel}}" class="btn btn-info">Show </a>
                    <a href="/mapel/{{$value->id_mapel}}/edit" class="btn btn-success">Edit</a>
                    <a href="/mapel/{{$value->id_mapel }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
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