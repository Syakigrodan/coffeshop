@extends('layouts.main')
@section('content')
    <div id="app">
        @include('layouts.components.sidebar')
        @include('layouts.components.navbar')
        <div id="main">
            <div class="page-heading">
                <h3>History Transaksi</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <h4>History Transaksi</h4>
                                    </div>
                                    <div class="col-3">
                                        <form action="{{ route('manager-transactionSearch') }}" method="get">
                                            @csrf
                                            <div class="input-group">
                                                <input type="text" id="search" class="form-control" name="search"
                                                    placeholder="Search Username">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <form action="{{ route('manager-transactionFilter') }}" method="get">
                                            @csrf
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="filter"
                                                    id="filter_all" value="all">
                                                <label class="form-check-label" for="filter_all">All</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="filter"
                                                    id="filter_daily" value="daily">
                                                <label class="form-check-label" for="filter_daily">Day</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="filter"
                                                    id="filter_monthly" value="monthly">
                                                <label class="form-check-label" for="filter_monthly">Month</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm ml-2">
                                                <i class="bi bi-funnel-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form class=" gap-2 d-flex"
                                                action="{{ route('manager-transactionFilterDate') }}" method="get">
                                                @csrf
                                                <input type="text" id="start_date" name="start_date"
                                                    class="form-control flatpickr mr-2" placeholder="Tanggal Mulai">
                                                <input type="text" id="end_date" name="end_date"
                                                    class="form-control flatpickr mr-2" placeholder="Tanggal Akhir">
                                                <button type="submit" id="submit_button" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-funnel-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>waktu</th>
                                                    <th>full nama</th>
                                                    <th>Username</th>
                                                    <th>Jabatan</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($transactions->count() > 0)
                                                @foreach ($transactions as $t)
                                                <tr>
                                                    <td class="text-bold-500">{{ $t->created_at }}</td>
                                                    <td>{{ optional($t->user)->fullname }}</td>
                                                    <td>{{ optional($t->user)->username }}</td>
                                                    <td>{{ optional(optional($t->user)->position)->position_name }}</td>
                                                    <td>{{ 'Rp. ' . number_format($t->total_price, 2, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="5" class="text-center font-bold">
                                                        Activity History is empty
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                        {{ $transactions->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        flatpickr("#start_date", {
            dateFormat: "Y-m-d"
        });

        flatpickr("#end_date", {
            dateFormat: "Y-m-d"
        });

        document.getElementById("submit_button").addEventListener("click", function() {
            var startDate = document.getElementById("start_date").value;
            var endDate = document.getElementById("end_date").value;

            console.log("Tanggal Mulai:", startDate);
            console.log("Tanggal Akhir:", endDate);
        });
    </script>

@endsection
