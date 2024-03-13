@extends('layouts.admin')
@section('judul')
Data Guru
@endsection
<!-- Page Heading -->
@section('tabel')
<div class="p-3">
    <a href="/tambahguru" class="btn btn-primary my-3">Tambah Data Guru</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
<link rel="stylesheet" type="text/css"
href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>