@extends('layouts.admin')
@section('judul', 'Daftar Nilai')

<!-- Page Heading -->
@section('tabel')
@can('isGuru')
<a href="/nilai/create" class="btn btn-primary my-3">Tambah Data Nilai</a>
@endcan
<div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                @can('isGuru')
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kelas Siswa </th>
                @endcan
                <th scope="col">Mata Pelajaran | Kelas</th>
                <th scope="col">Topik</th>
                <th scope="col">Nilai</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftar_nilai as $key => $value)
            <tr>
                <td scope="row">{{$key + 1}}</td>
                @can('isGuru')
                <td>{{ $value->siswa->name }}</td>
                <td>{{ isset($value->siswa->kelas->nama_kelas) ? $value->siswa->kelas->nama_kelas : '-' }}</td>
                @endcan
                <td>{{ "{$value->topik->tupleMataPelajaranKelas->mataPelajaran->nama_mata_pelajaran} | {$value->topik->tupleMataPelajaranKelas->kelas->nama_kelas}" }}</td>
                <td>{{ $value->topik->nama_topik }}</td>
                <td>{{ $value->nilai }}</td>
                <td class="mr-3">
                    <a href="/nilai/{{ $value->id }}" class="btn btn-info">Show</a>
                    @can('isGuru')
                    <a href="/nilai/{{ $value->id }}/edit" class="btn btn-success">Edit</a>
                    <a href="{{ route('nilai.destroy', $value->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="@can('isGuru') 7 @else 5 @endcan" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
