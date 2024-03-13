@extends('layouts.admin')
@section('judul')
Data Topik
@endsection
<!-- Page Heading -->
@section('tabel')
<div class="p-3">
    <a href="/tambahtopik" class="btn btn-primary my-3">Tambah Data Topik</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Nama Topik</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_topik as $key => $value)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$value->nama_topik}}</td>
                <td>{{ $value->nama_mapel}}</td>
                    <td class="mr-3">
                    <a href="/topik/{{$value->id_topik}}" class="btn btn-info">Show </a>
                    <a href="/topik/{{$value->id_topik}}/edit" class="btn btnsuccess">Edit</a>
                    <a href="/topik/ {{$value->id_topik }}" class="btn btndanger" data-confirm-delete="true">Delete</a>
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