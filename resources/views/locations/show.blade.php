@extends('layouts.main')
@section('title', '| '. htmlspecialchars($map->title))

@section('header_class', 'fixed_header')

@section('stylesheet')
    <link href="{{  url('js\fullscreen\jquery.fullPage.css') }}" rel="stylesheet" type="text/css"
          media="all"> {{--Fullscreen veikimas--}}
    <link href="{{  url('css\info.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('content')
    <!--SVG navigacijai -->
    <div class="svg-wrap" style="display: none;">
        <svg width="64" height="64" viewBox="0 0 64 64">
            <path id="arrow-left-1"
                  d="M46.077 55.738c0.858 0.867 0.858 2.266 0 3.133s-2.243 0.867-3.101 0l-25.056-25.302c-0.858-0.867-0.858-2.269 0-3.133l25.056-25.306c0.858-0.867 2.243-0.867 3.101 0s0.858 2.266 0 3.133l-22.848 23.738 22.848 23.738z"/>
        </svg>
        <svg width="64" height="64" viewBox="0 0 64 64">
            <path id="arrow-right-1"
                  d="M17.919 55.738c-0.858 0.867-0.858 2.266 0 3.133s2.243 0.867 3.101 0l25.056-25.302c0.858-0.867 0.858-2.269 0-3.133l-25.056-25.306c-0.858-0.867-2.243-0.867-3.101 0s-0.858 2.266 0 3.133l22.848 23.738-22.848 23.738z"/>
        </svg>
    </div>

    <div id="fullpage" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="section " id="section0">
            <div class="fp-bg"
                 style='background-image: url("{{ url('../img/maps/' . $map->main_image) }}"); background-size: cover; background-position: top center; height: 100%'>
                <div class="block__inner">
                    <div class="container trophy-title-block" style="display:none;">
                        <div class="row">
                            <div class="fix-padding col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                                <div class="block__header">
                                    <h2 class="heading heading--medium">
                                        {{ $map->title }}</h2>
                                </div>

                                <div class="block__location">
                                    <p class="block__location-text">{{ $map->sub_title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="section1">
            <div class="fp-bg"
                 style='background-image: url("{{ url('../img/maps/' . $map->info_image) }}"); background-size: cover; background-position: top center; height: 100%; display: flex; justify-content: center; align-items: center;'>
                <div {{--id="post-page{{ $post->id }}"--}} class="main_wrapper main_container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                                    <div class="main_content_standard">

                                        {{--Body startas--}}
                                        <div class="block__features-text features-text-fix">
                                            {!! $map->body !!}
                                        </div>
                                        <br>
                                        <div class="block__features-text features-text-fix">
                                            {!! $map->body_2 !!}
                                        </div>

                                        <div class="fix-space-bottom"></div>

                                    </div>
                                </div> <!-- col -->
                            </div><!-- info row -->
                        </div><!-- col12 -->
                    </div><!-- row -->
                </div><!-- wrapper -->
            </div>
        </div>
    </div>
@endsection

@section('bottom-footer-left-menu')
    <nav class="nav-slit">
        @if($next_map)
            <a class="prev simple-next" href="{{$next_map->slug}}">
                        <span class="icon-wrap"><svg class="icon" width="22" height="22" viewBox="0 0 64 64"><use
                                        xlink:href="#arrow-left-1"></svg></span>
                <div>
                    <h3>{{ str_limit($next_map->title, $limit= 22, $end="...") }}</h3>
                    <img src="{{ url('img/maps/' . $next_map->main_image) }}" alt="Next thumb"/>
                </div>
            </a>
        @endif
        @if($previous_map)
            <a class="next simple-next" href="{{$previous_map->slug}}">
                        <span class="icon-wrap"><svg class="icon" width="22" height="22" viewBox="0 0 64 64"><use
                                        xlink:href="#arrow-right-1"></svg></span>
                <div>
                    <h3>{{ str_limit($previous_map->title, $limit= 22, $end="...") }}</h3>
                    <img src="{{ url('img/maps/' . $previous_map->main_image) }}" alt="Next thumb"/>
                </div>
            </a>
        @endif
    </nav>

    <ul class="nav navbar-nav short-menu">
        <li class="trophy-info">
            <a href="javascript:void(0)" aria-label="Trofėjaus intro">
                <i class="fa fa-info-circle fa-lg">
                </i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        {{ $map->title }}
    </div>
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

    {{--Postams priedai--}}
    <script type="text/javascript" src="{{  url('js\post-addon.js') }}"></script>

    <script>

        $(".trophy-info").click(function () {
            $(".trophy-title-block:not(.still)").slideToggle("slow", function () {
                $(".main_simple_title").slideToggle("slow", function () {

                });
            });
        });

    </script>
@endsection