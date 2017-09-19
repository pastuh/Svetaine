@extends('layouts.main')
@section('title', '| Twitch video')

@section('header_class', 'fixed_header')
@section('body_class', 'pm_dark_type page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')

    {{-- Modulis perziureti video --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <div class="main-video"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close-module" type="button" class="btn btn-default menu-simple-text"
                            data-dismiss="modal">
                        <i class="fa fa-window-close fa-lg">
                            <span class="menu-simple-text">UŽDARYTI
                            </span>
                        </i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="pm_blog_listing_container pm_columns_4 pm_with_margin">
        <br>
        <div class="pm_blog_listing blog_isotope">
            @if(!$EmptyVideo)
                @foreach($VisibleVideos as $TwitchVideo)
                    <div class="pm_blog_item"><!-- Item 1 -->
                        <div class="pm_blog_item_wrapper">
                            <div class="pm_blog_featured_image_wrapper">
                                <img src="{{ $TwitchVideo['preview']['large'] }}" alt="">
                                <div class="pm_post_likes_wrapper">
                                    {{--<a class="pm_potrfolio_watch" href="javascript:void(0)"></a>--}}
                                    <a id="twitch-new" class="pm_potrfolio_watch" style="cursor:pointer;"
                                       data-toggle="modal" data-target="#myModal"
                                       data-video="http://player.twitch.tv/?autoplay=false&channel={{ $TwitchVideo['channel']['display_name'] }}">
                                    </a>
                                    <div class="clear"></div>
                                </div>
                                <div class="post-short-intro"
                                     style="float:left; margin-top: -40px; position: relative;">
                                <span class="info-tiny">
                                   <a href="{{ $TwitchVideo['channel']['url'] }}"
                                      target="_blank">{{ $TwitchVideo['channel']['display_name'] }}</a>
                                </span>

                                    <span class="info-tiny">
                                    <i class="pm_load_more_back fa fa-twitch fa-lg"></i> {{ $TwitchVideo['viewers'] }}
                                </span>
                                </div>
                            </div>
                            <div class="pm_blog_post_title">
                                {{ str_limit($TwitchVideo['channel']['status'], $limit= 42, $end="...") }}
                            </div>
                        </div>
                    </div><!-- blog_item -->
                @endforeach
            @endif
        </div><!-- blog_listing -->
        <div class="clear"></div>
    </div><!-- blog_listing_container -->
    <div style="padding-top: 80px;"></div>
@endsection

@if($EmptyVideo)
    @section('bottom-footer-info')
        <div class="pm_slide_title_wrapper pm_simple_title">
            Šiuo metu niekas nestreamina
        </div>
    @endsection
@endif

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        @if(!$EmptyVideo)
            @if(count($HiddenVideos) > 1)
                <li>
                    <a class="pm_load_more" href="javascript:void(0)" aria-label="Daugiau įrašų">
                        <i class="pm_load_more_back fa fa-history fa-lg"></i>
                    </a>
                </li>
            @endif
        @endif
    </ul>
@endsection

@section('script')

    {{--Kad pridetu history list--}}
    @include('components._video-list')

    {{--Kad veiktu MAIN list--}}
    <script type="text/javascript" src="{{  url('js\template.js') }}"></script>

    {{--Laiko konvertavimas--}}
    @include('components._time')

    <script type="text/javascript">
        $(document).on('click', '#twitch-new', function () {
            var linkas = $(this).attr('data-video');

            video = '<iframe class="embed-responsive-item main-video" src="' + linkas + '" height="auto" width="100%" frameborder="0" scrolling="no" allowfullscreen="true"></iframe>';

            setTimeout( function(){
            $('.main-video').replaceWith(video);
            }, 500);
        });
        $(document).on('click', '#close-module', function () {
            closeVideo = '<iframe class="embed-responsive-item main-video "></iframe>';
            $('.main-video').replaceWith(closeVideo);
        });

    </script>
@endsection