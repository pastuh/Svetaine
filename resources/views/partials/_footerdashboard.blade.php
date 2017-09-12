<!-- Apatinis puslapio meniu -->
<div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    {{--Kaires mygtukai--}}
    @yield('bottom-footer-left-menu')
    <div class="container footer-width">
        <div class="navbar-header">
            <div class="pm_slides_title_and_likes_container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--Pavadinimai puslapiu--}}
                @yield('bottom-footer-info')
            </div>
        </div><!-- navbar-header -->

        <div class="navbar-collapse collapse">
                <!-- Gal panaudosiu -->
                {{--
                    <ul class="nav navbar-nav">
                        <li><a href="/animals"><i class="icon fa fa-paw fa-lg"></i></a></li>
                        <li><a href="/reserves"><i class="icon fa fa-tree fa-lg"></i></a></li>
                    </ul>
                 --}}

            <!-- Desines mygtukai -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Gryzti i Dashboard -->
                @if(Auth::check())
                    <li><a href="{{ route('manage.dashboard') }}"><i class="icon fa fa-tachometer fa-lg"></i></a></li>
                @endif
                <!-- Useriu kurimas -->
                @if(Auth::check() and Auth::user()->hasRole('superadministrator|administrator'))
                    <li><a href="{{ route('users.index') }}"><i class="icon fa fa-users fa-lg"></i></a></li>
                @endif
                <!-- Teisiu ir leidimu kurimas -->
                @if(Auth::check() and Auth::user()->hasRole('superadministrator'))
                    <li><a href="{{ route('permissions.index') }}"><i class="icon fa fa-id-card-o fa-lg"></i></a></li>
                @endif
                <!-- Kategoriju ir tagu perziura + kurimas -->
                <li><a href="{{ route('categories.index') }}"><i class="icon fa fa-sitemap fa-lg"></i></a></li>
                <li><a href="{{ route('tags.index') }}"><i class="icon fa fa-tags fa-lg"></i></a></li>
                <!-- Prisijungti jeigu neprisijunges -->
                @if(!Auth::check())
                    <li><a href="{{ route('login') }}"><i class="icon fa fa-user-circle-o fa-lg"></i></a></li>
                @endif

            </ul>
        </div><!-- nav-collapse -->
    </div><!-- container -->
</div>