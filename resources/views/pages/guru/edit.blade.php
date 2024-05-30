@extends('layouts.admin')
@section('judul', 'Edit Data Guru')
@section('content')
<form action="/guru/{{ $guru->id }}" method="POST">
    @csrf
    @method('PUT')
    <div id='data-mengampu-template' style="display: none;" class="data-mengampu-group mb-3 p-3 border rounded">
        <div class="form-group">
            <span class="bg-success label-indikator">Baru</span>
            <label for="tuple-mapel-kelas">Tuple mapel-kelas</label>
            <select name="id_tuple_mata_pelajaran_kelas[]" id="tuple-mapel-kelas" class="form-control mata-pelajaran-select">
                <option selected disabled>Pilih tuple mapel-kelas</option>
                @foreach($daftar_tuple_mata_pelajaran_kelas as $tuple_mata_pelajaran_kelas)
                <option value="{{ $tuple_mata_pelajaran_kelas->id }}">{{ $tuple_mata_pelajaran_kelas->mataPelajaran->nama_mata_pelajaran }} - {{ $tuple_mata_pelajaran_kelas->kelas->nama_kelas }}</option>
                @endforeach
            </select>
            @error('id_mata_pelajaran')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="button" class="hapus-mata-pelajaran btn btn-danger">Hapus</button>
    </div>


    <div class="row">
        <div class="col-md-6">
            <fieldset>
                <legend>Data Identitas</legend>
                <div class="form-group">
                    <label for="nama-guru">Nama guru</label>
                    <input required autofocus type="text" name="name" id="nama-guru" class="form-control @error('name')is-invalid @enderror" placeholder="Masukkan nama guru" value="{{$guru->name}}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis-kelamin">Jenis kelamin</label>
                    <select class="form-control @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin" id="jenis-kelamin">
                        <option {{ $guru->jenis_kelamin == 'laki' ? 'selected' :''}} value="laki">Laki</option>
                        <option {{ $guru->jenis_kelamin == 'perempuan' ? 'selected' :''}}  value="perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" name='email' id="email" class="form-control @error('email')is-invalid @enderror" placeholder="Masukkan email" value="{{$guru->email}}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" name='password' id="password" class="form-control @error('password')is-invalid @enderror" placeholder="Masukkan password baru (opsional)">
                        <span class="input-group-text cursor-pointer" id="toggle-password"><i class="fa fa-eye"></i></span>
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>
        </div>

        <div class="col-md-6">
            <fieldset>
                <legend>Data Mengampu</legend>
                <div id="data-mengampu-container">
                    @forelse ($guru->dataMengampu as $data)
                    <div class="data-mengampu-group mb-3 p-3 border rounded">
                        <span class="bg-warning label-indikator">Lama</span>
                        <div class="form-group">
                            <label for="tuple-mapel-kelas-{{$loop->index}}-lama">Tuple mapel-kelas</label>
                            <select name="id_tuple_mata_pelajaran_kelas[]" id="tuple-mapel-kelas-{{$loop->index}}-lama" class="form-control mata-pelajaran-select">
                                @foreach($daftar_tuple_mata_pelajaran_kelas as $tuple_mata_pelajaran_kelas)
                                <option {{ $data->id == $tuple_mata_pelajaran_kelas->id ? 'selected' : '' }} value="{{ $tuple_mata_pelajaran_kelas->id }}">{{ $tuple_mata_pelajaran_kelas->mataPelajaran->nama_mata_pelajaran }} - {{ $tuple_mata_pelajaran_kelas->kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('id_tuple_mata_pelajaran_kelas')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="button" class="hapus-mata-pelajaran btn btn-danger">Hapus</button>
                    </div>
                    @empty
                    <div class="data-mengampu-group mb-3 p-3 border rounded">
                        <div class="form-group">
                            <span class="bg-success label-indikator">Baru</span>
                            <label for="tuple-mapel-kelas">Tuple mapel-kelas</label>
                            <select name="id_tuple_mata_pelajaran_kelas[]" id="tuple-mapel-kelas" class="form-control mata-pelajaran-select">
                                <option selected disabled>Pilih tuple mapel-kelas</option>
                                @foreach($daftar_tuple_mata_pelajaran_kelas as $tuple_mata_pelajaran_kelas)
                                <option value="{{ $tuple_mata_pelajaran_kelas->id }}">{{ $tuple_mata_pelajaran_kelas->mataPelajaran->nama_mata_pelajaran }} - {{ $tuple_mata_pelajaran_kelas->kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('id_mata_pelajaran')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="button" class="hapus-mata-pelajaran btn btn-danger">Hapus</button>
                    </div>
                    @endforelse
                </div>
                <button type="button" id="tambah-data-mengampu" class="mt-4 btn btn-info">Tambah</button>
            </fieldset>
        </div>
        <div>
            <a href="/guru" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<style>
    fieldset{
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
    }

    legend{
        width: auto;
        padding: 0 10px;
    }

    .label-indikator{
        display: inline-block;
        padding: 5px 10px;
        color: #fff;
        border-radius: 5px;
        margin-bottom: 10px;
        float: right;
    }

    .input-group-text {
        cursor: pointer;
        color: #495057;
        background-color: #fff;
        border-left: 0;
        border-radius: 0;
    }

    .input-group .form-control {
        border-right: 0;
    }

    #data-mengampu-container{
        max-height: 400px;
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
    }

    .data-mengampu-group {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 15px;
        margin-bottom: 10px;
    }

    .data-mengampu-group .form-group {
        margin-bottom: 10px;
    }

    .hapus-mata-pelajaran {
        margin-top: 10px;
    }
    </style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            passwordInput.setAttribute('type', passwordInput.getAttribute('type') === 'password' ? 'text' : 'password');

            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        const container = document.getElementById('data-mengampu-container');
        const template = document.getElementById('data-mengampu-template');
        let id = 0;

        document.getElementById('tambah-data-mengampu').addEventListener('click', () => {
            const clone = template.cloneNode(true);
            clone.style.display = 'block';
            clone.id = '';
            container.appendChild(clone);

            clone.querySelector('.mata-pelajaran-select').id = `mata-pelajaran-${id}-baru`;
            clone.querySelector('label[for="mata-pelajaran"]').setAttribute('for', `mata-pelajaran-${id}-baru`);

            clone.querySelector('.kelas-select').id = `kelas-${id}-baru`;
            clone.querySelector('label[for="kelas"]').setAttribute('for', `kelas-${id}-baru`);

            const label = document.createElement('span');
            label.classList.add('label-indikator', 'bg-success');
            label.textContent = 'Baru';
            clone.querySelector('.form-group').prepend(label);

            id++;
        });

        container.addEventListener('click', function (e) {
            if (e.target.classList.contains('hapus-mata-pelajaran')){
                if (container.childElementCount == 1){
                    alert('Jumlah card data mengampu tinggal tersisa 1 saja');
                } else {
                    e.target.closest('.data-mengampu-group').remove();
                }
            }
        });
    });
</script>
@endsection
