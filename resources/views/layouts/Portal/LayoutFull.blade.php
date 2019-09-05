<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>República Fácil</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="style.css">
    @include('layouts.Portal.HeaderCss')
</head>

<body>
    <section class="content">
        @include('layouts.Portal.Nav')
        @yield('content')
    </section>
    @include('layouts.Portal.Scripsts')
    @stack('scripts')
</body>

    @include('layouts.Portal.Footer')
</html>
