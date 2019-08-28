<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<link rel="icon" href="/images/favicon.ico">--}}
    <title>Criar Conta</title>
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
<form method="POST" action="{{ route('register') }}" style='width: 310px'>
    @csrf
    <a href="{{ route('portal.index')}}">
        <img src="/images/logoRF.png" alt="" width="240">
    </a>
    <div class="form-group my-1">
        {{--<label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>--}}
        <input placeholder='Digite seu nome' id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>
    <div class="form-group my-1">
        {{--<label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
        <input placeholder='Seu e-mail' id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group my-1">
        {{--<label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>--}}
        <input placeholder='Digite uma senha' id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
        @endif
    </div>
    <div class="form-group my-1">
        {{--<label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}
        <div class="">
            <input placeholder='Confirme sua senha' id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>
    <div class="form-group mt-2 mb-0">
        <button type="submit" class="btn btn-lg btn-danger btn-block">
            {{ __('Register') }}
        </button>
    </div>
    <a class="text-danger float-left mt-2" href='{{route('login')}}'>
        {{ __('Login') }}
    </a>
</form>
</body>
