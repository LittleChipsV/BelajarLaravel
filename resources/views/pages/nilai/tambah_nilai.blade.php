@extends('layouts.admin')
@section('judul', 'Tambah Nilai')
@section('content')
    <form action="/nilai" method="POST">
        @csrf
        <div class="form-group p-3">
            <label>Nilai </label>
                <input type="number" name='nilai' class="form-control" >
                @error('nilai')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>

        <div class="form-group p-3">
            <label>Nama Siswa </label>
            <select name="id_siswa" id="daftar_siswa">
                @forelse($daftar_siswa as $siswa)
                    <option value="{{ $siswa->id_siswa }}">{{ $siswa->nama_siswa }}</option>
                @empty
                    <option value="" disabled>Belum ada siswa</option>
                @endforelse
            </select>
        @error('id_siswa')
        <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group p-3">
            <label>Topik </label>
            <select name="id_topik" id="daftar_topik">
                @forelse($daftar_topik as $topik)
                    <option value="{{ $topik->id_topik }}">{{ $topik->nama_topik }} | {{ $topik->nama_guru }}</option>
                @empty
                    <option value="" disabled>Belum ada Topik</option>
                @endforelse
            </select>
        @error('id_topik')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="p-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
</form>
@endsection