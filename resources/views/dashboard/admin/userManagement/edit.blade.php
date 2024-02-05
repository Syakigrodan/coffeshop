@extends('layouts.main')

@section('content')
    <div id="app">
        @include('layouts.components.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>{{ $title }}</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit User</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="/dashboard/admin/userManagement/{{ $user->id }}" method="post">
                                        @method('put')
                                        @csrf
                                        <div class="form-group">
                                            <label for="fullname">Fullname</label>
                                            <input type="text" id="fullname"
                                                class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                                placeholder="Fullname" value="{{ $user->fullname }}" autofocus>
                                            @error('fullname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                placeholder="Username" value="{{ $user->username }}" required>
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="position"> Position</label>
                                            <select class="form-select @error('position') is-invalid @enderror"
                                                id="position_id" name="position_id" required>
                                                <option value="{{ old('position_id') }}">Choose Position</option>
                                                @foreach ($position as $position)
                                                    <option value="{{ $position->id }}"
                                                        {{ $position->id == $user->position->id ? 'selected' : '' }}>
                                                        {{ $position->position_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                placeholder="Password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" id="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" placeholder="Password Confirmation" required>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 font-bold">
                                                Update User
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
