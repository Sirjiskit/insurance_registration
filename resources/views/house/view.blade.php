@extends('layouts.master')
@section('sub_title')
    Home Insurance
@endsection
@section('styled')
    @include('layouts.partials.styled')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/pages/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('sidebar')
    @include('layouts.partials.sidebar', ['active' => 'house', 'target' => 'view'])
@endsection
@section('heading')
    Home Insurance
@endsection
@section('contents')
    <section>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Home Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th style="white-space: nowrap">SN</th>
                                        @if (auth()->user()->userType == 1)
                                            <th style="white-space: nowrap">Owner</th>
                                        @endif
                                        <th style="white-space: nowrap">Policy No.</th>
                                        <th style="white-space: nowrap">BedRooms.</th>
                                        <th style="white-space: nowrap">BathRooms.</th>
                                        @if (auth()->user()->userType == 2)
                                            <th style="white-space: nowrap">Pool?</th>
                                            <th style="white-space: nowrap">Fenced?</th>
                                        @endif
                                        <th style="white-space: nowrap">Year Built</th>
                                        <th>Value(NGN)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($list as $x)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            @if (auth()->user()->userType == 1)
                                                <td style="white-space: nowrap">{{ @$x->fullname }}</td>
                                            @endif
                                            <td style="white-space: nowrap">{{ @$x->IRNO }}</td>
                                            <td style="white-space: nowrap">{{ @$x->bedRooms }}</td>
                                            <td style="white-space: nowrap">{{ @$x->baths }}</td>
                                            @if (auth()->user()->userType == 2)
                                                <td style="white-space: nowrap">{{ @$x->pool }}</td>
                                                <td style="white-space: nowrap">{{ @$x->fenced }}</td>
                                            @endif
                                            <td style="white-space: nowrap">{{ @$x->year }}</td>
                                            <td style="white-space: nowrap">{{ number_format(@$x->value, 2) }}</td>
                                            <td style="white-space: nowrap">
                                                <span
                                                    class="badge  {{ strtolower(@$x->status) == 'pending' ? 'bg-warning' : (strtolower(@$x->status) == 'rejected' ? 'bg-danger' : 'bg-success') }}">{{ @$x->status }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-light btn-sm"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('home.view', ['id' => $x->id]) }}">View</a>
                                                            @if (auth()->user()->userType == 1 && strtolower(@$x->status) == 'pending')
                                                                <a class="dropdown-item btn-change-status" href="#"
                                                                    data-url={{ route('home.update') }}
                                                                    data-status='Approved' data-msg='Approve'
                                                                    data-id='{{ $x->id }}'>Approve</a>
                                                                <a class="dropdown-item btn-change-status" href="#"
                                                                    data-url={{ route('home.update') }}
                                                                    data-status='Rejected' data-msg='Reject'
                                                                    data-id='{{ $x->id }}'>Reject</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @include('layouts.partials.scripts')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>
    <script src="{{ asset('assets/js/pages/home.js') }}"></script>
@endsection
