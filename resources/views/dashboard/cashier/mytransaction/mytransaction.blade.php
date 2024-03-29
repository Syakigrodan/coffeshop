@extends('layouts.main')
@section('content')
    <div id="app">
        @include('layouts.components.sidebar')
        @include('layouts.components.navbar')
        <div id="main">
            <div class="page-heading">
                <h3>Data Transaksi</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <h4>Transaksi</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form class=" gap-2 d-flex"
                                                action="{{ route('cashier-myTransactionFilterDate') }}" method="get">
                                                @csrf
                                                <input type="text" id="start_date" name="start_date"
                                                    class="form-control flatpickr mr-2" placeholder="Tanggal Mulai"
                                                    required>
                                                <input type="text" id="end_date" name="end_date"
                                                    class="form-control flatpickr mr-2" placeholder="Tanggal Akhir"
                                                    required>
                                                <button type="submit" id="submit_button" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-funnel-fill"></i>
                                                </button>
                                                <div>
                                                    <a href="/export-pdf"  class="btn btn-sm btn-success">CETAK</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="table-responsive mt-4">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Jam</th>
                                                    <th>full nama</th>
                                                    <th>Username</th>
                                                    <th>Jabatan</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($myTransactions->count() > 0)
                                                    @foreach ($myTransactions as $t)
                                                        <tr>
                                                            <td class="text-bold-500">{{ $t->created_at }}</td>
                                                            <td>{{ $t->user->fullname }}</td>
                                                            <td>{{ $t->user->username }}</td>
                                                            <td>{{ $t->user->position->position_name }}</td>
                                                            <td>{{ 'Rp. ' . number_format($t->total_price, 2, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-center font-bold">
                                                            Transaction is empty
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        {{ $myTransactions->links() }}
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
