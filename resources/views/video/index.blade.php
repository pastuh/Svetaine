@extends('layouts.main')
@section('title', '| Twitch video')
@section('description', '| Tiesioginės Twitch video transliacijos tavo ekrane. Surask norimą streamerį be didelio vargo. ExpansiveWorlds streamas iškart paryškintas.')

@section('body_class', ' page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

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

    <div class="main_data_listing_container main_columns_4 main_with_margin">
        <div class="main_data_listing data_isotope">
            @if(!$EmptyVideo)
                @foreach($entries as $TwitchVideo)
                    <div class="main_data_item"><!-- Item 1 -->
                        <div class="main_data_item_wrapper">
                            <div class="main_data_featured_image_wrapper">
                                <div class="post-short-intro" >
                                    <div class="mini-info-block">
                                        <div class="{{ ($TwitchVideo['channel']['display_name'] == 'expansiveworlds' OR
                                preg_match('/\[LT\]/', $TwitchVideo['channel']['status'])) ? 'post_published' : '' }}"></div>
                                        <span class="info-time">
                                            <i class="main_load_more_back fa fa-twitch fa-lg"></i> {{ $TwitchVideo['viewers'] }}
                                        </span>

                                        <div class="main_data_item_title">
                                            {{ $TwitchVideo['channel']['display_name'] }}
                                        </div>
                                    </div>
                                    <div class="main_post_likes_wrapper">
                                        <a id="twitch-new" class="main_portfolio_watch" style="cursor:pointer;"
                                           data-toggle="modal" data-target="#myModal"
                                           data-video="https://player.twitch.tv/?autoplay=false&channel={{ $TwitchVideo['channel']['display_name'] }}">
                                        </a>
                                        <div class="clear"></div>
                                    </div>

                                </div>
                                <img src="{{ $TwitchVideo['preview']['large'] }}" alt="" style="float:left;">
                                <div class="clearfix"></div>
                                <div class="main_data_item_desc">{{ str_limit($TwitchVideo['channel']['status'], $limit= 37, $end="...") }}</div>
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

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title title-main">
        <div class="simple-title">
            Twitch video: {{ $count_total }}
        </div>
    </div>

    <div class="main_slide_title_wrapper main_simple_title pagination-main">
        <div class="simple-pagination">
            {{ $entries->links() }}
        </div>
    </div>
@endsection

@section('script')

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

    {{--Scroll title/pagination--}}
    @include('components._title_pagination')
@endsection