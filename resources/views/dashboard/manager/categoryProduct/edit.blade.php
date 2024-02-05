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
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $title }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="/dashboard/manager/categoryProduct/{{ $categoryProduct->id }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="category_product_name">Category Product</label>
                                            <input type="text" id="category_product_name"
                                                value="{{ $categoryProduct->category_product_name }}"
                                                class="form-control @error('category_product_name') is-invalid @enderror"
                                                name="category_product_name" placeholder="Category Product" required
                                                autofocus>
                                            @error('category_product_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" style="resize: none; height: 100px;"
                                                placeholder="Description" id="description" name="description" style="height: 87px;" required>{{ $categoryProduct->description }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 font-bold">
                                                Update Category Product
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
