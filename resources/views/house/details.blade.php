@extends('layouts.master')
@section('sub_title')
    Home Insurance
@endsection
@section('styled')
    @include('layouts.partials.styled')
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
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
                    @if (auth()->user()->userType == 2)
                        <div class="card-header">
                            <h4 class="card-title">Owner Information</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Owner's Name:</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <div class="form-control">{{ $data->fullname }}</div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Residential State:</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <div class="form-control">{{ $data->state }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Phone number:</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <div class="form-control">{{ $data->phone }}</div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Residential City:</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <div class="form-control">{{ $data->City }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Address 1:</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <div class="form-control">{{ $data->address }}</div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Address 2:</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <div class="form-control">{!! $data->address2 ?? '&nbsp;' !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-header">
                        <h4 class="card-title">Home Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>No. of Bedrooms::</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->bedRooms }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>No. of Baths:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->baths }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Pool?:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->pool }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Is Fenced?:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->fenced }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Roof Type:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->roofType }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Policy No.:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->IRNO }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Age of Roof:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->roofage }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Garage (# of Cars):</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->garage }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Floor types:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->floorType }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Year Built:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->year }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Building value:(NGN):</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ number_format(@$data->value, 2) }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Status:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div
                                                        class="form-control {{ strtolower(@$data->status) == 'pending' ? 'text-warning' : (strtolower(@$data->status) == 'rejected' ? 'text-danger' : 'text-success') }}">
                                                        {{ $data->status }}</div>
                                                </div>
                                                @if (auth()->user()->userType == 1 && strtolower(@$data->status) == 'pending')
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button"
                                                            class="btn btn-primary btn-change-status me-1 mb-1"
                                                            data-url={{ route('home.update') }} data-status='Approved'
                                                            data-msg='Approve'
                                                            data-id='{{ $data->id }}'>Approve</button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-change-status me-1 mb-1"
                                                            data-url={{ route('home.update') }} data-status='Rejected'
                                                            data-msg='Reject' data-id='{{ $data->id }}'>Reject</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>
    <script src="{{ asset('assets/js/pages/home.js') }}"></script>
@endsection
