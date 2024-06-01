@extends('layouts.admin')
@section('judul', 'Edit Nilai')
@section('content')
<form action="/nilai/{{ $nilai->id }}" method="POST">
    <div class="col-lg-6">
        @csrf
        @method('PUT')
        {{-- @if($daftar_data_mengampu->count() > 1)
            <div class="form-group">
                <label for="mata_pelajaran">Mata Pelajaran</label>
                <select class="form-control" name="id_mata_pelajaran" id="mata_pelajaran">
                    <option selected disabled>Pilih Mata Pelajaran</option>
                    @foreach($daftar_data_mengampu as $data_mengampu)
                        <option value="{{ $data_mengampu->pivot->id_mata_pelajaran }}">{{ $data_mengampu->nama_mata_pelajaran }}</option>
                    @endforeach
                </select>
            </div>
        @endif --}}
        <div class="form-group">
            <label for="topik">Topik</label>
            <select class="form-control" name="id_topik" id="topik">
                <option selected disabled>Pilih topik</option>

                @foreach($daftar_topik as $topik)
                    <option {{ $nilai->topik->id == $topik->id ? 'selected' : '' }} value="{{ $topik->id }}">{{ "$topik->nama_topik | {$topik->tupleMataPelajaranKelas->mataPelajaran->nama_mata_pelajaran} - {$topik->tupleMataPelajaranKelas->kelas->nama_kelas}" }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input required type="number" min="0" max="100" name="nilai" id="nilai" value="{{ $nilai->nilai }}" class="form-control @error('nilai')is-invalid @enderror" placeholder="Masukkan nilai">
            @error('nilai')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/nilai" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
