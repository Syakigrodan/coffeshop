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
                        <div class="row">
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
                                        <h4>{{ $title }}</h4>
                                    </div>
                                    <div class="d-inline">
                                        <a href="/dashboard/manager/products/create" class="btn btn-success mx-4 mb-4">
                                            <i class="bi bi-plus-circle-fill"></i><span class="font-bold">
                                                Create Product</span>
                                        </a>
                                    </div>
                                    <div class="table">
                                        <div class="table-responsive px-4">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Image</th>
                                                        <th>Product</th>
                                                        <th>Description</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                @if ($item->image)
                                                                    @php
                                                                        $extension = pathinfo($item->image, PATHINFO_EXTENSION);
                                                                    @endphp
                                                                    @if ($extension)
                                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                                            alt=""
                                                                            style="height: 100px; width: 100px">
                                                                    @else
                                                                        <img src="https://source.unsplash.com/100x100?{{ $item->image }}"
                                                                            alt="">
                                                                    @endif
                                                                @else
                                                                    <img src="https://source.unsplash.com/random/100x100"
                                                                        alt="">
                                                                @endif
                                                            </td>
                                                            <td class="text-bold-500">{{ $item->product_name }}</td>
                                                            <td class="col-3">{{ $item->description }}</td>
                                                            <td>{{ $item->price }}</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a href="/dashboard/manager/products/{{ $item->id }}/edit"
                                                                        class="">
                                                                        <span class="badge bg-warning">
                                                                            <i class="bi bi-pencil-square"></i>
                                                                        </span>
                                                                    </a>
                                                                    <form
                                                                        action="/dashboard/manager/products/{{ $item->id }}"
                                                                        method="POST" class="d-inline">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="badge bg-danger border-0"
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
                                    <div class="px-4">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
