<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>theHunter.LT @yield('title')</title>
<meta name="keywords" content="thehunter, game, žaidimas, lithuania, lietuva, community, fan page, fanu puslapis @yield('keyword')">
<meta name="description" content="theHunter: Call of the Wild @yield('description')">
<meta name="author" content="theHunter.lt | (vpastuh [a] gmail)">
<meta name="theme-color" content="#ffc500">

<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{  url('img\favicon.ico') }}">

<!-- Apple Touch -->
<link rel="apple-touch-icon" href="{{  url('img\icon48.png') }}">
<link rel="apple-touch-icon" sizes="96x96" href="{{  url('img\icon96.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{  url('img\icon144.png') }}">
<link rel="icon" sizes="192x192" href="{{  url('img\icon192.png') }}">
<meta name="msapplication-square150x150logo" content="{{  url('img\appicon150.png') }}">

<!-- Mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Responsive -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- Scripts -->
<script src="{{  url('js/top.js') }}" type="text/javascript"></script> {{-- Main JQUERY --}}

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@yield('stylesheet')