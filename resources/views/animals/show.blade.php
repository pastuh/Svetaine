@extends('layouts.main')
@section('title', '| '. htmlspecialchars($animal->title))

@section('stylesheet')
    <link href="{{  url('js\fullscreen\jquery.fullPage.css') }}" rel="stylesheet" type="text/css" media="all"> {{--Fullscreen veikimas--}}
    <link href="{{  url('css\info.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('content')
    <!--SVG navigacijai -->
    <div class="svg-wrap" style="display: none;">
        <svg width="64" height="64" viewBox="0 0 64 64">
            <path id="arrow-left-1" d="M46.077 55.738c0.858 0.867 0.858 2.266 0 3.133s-2.243 0.867-3.101 0l-25.056-25.302c-0.858-0.867-0.858-2.269 0-3.133l25.056-25.306c0.858-0.867 2.243-0.867 3.101 0s0.858 2.266 0 3.133l-22.848 23.738 22.848 23.738z" />
        </svg>
        <svg width="64" height="64" viewBox="0 0 64 64">
            <path id="arrow-right-1" d="M17.919 55.738c-0.858 0.867-0.858 2.266 0 3.133s2.243 0.867 3.101 0l25.056-25.302c0.858-0.867 0.858-2.269 0-3.133l-25.056-25.306c-0.858-0.867-2.243-0.867-3.101 0s-0.858 2.266 0 3.133l22.848 23.738-22.848 23.738z" />
        </svg>
    </div>

    <div id="fullpage" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="section " id="section0">
            <div class="fp-bg"
                 style='background-image: url("{{ url('../img/animals/' . $animal->main_image) }}"); background-size: cover; background-position: top center; height: 100%'>
                <div class="block__inner">
                    <div class="container">
                        <div class="row">
                            <div class="fix-padding col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="block__header">
                                    <h2 class="heading heading--medium">
                                        {{ $animal->title }}</h2>
                                </div>
                                <div class="block__location">
                                    <p class="block__location-text">Lietuviškai: {{ $animal->lt_title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="fix-padding col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="block__features-text features-text-fix">
                                    {!!  $animal->body !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom-footer-left-menu')
    <nav class="nav-slit">
        @if($next_animal)
            <a class="prev simple-next" href="{{$next_animal->id}}">
                        <span class="icon-wrap"><svg class="icon" width="22" height="22" viewBox="0 0 64 64"><use
                                        xlink:href="#arrow-left-1"></svg></span>
                <div>
                    <h3>{{ str_limit($next_animal->title, $limit= 22, $end="...") }}</h3>
                    <img src="{{ url('img/animals/' . $next_animal->main_image) }}" alt="Next thumb"/>
                </div>
            </a>
        @endif
        @if($previous_animal)
            <a class="next simple-next" href="{{$previous_animal->id}}">
                        <span class="icon-wrap"><svg class="icon" width="22" height="22" viewBox="0 0 64 64"><use
                                        xlink:href="#arrow-right-1"></svg></span>
                <div>
                    <h3>{{ str_limit($previous_animal->title, $limit= 22, $end="...") }}</h3>
                    <img src="{{ url('img/animals/' . $previous_animal->main_image) }}" alt="Next thumb"/>
                </div>
            </a>
        @endif
    </nav>

    <ul class="nav navbar-nav short-menu">
        {{--Jeigu postas nepatvirtintas, Autorius gali redaguoti posta--}}
        @if($animal->published == 0)
            <li>
                <a href="{{ route('animals.show', $animal->id, 'Nepaskelbta') }}" aria-label="Nepaskelbtas įrašas">
                    <i class="fa fa-eye-slash fa-lg">
                    </i>
                </a>
            </li>
            <li>
                <a href="{{ route('animals.edit', $animal->id, 'Edit') }}" aria-label="Redaguoti įrašą">
                    <i class="fa fa-pencil-square fa-lg">
                    </i>
                </a>
            </li>
        @else
            <li>
                <a href="{{ route('trophy.slug', $animal->slug, 'Preview') }}" aria-label="Peržiūrėti įrašą">
                    <i class="fa fa-eye fa-lg">
                    </i>
                </a>
            </li>
        @endif
        {{--Jeigu postas patvirtintas, Useris su spec Role gali redaguoti posta--}}
        @if($animal->published == 1 and Auth::check() and Auth::user()->hasRole('editor|administrator|superadministrator'))
            <li>
                <a href="{{ route('animals.edit', $animal->id, 'Edit') }}" aria-label="Redaguoti įrašą">
                    <i class="fa fa-pencil-square fa-lg">
                    </i>
                </a>
            </li>
        @endif
        @if(Auth::check() and Auth::user()->hasPermission('delete-animals'))
            <li class="post-delete-confirm">
                <a href="javascript:void(0)" aria-label="Naikinti įrašą">
                    <i class="fa fa-trash-o fa-lg"></i>
                </a>
            </li>
            <li id="submit-button" class="hidden">
                <a href="javascript:void(0)" aria-label="Patvirtinu įrašo naikinimą" style="color: #a21515;">
                    <i class="fa fa-trash-o fa-lg"></i>
                </a>
            </li>
        @endif
    </ul>
@endsection

@section('script')
    {{--Fullscreen scroolas--}}
    <script type="text/javascript" src="{{  url('js\fullscreen.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fullpage').fullpage({
                verticalCentered: true,
                navigation: true,
                navigationPosition: 'right',
                scrollingSpeed: 1000,
                scrollOverflow: true,
                autoScrolling: true,
                fitToSection: true
            });
        });
    </script>

    {{--Linku ant arrow blokavimas--}}
    <script>
        [].slice.call( document.querySelectorAll('nav > a span') ).forEach( function(el) {
            el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
        } );
    </script>

    {{--Postams priedai--}}
    <script type="text/javascript" src="{{  url('js\post-addon.js') }}"></script>

    <script type="text/javascript">
        //Confirm post trynima
        $(".post-delete-confirm").click(function () {
            $(this).hide();
            $('#submit-button').removeClass('hidden');
        });
    </script>

@endsection