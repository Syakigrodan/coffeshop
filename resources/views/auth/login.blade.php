@extends('layouts.main')
@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-7 col-12">
                <div id="auth-left" class="d-flex justify-content-center align-items-center h-100 mx-auto">
                    <div>
                        <div class="logo">
                            <a href="" class="brand">coffe</a>
                        </div>
                        <h1 class="auth-title">Login.</h1>
                        <p class="auth-subtitle mb-5">Masuk dengan data Anda yang Anda masukkan saat pendaftaran</p>
                        <form action="/loginStore" method="post">
                            @csrf
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control @error('username') is-invalid @enderror form-control-xl" placeholder="Username" name="username" id="username" required autofocus>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" class="form-control @error('password') is-invalid @enderror form-control-xl" placeholder="Password" name="password" id="password" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
