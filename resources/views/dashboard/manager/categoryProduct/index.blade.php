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
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible show fade">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card-header">
                                <h4>Category Product</h4>
                            </div>
                            <div class="d-inline">
                                <a href="/dashboard/manager/categoryProduct/create" class="btn btn-success mx-4 mb-4">
                                    <i class="bi bi-plus-circle-fill"></i><span class="font-bold"> Create Category
                                        Product</span>
                                </a>
                            </div>
                            <div class="table">
                                <div class="table-responsive px-4">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Category Product</th>
                                                <th>Desciption</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categoryProducts as $cp)
                                                <tr>
                                                    <td class="text-bold-500">{{ $loop->iteration }}</td>
                                                    <td>{{ $cp->category_product_name }}</td>
                                                    <td>{{ $cp->description }}</td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <a href="/dashboard/manager/categoryProduct/{{ $cp->id }}/edit"
                                                                class="">
                                                                <span class="badge bg-warning">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </span>
                                                            </a>
                                                            <form
                                                                action="/dashboard/manager/categoryProduct/{{ $cp->id }}"
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
