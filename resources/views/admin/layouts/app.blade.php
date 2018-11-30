<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }} - Admin</title>

    <!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/admin/app.css') }}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a href="{{ url('/admin') }}" class="navbar-brand col-sm-3 col-md-2 mr-0">
            <i data-feather="target"></i>
            <strong>{{ config('app.name', 'BidMe') }}</strong>
        </a>
        {{--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
        <ul class="navbar-nav px-3 flex-md-row">
            <li class="nav-item text-nowrap px-md-2"><a class="nav-link" href="{{ url('/') }}">Goto Frontend</a></li>
            <li class="nav-item text-nowrap px-md-2">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('form_logout').submit();">Sign out</a>
                <form id="form_logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                @include('admin.partials.sidebar')
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3">
                @yield('content')
            </main>

        </div>
    </div>
</div>
<script src="{{ mix('js/admin/app.js') }}"></script>
@yield('before_body_ends')
</body>
</html>
