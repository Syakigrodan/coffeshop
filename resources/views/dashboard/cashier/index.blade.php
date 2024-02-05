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
                                    <div>
                                        <div class="container mt-4">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-md-12">
                                                    <form action="{{ route('cashier-searchProduct') }}" method="get"
                                                        class="d-flex">
                                                        <div class="input-group gap-4">
                                                            @csrf
                                                            <input name="search" id="search" type="text"
                                                                class="form-control" placeholder="Search Product">
                                                            <div class="input-group-append">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                @foreach ($products as $product)
                                                    <div class="col-sm-12 col-xs-12 col-md-4 col-lg-3 mb-4">
                                                        <div class="card h-80">
                                                            <img class="card-img-top img-fluid"
                                                                src="https://source.unsplash.com/150x150/?{{ $product->image }}"
                                                                alt="">
                                                            <div class="card-img-overlay"
                                                                style="background-color: rgba(0,0,0,0.5);">
                                                                <h5 class="text-white">
                                                                    <strong>{{ $product->product_name }}</strong>
                                                                </h5>
                                                                <h6 class="text-white">Rp
                                                                    {{ number_format($product->price, 2, ',', '.') }}</h6>
                                                                <p class="text-white">
                                                                    {{ $product->description }}
                                                                </p>
                                                                <a href="/dashboard/cashier/addToCart/{{ $product->id }}"
                                                                    class="btn btn-sm btn-block btn-outline-secondary text-white">Add
                                                                    to cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{ $products->links() }}
                                        </div>
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
