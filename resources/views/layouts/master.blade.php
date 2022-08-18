<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Insurance Registrations') }} | @yield ('sub_title')</title>
    @yield('styled')
</head>

<body>
    <div id="app">
        @yield('sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3> @yield('heading')</h3>
                            <p class="text-subtitle text-muted">@yield('subheading')</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            @isset($nav)
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        @foreach ($nav as $x)
                                            @if ($x['active'] == 1)
                                                <li class="breadcrumb-item active" aria-current="page">{{ $x['name'] }}
                                                </li>
                                            @else
                                                <li class="breadcrumb-item"><a
                                                        href="{{ $x['url'] }}">{{ $x['name'] }}</a></li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </nav>
                            @endisset

                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content">
                @yield('contents')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p> &copy; {{ date('Y') }}</p>
                    </div>
                    <div class="float-end">
                        <p>Design by <a href="#">Name</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        var config = {
            clients: {
                token: "{{ Session::token() }}",
            }
        };
    </script>
    @yield('scripts')
</body>

</html>
