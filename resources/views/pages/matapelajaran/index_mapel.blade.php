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
        </tbody>
    </table>
</div>
@endsection
<link rel="stylesheet" type="text/css"
href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>