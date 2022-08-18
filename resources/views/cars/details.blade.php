@extends('layouts.master')
@section('sub_title')
    Car Insurance
@endsection
@section('styled')
    @include('layouts.partials.styled')
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('sidebar')
    @include('layouts.partials.sidebar', ['active' => 'cars', 'target' => 'view'])
@endsection
@section('heading')
    Car Insurance
@endsection
@section('contents')
    <section>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    @if (auth()->user()->userType == 1)
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
                        <h4 class="card-title">Car Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Regisgration No:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->plateNo }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>chasis Number:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->chasisNo }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Car Make:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->make }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Car Model:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->model }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Engine No:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->engineNo }}</div>
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
                                                    <label>Mileage:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->mileage }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Color:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->color }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Car Value(NGN):</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ number_format(@$data->value, 2) }}</div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Body Type:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->bodyType }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Category:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-control">{{ $data->category }}</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Status:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div
                                                        class="form-control {{ strtolower(@$data->status) == 'pending' ? 'text-warning' : (strtolower(@$data->status) == 'rejected' ? 'text-danger' : 'text-success') }}">
                                                        {{ $data->status }}</div>
                                                </div>
                                                @if (auth()->user()->userType == 1 && strtolower(@$x->status) == 'pending')
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-primary me-1 mb-1"
                                                            data-url={{ route('car.update') }} data-status='Approved'
                                                            data-msg='Approve'
                                                            data-id='{{ $data->id }}'>Approve</button>
                                                        <button type="button" class="btn btn-danger me-1 mb-1"
                                                            data-url={{ route('car.update') }} data-status='Rejected'
                                                            data-msg='Reject' data-id='{{ $x->id }}'>Reject</button>
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
    <script src="{{ asset('assets/js/pages/car.js') }}"></script>
@endsection
