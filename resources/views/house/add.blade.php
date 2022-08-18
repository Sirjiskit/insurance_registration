@extends('layouts.master')
@section('sub_title')
    Home Insurance
@endsection
@section('styled')
    @include('layouts.partials.styled')
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
@endsection
@section('sidebar')
    @include('layouts.partials.sidebar', ['active' => 'house', 'target' => 'add'])
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
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('home.save') }}" id="form-add-home"
                                method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Number of Bedrooms:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" min="0" required name="bedRooms"
                                                        class="form-control" value="" placeholder="ex: 3">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Number of Baths:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" min="0" required name="baths"
                                                        class="form-control" value="" placeholder="ex: 4">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Pool?:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-control" required name="pool">
                                                        <option value="">Choose..</option>
                                                        @foreach (['Yes', 'No'] as $x)
                                                            <option value="{{ @$x }}">{{ @$x }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Is the yard Fenced?:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-control" required name="fenced">
                                                        <option value="">Choose..</option>
                                                        @foreach (['Yes', 'No'] as $x)
                                                            <option value="{{ @$x }}">{{ @$x }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Roof Type:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-control" required name="roofType">
                                                        <option value="">Choose..</option>
                                                        @foreach (['Shingle', 'Tile','Cement','Metal'] as $x)
                                                            <option value="{{ @$x }}">{{ @$x }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Age of Roof:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" min="0" required name="roofage" class="form-control"
                                                        value="" placeholder="ex: 3">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Garage (# of Cars):</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" min="0" required name="garage" class="form-control"
                                                        value="" placeholder="ex: 3 | Enter 0 if no Garage...">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Floor types:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" required class="form-control" name="floorType"
                                                        value="" placeholder="ex: Tile/Carpet/Laminate">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Year Built:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" min="1960" required class="form-control"
                                                        name="year" value="" placeholder="ex: 2017">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Building value:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" min="10" required class="form-control"
                                                        name="value" value="" placeholder="ex: 15000000">
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
    <script src="{{ asset('assets/js/pages/home.js') }}"></script>
@endsection
