@extends('layouts.admin')
@section('judul', 'Tambah Nilai')
@section('content')
<form action="/nilai" method="POST">
    @csrf
    <div class="col-lg-6">
        <div class="form-group">
            <label for="siswa">Nama siswa</label>
            <select required autofocus class="form-control @error('id_siswa')is-invalid @enderror" name="id_siswa" id="siswa">
                <option selected disabled>Pilih siswa</option>
                @foreach($daftar_siswa as $siswa)
                    <option {{ old('id_siswa') == $siswa->id ? 'selected' : '' }} value="{{ $siswa->id }}">{{ "{$siswa->nama_siswa} | {$siswa->kelas->nama_kelas}" }}</option>
                @endforeach
            </select>
            @error('id_siswa')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input required type="number" min="0" max="100" name="nilai" id="nilai" value="{{ old('nilai') }}" class="form-control @error('nilai')is-invalid @enderror" placeholder="Masukkan nilai">
            @error('nilai')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="topik">Topik</label>
            <select required class="form-control @error('id_topik')is-invalid @enderror" name="id_topik" id="topik">
                <option selected disabled>Pilih topik</option>
                @foreach($daftar_topik as $topik)
                    <option {{ old('id_topik') == $topik->id ? 'selected' : ''}} value="{{ $topik->id }}">{{ "$topik->nama_topik | {$topik->mataPelajaran->nama_mata_pelajaran}" }}</option>
                @endforeach
            </select>
            @error('id_topik')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div>
                <a href="/nilai" class="btn btn-success my-3">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection
