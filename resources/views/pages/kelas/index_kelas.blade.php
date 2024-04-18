@extends('layouts.admin')
@section('judul')
Data Kelas
@endsection
<!-- Page Heading -->
@section('tabel')
<div class="p-3">
    <a href="/tambahkelas" class="btn btn-primary my-3">Tambah Data Kelas</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_kelas as $key => $value)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$value->nama_kelas}}</td>
                <td class="mr-3">
                    <a href="/kelas/{{$value->id_kelas}}" class="btn btn-info">Show </a>
                    <a href="/kelas/{{$value->id_kelas}}/edit" class="btn btn-success">Edit</a>
                    <a href="/kelas/ {{$value->id_kelas }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
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