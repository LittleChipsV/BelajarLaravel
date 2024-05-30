@extends('layouts.admin')
@section('judul', 'Tambah Data Siswa')
@section('content')
<form action="/siswa" method="POST">
    @csrf
    <div class="col-lg-6">
        <div class="form-group">
            <label for="name">Nama siswa</label>
            <input required autofocus type="text" name='name' id="name" class="form-control @error('nama_siswa')is-invalid @enderror" placeholder="Masukkan nama siswa" value="{{ old('name') }}">
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
            <input required type="email" name='email' id="email" class="form-control @error('email')is-invalid @enderror" placeholder="Masukkan email" value="{{ old('email') }}">
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
        <div class="form-group">
            <label for="kelas">kelas</label>
            <select class="form-control @error('id_kelas')is-invalid @enderror" name="id_kelas" id="kelas">
                <option selected disabled>Pilih kelas</option>
                @foreach($daftar_kelas as $kelas)
                <option value="{{ $kelas->id }}" {{old('id_kelas') == $kelas->id ? "selected" : ""}}>{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
            @error('id_kelas')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <a href="/siswa" class="btn btn-success my-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<style>
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
    });
</script>
@endsection
