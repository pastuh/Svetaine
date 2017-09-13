<!-- Virsutinis puslapio meniu -->
<header class="nav-down navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container footer-width">
        <div class="navbar-top-bar">
            <a class="navbar-brand" href="/"><img src="{{ url('img/logo.png') }}" alt="theHunter Lietuva logo"></a>
            @yield('simple-menu')

            {{-- Prireiks tikrinti info
            @if(Auth::check() )
                {{ Auth::user()->name }}
            @endif
            --}}
            {{--
            @if(Auth::check() )
                {{ Auth::user()->roles->first()->description }}
            @endif
             --}}
        </div><!-- navbar-top-bar -->
    </div>
</header>