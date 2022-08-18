@extends('layouts.master')
@section('sub_title')
    Car Insurance
@endsection
@section('styled')
    @include('layouts.partials.styled')
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
@endsection
@section('sidebar')
    @include('layouts.partials.sidebar',['active'=>'cars','target'=>'add'])
@endsection
@section('heading')
    Car Insurance
@endsection
@section('contents')
    <section>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Car Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('car.save') }}" id="form-add-car"
                                method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Regisgration No:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" required name="plateNo" class="form-control"
                                                        value="" placeholder="Car Registration number">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>chasis Number:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" required name="chasisNo" class="form-control"
                                                        value="" placeholder="Chasis number">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Car Make:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-control" required name="make">
                                                        <option value="">Choose..</option>
                                                        @foreach (@$carMake as $x)
                                                            <option value="{{ @$x }}">{{ @$x }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Car Model:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" required name="model" class="form-control"
                                                        value="" placeholder="Car Model">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Engine No:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" required name="engineNo" class="form-control"
                                                        value="" placeholder="Engine Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Mileage:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" required class="form-control" name="mileage"
                                                        value="" placeholder="Mileage">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Color:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-control" required name="color">
                                                        <option value="">Choose..</option>
                                                        @foreach (['White', 'Black', 'Gray', 'Silver', 'Red', 'Blue', 'Brown', 'Green', 'Orange', 'Gold', 'Yellow', 'Purple'] as $x)
                                                            <option value="{{ @$x }}">{{ @$x }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Car Value:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" min="10" required class="form-control"
                                                        name="value" value="" placeholder="Car Value">
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Body Type:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-control" required name="bodyType">
                                                        <option value="">Choose..</option>
                                                        @foreach (@$bodyType as $x)
                                                            <option value="{{ @$x }}">{{ @$x }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Category:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-control" required name="category">
                                                        <option value="">Choose..</option>
                                                        @foreach (['Private', 'Commercial', 'Government'] as $x)
                                                            <option value="{{ @$x }}">{{ @$x }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    <script src="{{ asset('assets/extensions/validator/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/validator/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/car.js') }}"></script>
@endsection
