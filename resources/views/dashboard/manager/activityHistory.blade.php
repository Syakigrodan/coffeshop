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
                                    <div class="card-header">
                                        <h4>{{ $title }}
                                    </div>
                                    <div class="table">
                                        <div class="table-responsive px-4">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Time</th>
                                                        <th>Fullname</th>
                                                        <th>Jabatan</th>
                                                        <th>Action</th>
                                                        <th>Desciption</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($activityHistories->count() > 0)
                                                        @foreach ($activityHistories as $ah)
                                                            <tr>
                                                                <td class="text-bold-500">{{ $ah->created_at }}</td>
                                                                <td>{{ $ah->fullname }}</td>
                                                                <td>{{ $ah->position }}</td>
                                                                <td>{{ $ah->action }}</td>
                                                                <td>{{ $ah->description }}</td>
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
                                            {{ $activityHistories->links() }}
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
