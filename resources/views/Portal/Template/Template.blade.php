<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>Generic Page - Industrious by TEMPLATED</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link rel="stylesheet" href="templated-industrious/assets/css/main.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"/>
</head>
<body>
<!-- Header -->
@include('Portal.Template.Navbar')
<!-- Nav -->
@include('Portal.Template.Menu')
@yield('content')
<!-- Footer -->
@include('Portal.Template.Footer')
<!-- Scripts -->
<script src="templated-industrious/assets/js/jquery.min.js"></script>
<script src="templated-industrious/assets/js/browser.min.js"></script>
<script src="templated-industrious/assets/js/breakpoints.min.js"></script>
<script src="templated-industrious/assets/js/util.js"></script>
<script src="templated-industrious/assets/js/main.js"></script>
</body>
</html>
