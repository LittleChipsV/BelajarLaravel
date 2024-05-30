@extends('layouts.admin')
@section('judul', 'Tambah Data Topik')
@section('content')
<form action="/topik" method="POST">
    @csrf
    <div class="col-lg-6">
        @if($daftar_data_mengampu->count() > 1)
            <div class="form-group">
                <label for="tuple-mata-pelajaran-kelas">Mata Pelajaran-Kelas</label>
                <select class="form-control" name="id_tuple_mata_pelajaran_kelas" id="tuple-mata-pelajaran-kelas">
                    <option selected disabled>Pilih Mata Pelajaran-Kelas</option>
                    @foreach($daftar_data_mengampu as $data_mengampu)
                        <option value="{{ $data_mengampu->pivot->id_tuple_mata_pelajaran_kelas }}">{{ $data_mengampu->mataPelajaran->nama_mata_pelajaran }} | {{ $data_mengampu->kelas->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('id_tuple_mata_pelajaran_kelas')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        @endif
        <div class="form-group">
            <label for="nama-topik">Nama topik</label>
            <input autofocus required type="text" name='nama_topik' value="{{ old('nama_topik') }}" id="nama-topik" class="form-control @error('nama_topik')is-invalid @enderror" placeholder="Masukkan nama topik">
            @error('nama_topik')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/topik" class="btn btn-success">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
