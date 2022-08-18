@extends('layouts.auth')
@section('sub_title')
    Register
@endsection
@section('styled')
    @include('layouts.partials.styled')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
@endsection
@section('body')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="">
                        <img src="assets/images/logo/logo.svg" alt="Logo">
                    </a>
                </div>
                <h1 class="auth-title">Sign Up</h1>
                <form action="{{ route('register.save') }}" id="form-register" method="POST">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" required name="fullname" class="form-control form-control-xl"
                            placeholder="Fullname (Surname first)">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" required name="email" class="form-control form-control-xl" placeholder="Email">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" id="password" required class="form-control form-control-xl" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" required name="confirmPassword" class="form-control form-control-xl" placeholder="Confirm Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Sign Up</button>
                </form>
                <div class="text-center mt-2 text-lg fs-4">
                    <p class='text-gray-600'>Already have an account? <a href="{{ route('login.show') }}" class="font-bold">Log in</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('layouts.partials.scripts')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/validator/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/validator/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/auth.js') }}"></script>
@endsection
