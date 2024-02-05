@extends('layouts.main')
@section('content')
    <div id="app">
        @include('layouts.components.sidebar')
        @include('layouts.components.navbar')
        <div id="main">
            <div class="page-heading">
                <h3>{{ $title }}</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Users Management</h4>
                            </div>
                            <div class="d-inline">
                                <a href="/dashboard/admin/userManagement/create" class="btn btn-success mx-4 mb-4">
                                    <i class="bi bi-plus-circle-fill"></i><span class="font-bold"> Add User</span>
                                </a>
                            </div>
                            <div class="table">
                                <div class="table-responsive px-4">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>FULLNAME</th>
                                                <th>USERNAME</th>
                                                <th>JABATAN</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $usr)
                                                <tr>
                                                    <td class="text-bold-500">{{ $loop->iteration }}</td>
                                                    <td>{{ $usr->fullname }}</td>
                                                    <td class="text-bold-500">{{ $usr->username }}</td>
                                                    <td>{{ $usr->position->position_name }}</td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <a href="/dashboard/admin/userManagement/{{ $usr->id }}/edit"
                                                                class="">
                                                                <span class="badge bg-warning">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </span>
                                                            </a>
                                                            <form
                                                                action="/dashboard/admin/userManagement/{{ $usr->id }}"
                                                                method="POST" class="d-inline">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="badge bg-danger border-0"
                                                                    onclick="return confirm('Are you sure?')">
                                                                    <i class="bi bi-x-octagon-fill"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
