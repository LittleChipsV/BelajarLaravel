@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Gemilang: Login</title>

    <link rel="icon" href="{{ asset('sbadmin/img/icon.ico') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    {{-- <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" /> --}}
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css' ) }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <span class="h1 fw-bold text-center">Login</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email')is-invalid @enderror" id="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}" autofocus required />
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="{{ route('password.request') }}">
                                        <small>Lupa Password?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password')is-invalid @enderror" name="password" placeholder="Masukkan password" value="{{ old('password') }}" aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="fa-regular fas fa-eye"></i></span>
                                </div>
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <div class="form-check">
                                <input {{ old('remember') ? 'checked' : '' }} class="form-check-input" type="checkbox" name="remember" id="remember" />
                                <label class="form-check-label" for="remember"> Remember Me </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
