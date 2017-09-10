<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials._head')
</head>

<body class="@yield('body_class')" style="@yield('body_style')">

<!-- Preloader -->
<div class="preloader_active">
    <div class="pm_preloader_load_back">
        <div class="pm_preloader_border"></div>
        <div class="pm_preloader_load_line"></div>
    </div>
</div>

@include('partials._messages')
@include('partials._header')

@yield('content')

@include('partials._footer')
@include('partials._scripts')

</body>

</html>