<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>theHunter.LT @yield('title')</title>
<meta name="keywords" content="thehunter, game, žaidimas, lithuania, lietuva, community, fan page, fanu puslapis">
<meta name="description" content="theHunter.lt lietuviškas fanų puslapis">
<meta name="author" content="theHunter.lt">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{  url('img\favicon.ico') }}">

<!-- Apple Touch -->
<link rel="apple-touch-icon" href="{{  url('img\apple57.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{  url('img\apple72.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{  url('img\apple114.png') }}">

<!-- Mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Responsive -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- Scripts -->
<script src="{{  url('js/top.js') }}" type="text/javascript"></script> {{-- Main JQUERY --}}

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@yield('stylesheet')