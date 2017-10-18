<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108229868-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-108229868-1');
    </script>

    @include('partials._head')
</head>

{{-- Galimybe priskirti stiliu kiekvienam puslapiui atskirai --}}
<body class="@yield('body_class')" style="@yield('body_style')">

<!-- Loading screen'as
<div class="preloader_active">
    <div class="main_preloader_load_back">
        <div class="main_preloader_border"></div>
        <div class="main_preloader_load_line"></div>
    </div>
</div>
 -->

{{-- Alert zinutes --}}
@include('partials._messages')
{{-- Virsutinis meniu --}}
@include('partials._header')

@yield('content')

{{-- Apatinis Dashboard meniu --}}
@include('partials._footerdashboard')
@include('partials._scripts')

</body>

</html>