<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<link rel="icon" href="/images/favicon.ico">--}}
    <title>Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}">
</head>
<style>
    body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
</style>
<body class="text-center" style='background-color: #F5F5F5'>
<form method="POST" class="form-signin" action="{{ route('login') }}">
    @csrf
    <a href="{{ route('portal.index')}}">
        <img class="mb-3" src="/images/logoRF.png" alt="" width="240">
    </a>
    {{--<img class="mb-3" src="/images/favicon.png" alt="" width="84">--}}
    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    <input id="password" type="password" class="mt-1 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
    <div class="form-check my-2">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>
    <button class="btn btn-lg btn-danger btn-block" type="submit">Entrar</button>
    <div class='row'>
        <div class='col-5'>
            <a class="btn btn-link text-danger" href='{{route('register')}}'>
                {{ __('Criar Conta') }}
            </a>
        </div>
        <div class='col-7'>
            @if (Route::has('password.request'))
                <a class="btn btn-link text-danger" href="{{ route('password.request') }}">
                    {{ __('Esqueceu a senha?') }}
                </a>
            @endif
        </div>
    </div>
    {{--<div class='form-group'>--}}
    {{--<div class='col-md-6 col-md-offset-4'>--}}
    {{--<a href='{{url('/login/facebook')}}' class='btn btn-facebook'><i class='fa fa-facebook'></i>Facebook--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
</form>
</body>
