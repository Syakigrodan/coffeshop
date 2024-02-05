@extends('layouts.main')
@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="#"><img src="{{ asset('back-end/assets/compiled/svg/logo.svg') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
                    <form action="/loginStore" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input
                                type="text"class="form-control @error('username') is-invalid
                            @enderror form-control-xl"
                                placeholder="Username" name="username" id="username" required autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('username')
                                <div class="valid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password"
                                class="form-control @error('password') is-invalid
                            @enderror form-control-xl"
                                placeholder="Password" name="password" id="password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <div class="valid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <img src="https://source.unsplash.com/1920x1080/?caffee" alt="" class="h-full">
                </div>
            </div>
        </div>
    </div>
@endsection
