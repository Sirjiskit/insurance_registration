<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Insurance Registrations') }} | @yield ('sub_title')</title>
    @yield('styled')
</head>

<body>
    <div id="auth">
        @yield('body')
    </div>
    @yield('scripts')
</body>

</html>
