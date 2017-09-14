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
            <!-- Desines mygtukai -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/blog"><i class="icon fa fa-list-ul fa-lg"></i></a></li>
                <li><a href="/video" style="color:#4f4f4f;"><i class="icon fa fa-desktop fa-lg"></i></a></li>
                <li><a href="/trophies" style="color:#4f4f4f;"><i class="icon fa fa-paw fa-lg"></i></a></li>
                <li><a href="/reserves" style="color:#4f4f4f;"><i class="icon fa fa-tree fa-lg"></i></a></li>
                <li><a href="{{ Auth::check() ? '/profile' : '/login' }}"><i class="icon fa fa-user-circle-o fa-lg"></i></a></li>
            </ul>
        </div><!-- nav-collapse -->
    </div><!-- container -->
</div>