<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<link rel="icon" href="/images/favicon.ico">--}}
    <title>Alterar Senha</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <a href="{{ route('portal.index')}}">
        <img class="mb-3" src="/images/logoRF.png" alt="" width="240">
    </a>
    <div class="form-group ">
        <label for="email" class="">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
               value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
        @endif
    </div>
    <div class="">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="form-group mb-1">
        <button type="submit" class="btn btn-danger">
            {{ __('Enviar o link de redefinição de senha') }}
        </button>
    </div>
    <a class="text-danger float-left" href='{{route('login')}}'>
        {{ __('Login') }}
    </a>
</form>
</body>
