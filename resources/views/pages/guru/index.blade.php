@extends('layouts.admin')
@section('judul', 'Daftar Guru')
@section('tabel')
<a href="/guru/create" class="btn btn-primary my-3">Tambah Data Guru</a>
<div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Email</th>
                <th scope="col">Mengampu</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftar_guru as $key => $value)
            <tr>
                <td scope="row">{{$key + 1}}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>
                    <ul>
                        @forelse ($value->dataMengampu as $data_mengampu)
                            <li>{{ $data_mengampu->kelas->nama_kelas }} | {{ $data_mengampu->mataPelajaran->nama_mata_pelajaran }}</li>
                        @empty
                            -
                        @endforelse
                    </ul>
                </td>
                <td class="mr-3">
                    <a href="/guru/{{ $value->id }}" class="btn btn-info">Show</a>
                    <a href="/guru/{{ $value->id }}/edit" class="btn btn-success">Edit</a>
                    <a href="{{ route('guru.destroy', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
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
