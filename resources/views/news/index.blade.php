@extends('layouts.main')
@section('title', '| Steam įrašai')

@section('body_class', 'pm_dark_type page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')
    <div class="pm_blog_listing_container pm_columns_2 pm_with_margin">
        <div class="pm_blog_listing blog_isotope">
            @foreach($entries as $item)
                <div class="pm_blog_item"><!-- Item 1 -->
                    <div class="pm_blog_item_wrapper">
                        <div class="pm_blog_featured_image_wrapper">

                            <div class="post-short-intro">
                                <div class="mini-info-block">
                                    <span class="info-time">
                                            <i class="pm_load_more_back fa fa-clock-o fa-lg"></i>
                                        {{ Date::createFromTimestamp($item->date)->format('Y-m-d H:i') }}
                                    </span>

                                    <div class="pm_blog_item_title">
                                        {{ str_limit($item->title, $limit= 80, $end="...") }}
                                    </div>
                                </div>
                                <div class="pm_post_likes_wrapper">
                                    <a class="pm_portfolio_read_more" href="{{ $item->url }}" target='_blank'></a>
                                </div>

                            </div>

                            @php
                                $has_image = preg_match('/(http:\/\/cdn.*?(jpg|png))/', $item->contents, $images);
                            @endphp

                            <div class="pm_blog_item_desc steam_desc">
                            @if(!empty($images[0]))
                                <img src="{{ $images[0] }}" alt="" class="feed-item-image img-responsive steam-image" style="float:left; max-height: 200px; width: auto">
                            @else
                                <img src="{{ asset('/img/news/empty-foto.jpg') }}" alt="" class="feed-item-image img-responsive steam-image" style="float:left; max-height: 200px; width: auto">
                            @endif

                            @php
                                $search = "/(\[img.*img\]|\[list\]|\[\*\])/";
                                $replace = "";
                                $description = preg_replace($search,$replace,$item->contents);
                                $search = "/(\[b\]|\[\/b\])/";
                                $description = preg_replace($search,$replace,$description);

                                /* URL i paprasta href */
                                $find = "/\[url=(.*)\](.*)\[\/url\]/";
                                $description = preg_replace($find,'<a href=\"$1\" target="_blank" style="color: rgb(182, 81, 60);">$2</a>', $description);

                                /* H1 */
                                $find = "/\[h1\](.*)\[\/h1\]/";
                                $description = preg_replace($find,'<b>$1</b>', $description);

                                /* i */
                                $find = "/\[i\](.*)\[\/i\]/";
                                $description = preg_replace($find,'<i>$1</i>', $description);
                                /* remove last [i] */
                                $search = "/(\[i\]|\[\/i\])/";
                                $description = preg_replace($search,$replace,$description);


                                $description = str_replace("https://www.twitch.tv/expansiveworlds","<a href='https://www.twitch.tv/expansiveworlds' title='twitch.tv/expansiveworlds' target='_blank' style='font-weight: bold; color:rgb(182, 81, 60);'>Twitch/ExpansiveWorlds</a> ",$description);
                                $description = str_replace("Twitch channel[www.twitch.tv]","<a href='https://www.twitch.tv/expansiveworlds' title='twitch.tv/expansiveworlds' target='_blank' style='font-weight: bold; color:rgb(182, 81, 60);'>Twitch/ExpansiveWorlds</a> ",$description);
                                $description = str_replace("Twitch[www.twitch.tv]","<a href='https://www.twitch.tv/expansiveworlds' title='twitch.tv/expansiveworlds' target='_blank' style='font-weight: bold; color:rgb(182, 81, 60);'>Twitch/ExpansiveWorlds</a> ",$description);
                                $description = str_replace("theHunter: Call of the Wild","<b>theHunter: Call of the Wild</b>",$description);
                            @endphp

                           {!! str_limit($description, $limit= 333, $end="...") !!}</div>

                        </div>

                    </div>
                </div><!-- blog_item -->
            @endforeach
        </div><!-- blog_listing -->
        <div class="clear"></div>
        {{ $entries->links() }}
    </div><!-- blog_listing_container -->


    <div style="padding-top: 80px;"></div>
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
            <li>
                <a class="pm_load_more" href="javascript:void(0)" aria-label="Daugiau įrašų">
                    <i class="fa fa-history fa-lg"></i>
                </a>
            </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        <a href="{{route('news.index')}}">STEAM įrašai: {{ $news_total }}</a>
    </div>

    <div class="scroller-status">
        <div class="infinite-scroll-request loader-ellips">
            <span class="loader-ellips__dot"></span>
        </div>
        <p class="infinite-scroll-last"></p>
        <p class="infinite-scroll-error">Daugiau puslapių nėra</p>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {

            var $grid = $('.blog_isotope').isotope({
                itemSelector: '.pm_blog_item',
                layoutMode: 'fitRows',
            });

            var iso = $grid.data('isotope');

            $grid.infiniteScroll({
                path: '.pagination__next',
                append: '.pm_blog_item',
                prefill: false,
//                scrollThreshold: 200,
                loadOnScroll: false,
                button: '.pm_load_more',
                outlayer: iso,
                status: '.scroller-status',
                hideNav: '.pagination',
//                history: true,
                debug: true,
                onInit: function() {

                    this.on('request', function () {
                        $allElements = $(".pm_blog_item");
                        $allElements.addClass('checked');
                    });
                }
            });

        });
    </script>

    <script type="text/javascript" src="{{  url('js\infinite.js') }}"></script>
    <script type="text/javascript" src="{{  url('js\isotope.min.js') }}"></script>

    <script>

            $(".pm_load_more").click(function () {

                /* Scroolinti i nauja-pirma elementa kuris neturi checked klases */
                $('.blog_isotope').on( 'append.infiniteScroll', function() {
                    $firstElement = $('.pm_blog_item:not(.checked):first');

                    $('html, body').stop(true).animate({
                     scrollTop: $firstElement.offset().top - 250
                     }, 1000);
                });

            });

    </script>

@endsection