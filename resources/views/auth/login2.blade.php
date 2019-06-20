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
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<link rel="icon" href="/images/favicon.ico">--}}

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
</head>

<body class="text-center" style='background-color: #F5F5F5'>
<form class="form-signin">
    <img class="mb-1" src="/images/favicon.png" alt="" width="85">
    <h3>República Fácil</h3>
    <h1 class="h3 mb-3 font-weight-normal"></h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control " placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control " placeholder="Password" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-danger btn-block" type="submit">Entrar</button>
    <button class="btn btn-lg btn-light btn-sm btn-block" type="submit">Registrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>
