<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}">
    <title>República Fácil</title>
{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>--}}
<!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <style type='text/css'>
        body {
            background-image: linear-gradient(0deg, #dededebd, #f8f9fa), url(/images/FotoJet2.png);
            background-repeat: no-repeat;
        }
    </style>
</head>
<body style='background-color: ghostwhite'>
<nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color: rgb(24,25,27,1)">
    <img src="{{ asset('/images/favicon.png') }}" style='width: 30px' class="d-inline-block align-top mr-2" alt="">
    <a class="navbar-brand" href="{{ route('portal.index') }}">RepublicaFácil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link">Painel</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Entrar</a>
                    </li>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Criar conta</a>
                    @endif
                @endauth
            @endif
            {{--<li class="nav-item">--}}
            {{--<a href="{{ route('portal.search') }}" class="nav-link">Procurar</a>--}}
            {{--</li>--}}
            <li class="nav-item">
                <a href="{{ route('portal.advertisement') }}" class="nav-link">Anúncios</a>
            </li>
        </ul>
        {{--<form class="form-inline my-2 my-lg-0">--}}
        {{--@csrf--}}
        {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
        {{--<button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>--}}
        {{--</form>--}}

        <a href="{{route('painel.republic.index')}}" class="btn btn-outline-danger ">Anunciar República</a>
        <i class="fab fa-github text-white fa-2x ml-2"></i>

    </div>
</nav>
<div class='container-fluid p-0'>
    @yield('content')
</div>
<!-- Scripts -->
{{--<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>--}}
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<script> window.Laravel = '{!!json_encode(['csrfToken' => csrf_token()])!!}';</script>
@stack('scripts')
</body>

</html>
