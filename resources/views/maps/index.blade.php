@extends('layouts.main')
@section('title', '| Visos vietovės')

@section('header_class', 'fixed_header')
@section('body_class', 'pm_dark_type page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')
    <div class="pm_blog_listing_container pm_columns_4 pm_with_margin pm_posts_listing">
        <br>
        <div class="pm_blog_listing blog_isotope">
            @foreach($maps as $map)
                <div class="pm_blog_item"><!-- Item 1 -->
                    <div class="pm_blog_item_wrapper">
                        <div class="pm_blog_featured_image_wrapper">
                            <div class="post-short-intro">
                                <div class="mini-info-block">
                                @foreach($tags as $real_tag)
                                    @if($map->slug == $real_tag->slug)
                                        @if($real_tag->posts()->where('published', '1')->count() > 0)
                                            <a href="{{ route('tags.show', $map->slug) }}">
                                                <span class='pm_add_icon'><i class='pm_load_more_back fa fa-paw fa-lg'></i></span> {{ $real_tag->posts()->where('published', '1')->count() }}
                                            </a>
                                        @endif
                                    @endif
                                @endforeach
                                </div>
                                <div class="pm_post_likes_wrapper">
                                    <a class="pm_portfolio_read_more" href="maps/{{ $map->id }}"></a>
                                </div>
                            </div>
                            <img src="{{ asset('img/maps/' . $map->main_image) }}" alt="" style="float:left;">
                            <div class="clearfix"></div>
                            <div class="pm_blog_item_desc">{{ str_limit($map->title, $limit= 42, $end="...") }}</div>
                        </div>
                    </div>
                </div><!-- blog_item -->
            @endforeach
        </div><!-- pm_blog_listing -->

        <div class="clear"></div>
    </div><!-- pm_blog_listing_container -->
    <div style="padding-top: 80px;"></div>
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        {{--Rodomas mygtukas LOAD MORE jeigu yra ka rodyti--}}
        @if(count($old_maps) >= 1)
            <li>
                <a class="pm_load_more" href="javascript:void(0)" aria-label="Daugiau įrašų">
                    <i class="fa fa-history fa-lg"></i>
                </a>
            </li>
        @endif

        {{--Rodoma sukurti posta, jeigu useris turi teises--}}
        @if(Auth::check() and Auth::user()->hasPermission('create-maps'))
            <li>
                <a href="{{ route('maps.create') }}" aria-label="Aprašyti vietovę">
                    <i class="fa fa-plus-square fa-lg"></i>
                </a>
            </li>
        @endif
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Aprašytos vietovės: {{ count($maps) }}
    </div>
@endsection

@section('script')

    {{--Kad pridetu history list--}}
    @include('components._maps-list')

    {{--Kad veiktu MAIN list--}}
    <script type="text/javascript" src="{{  url('js\template.js') }}"></script>

    <script type="text/javascript" src="{{  url('js\load-post.js') }}"></script>

    {{--Laiko konvertavimas--}}
    @include('components._time')
@endsection