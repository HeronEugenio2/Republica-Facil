<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'/>
    <link rel='stylesheet' href='{{asset('css/styleRegister.css')}}'/>
    <title>Republica Fácil</title>
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}">
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form method='POST' action='{{route('register')}}'>
            @csrf
            <h1>Criar conta</h1>
            <input id='name' class='form-control{{$errors->has('name')?'is-invalid':''}}' name='name-register' value='{{old('name')}}' required autofocus type="text" placeholder="Nome"/>
            @if($errors->has('name'))
                <span class='invalid-feedback' role='alert'>
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
            <input type="email" placeholder="Email" id='email' class='form-control{{$errors->has('name')?'is-invalid':''}}' autofocus name='email-register' value='{{old('email')}}' required/>
            @if($errors->has('email'))
                <span class='invalid-feedback' role='alert'>
                    <strong>{{$errors->first('email')}}</strong>
                </span>
            @endif
            <input type="password" placeholder="Senha" autofocus id='password' class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password-register" required/>
            @if($errors->has('password'))
                <span class='invalid-feedback' role='alert'>
                    <strong>{{$errors->first('password')}}</strong>
                </span>
            @endif
            <input placeholder='Confirme sua senha' id="password-confirm" autofocus type="password" class="form-control" name="password_confirmation" required>
            <button type='submit'>Inscrever-se</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form method="POST" class="form-signin" action="{{ route('login') }}">
            @csrf
            <h1>Login</h1>
            <input type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus/>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input type="password" placeholder="Senha" class="mt-1 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" requireds/>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Lembrar de min
            </label>--}}
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
            @endif
            <button>Entrar</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Já tem uma conta?</h1>
                <p>Para se manter conectado, faça o login com suas informações pessoais</p>
                <button class="ghost" id="signIn">Entrar</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Não possui uma conta?</h1>
                <p>Entre com seus dados pessoais e comece sua jornada</p>
                <button class="ghost" id="signUp">Inscrever-se</button>
            </div>
        </div>
    </div>
</div>
<footer>
</footer>
<script src='{{asset('js/registerMain.js')}}'></script>
</body>
</html>
