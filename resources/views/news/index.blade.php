@extends('layouts.main')
@section('title', '| Steam įrašai')

@section('header_class', 'fixed_header')
@section('body_class', 'pm_dark_type page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')
    <div class="pm_blog_listing_container pm_columns_2 pm_with_margin">
        <br>
        <div class="pm_blog_listing blog_isotope">
            @foreach($VisibleNews as $news)
                <div class="pm_blog_item"><!-- Item 1 -->
                    <div class="pm_blog_item_wrapper">
                        <div class="pm_blog_featured_image_wrapper">

                            <div class="post-short-intro">

                                <span class="info-time">
                                        <i class="pm_load_more_back fa fa-clock-o fa-lg"></i>
                                    {{ Date::createFromTimestamp($news->date)->format('Y-m-d H:i') }}
                                </span>

                                <div class="pm_blog_item_title">
                                    {{ str_limit($news->title, $limit= 80, $end="...") }}
                                </div>

                                <div class="pm_post_likes_wrapper">
                                    <a class="pm_portfolio_read_more" href="{{ $news->url }}" target='_blank'></a>
                                </div>

                            </div>

                            @php
                                $has_image = preg_match('/(http:\/\/cdn.*?(jpg|png))/', $news->contents, $images);
                            @endphp

                            <div class="pm_blog_item_desc steam_desc">
                            @if(!empty($images[0]))
                                <img src="{{ $images[0] }}" alt="" class="feed-item-image img-responsive steam-image" style="float:left; max-height: 200px; width: auto">
                            @else
                                <img src="{{ asset('/img/news/empty-foto.jpg') }}" alt="" class="feed-item-image img-responsive steam-image" style="float:left; max-height: 200px; width: auto">
                            @endif

                            {{--<div class="clearfix"></div>--}}

                            @php
                                $search = "/(\[img.*img\])/";
                                $replace = "";
                                $description = preg_replace($search,$replace,$news->contents);
                                $search = "/(\[b\]|\[\/b\])/";
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
    </div><!-- blog_listing_container -->
    <div style="padding-top: 80px;"></div>
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        {{--Rodomas mygtukas LOAD MORE jeigu yra virs 4 postu--}}
        @if(count($HiddenNews) >= 1)
            <li>
                <a class="pm_load_more" href="javascript:void(0)" aria-label="Daugiau įrašų">
                    <i class="fa fa-history fa-lg"></i>
                </a>
            </li>
        @endif
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Naujausi STEAM įrašai: {{ count($VisibleNews) + count($HiddenNews) }}
    </div>
@endsection

@section('script')

    {{--Kad pridetu history list--}}
    @include('components._news-list')

    {{--Kad veiktu MAIN list--}}
    <script type="text/javascript" src="{{  url('js\template.js') }}"></script>

    <script type="text/javascript" src="{{  url('js\load-post.js') }}"></script>

    {{--Laiko konvertavimas--}}
    @include('components._time')
@endsection