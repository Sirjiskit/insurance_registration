@php
$state = ['Abia', 'Adamawa', 'Akwa Ibom', 'Anambra', 'Bauchi', 'Bayelsa', 'Benue', 'Borno', 'Cross River', 'Delta', 'Ebonyi', 'Edo', 'Ekiti', 'Enugu', 'FCT - Abuja', 'Gombe', 'Imo', 'Jigawa', 'Kaduna', 'Kano', 'Katsina', 'Kebbi', 'Kogi', 'Kwara', 'Lagos', 'Nasarawa', 'Niger', 'Ogun', 'Ondo', 'Osun', 'Oyo', 'Plateau', 'Rivers', 'Sokoto', 'Taraba', 'Yobe', 'Zamfara'];
@endphp
@extends('layouts.master')
@section('sub_title')
    Business Insurance
@endsection
@section('styled')
    @include('layouts.partials.styled')
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
@endsection
@section('sidebar')
    @include('layouts.partials.sidebar', ['active' => 'business', 'target' => 'add'])
@endsection
@section('heading')
    Business Insurance
@endsection
@section('contents')
    <section>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Business Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('business.save') }}" id="form-add-business"
                                method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Business Name:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" required name="name"
                                                        class="form-control" value=""
                                                        placeholder="ex: Peace Trans LTD">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Descriptions:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea name="description" required class="form-control" placeholder="Description"></textarea>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Business Address:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea name="businessAddress" required class="form-control" placeholder="Business Address"></textarea>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>State</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-control" required name="businessState">
                                                        <option value="">Choose..</option>
                                                        @foreach (@$state as $x)
                                                            <option value="{{ @$x }}">{{ @$x }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>City</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" name="businessCity" required class="form-control"
                                                        placeholder="City">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Services:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea name="services" required class="form-control" placeholder="Business services"></textarea>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Estimated Yearly Payroll:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" min="10" required class="form-control"
                                                        name="payroll" value="" placeholder="ex: 15000000">
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
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
    <script src="{{ asset('assets/js/pages/business.js') }}"></script>
@endsection
