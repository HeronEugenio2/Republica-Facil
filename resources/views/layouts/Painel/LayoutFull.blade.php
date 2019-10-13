<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}">
        {{--<link rel="icon" type="image/png"
              href="https://static.wixstatic.com/media/e9f391_b594819e778c4c5090a0c162b905fa0f.jpg">--}}
    <title>República Fácil</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/argon.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('/css/style.css') }}">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    {{--<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">--}}
    {{--    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">--}}
    {{--    <link href="toastr.css" rel="stylesheet"/>--}}
    <link rel="stylesheet" href="{{asset('css/imgAreaSelect.css')}}">
    <script type="text/javascript" src="/public/js/scripts/imgselect.js"></script>
    @stack('css')
    <style>
        .card-body {
            /*border: ridge;*/
            /*border-color: #a9a9a952;*/
            /*border-top: none;*/
        }
    </style>
</head>
<body class="vsc-initialized">
@include('layouts.Painel.Menu')
<div class='main-content'>
    <nav class="mb-4 navbar navbar-top navbar-expand-md p-md-3 p-1 bg-nav" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            {{--<a class="h4 mb-0 text-white d-none d-lg-inline-block" href="{{ route('home') }}">Painel</a>--}}
            {{--<a class="nav-link text-white" href="{{ route('index') }}">Portal</a>--}}
            <a class="nav-link text-white" href="{{ route('portal.index') }}">Portal</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell text-white"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                             aria-labelledby="navbar-default_dropdown_1">
                        </div>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" data-toggle='dropdown' role="button" aria-expanded='false' style='position: relative; padding-left: 50px;'>
                                <img src='{{asset(auth()->user()->image)}}' style='width: 32px; height: 32px; position: absolute; top: -2px; left: 10px; border-radius: 50%'>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"
                                 aria-labelledby="navbarDropdown">
                                <a href="{{route('painel.user.show', \Vinkla\Hashids\Facades\Hashids::encode(auth()->user()->id))}}" class="dropdown-item">Meu Perfil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fa fa-lock bg-white"></i>{{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    {{--<ol class="breadcrumb">--}}
    {{--<li class="breadcrumb-item">--}}
    {{--<a href="">Painel</a>--}}
    {{--</li>--}}
    {{--@yield('breadcrumb')--}}
    {{--</ol>--}}
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
@include('sweetalert::alert')

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>--}}
<script> window.Laravel = '{!!json_encode(['csrfToken' => csrf_token()])!!}';</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>--}}
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script src="toastr.js"></script>
{{--{!! Toastr::render() !!}--}}
@stack('scripts')
</body>
</html>
