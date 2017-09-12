<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials._head')
</head>

{{-- Galimybe priskirti stiliu kiekvienam puslapiui atskirai --}}
<body class="@yield('body_class')" style="@yield('body_style')">

<!-- Loading screen'as
<div class="preloader_active">
    <div class="pm_preloader_load_back">
        <div class="pm_preloader_border"></div>
        <div class="pm_preloader_load_line"></div>
    </div>
</div>
 -->

{{-- Alert zinutes --}}
@include('partials._messages')
{{-- Virsutinis meniu --}}
@include('partials._header')

@yield('content')

{{-- Apatinis meniu --}}
@include('partials._footer')
@include('partials._scripts')

</body>

</html>