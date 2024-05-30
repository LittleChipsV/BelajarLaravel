@extends('layouts.admin')
@section('judul', 'Tambah Data Guru')
@section('content')
<form action="/guru" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <fieldset>
                <legend>Data Identitas</legend>
                <div class="form-group">
                    <label for="nama-guru">Nama guru</label>
                    <input required autofocus type="text" name="name" id="nama-guru" class="form-control @error('name')is-invalid @enderror" placeholder="Masukkan nama guru" value="{{old('name')}}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis-kelamin">Jenis kelamin</label>
                    <select class="form-control @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin" id="jenis-kelamin">
                        <option selected disabled>Pilih jenis kelamin</option>
                        <option value="laki">Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" name='email' id="email" class="form-control @error('email')is-invalid @enderror" placeholder="Masukkan email" value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input required type="password" name='password' id="password" class="form-control @error('password')is-invalid @enderror" placeholder="Masukkan password">
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
                    <div class="data-mengampu-group mb-3 p-3 border rounded">
                        <div class="form-group">
                            <label for="tuple-mata-pelajaran-kelas">Mata Pelajaran - Kelas</label>
                            <select name="id_tuple_mata_pelajaran_kelas[]" id="tuple-mata-pelajaran-kelas" class="form-control mata-pelajaran-select">
                                <option disabled selected>Pilih tuple mapel-kelas</option>
                                @foreach($daftar_tuple_mata_pelajaran_kelas as $tuple_mata_pelajaran_kelas)
                                <option value="{{ $tuple_mata_pelajaran_kelas->id }}">{{ $tuple_mata_pelajaran_kelas->mataPelajaran->nama_mata_pelajaran }} - {{ $tuple_mata_pelajaran_kelas->kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('id_tuple_mata_pelajaran_kelas.*')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="button" class="hapus-mata-pelajaran btn btn-danger">Hapus</button>
                    </div>
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

        const groupTemplate = container.firstElementChild.cloneNode(true);

        function addMatapelajaranGroup() {
            const newGroup = groupTemplate.cloneNode(true);
            container.appendChild(newGroup);
        }

        document.getElementById('tambah-data-mengampu').addEventListener('click', addMatapelajaranGroup);

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
