@extends('layouts.master')
@section('sub_title')
    Dashboard
@endsection
@section('styled')
    @include('layouts.partials.styled')
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
@endsection
@section('sidebar')
    @include('layouts.partials.sidebar')
@endsection
@section('heading')
    Dashboard
@endsection
@section('contents')
    @if (auth()->user()->userType == 1)
        @include('home.admin')
    @else
        @include('home.user')
    @endif
@endsection
@section('scripts')
    @include('layouts.partials.scripts')
    @if (auth()->user()->userType == 1)
        <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    @else
        <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/extensions/validator/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/extensions/validator/additional-methods.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/profile.js') }}"></script>
    @endif
@endsection
