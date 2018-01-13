<!-- Virsutinis puslapio meniu -->
<header class="nav-down navbar navbar-default navbar-fixed-top @yield('header_class')" role="navigation">
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

            @if (Request::is('trophy/*') or Request::is('animals/*') or Request::is('location/*') or Request::is('maps/*'))
                <ul id="menu">
                    <li data-menuanchor="intro" class="active" style="margin-right: 5px;"><a href="#intro"><i class="icon fa fa-file-o fa-lg"></i></a></li>
                    <li data-menuanchor="info"><a href="#info"><i class="icon fa fa-file-text-o fa-lg"></i></a></li>
                </ul>
            @endif
        </div><!-- navbar-top-bar -->
    </div>
</header>