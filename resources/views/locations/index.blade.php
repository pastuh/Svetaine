@extends('layouts.main')
@section('title', '| Visos vietovės')
@section('description', '| Visi išsamiai aprašyti rezervatai, nacionaliniai parkai ir kitos vietovės esančios žaidime. Svarbiausia informacija ir faktai tikriems žaidimo fanams.')

@section('body_class', ' page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')
    <div class="main_data_listing_container main_columns_4 main_with_margin main_datas_listing">
        <br>
        <div class="main_data_listing data_isotope">
            @foreach($maps as $map)
                <div class="main_data_item"><!-- Item 1 -->
                    <div class="main_data_item_wrapper">
                        <div class="main_data_featured_image_wrapper">
                            <div class="post-short-intro">
                                <div class="mini-info-block">
                                @foreach($tags as $real_tag)
                                    @if($map->slug == $real_tag->slug)
                                        @if($real_tag->posts()->where('published', '1')->count() > 0)
                                            <a href="{{ route('tags.show', $map->slug) }}">
                                                <span class='main_add_icon'><i class='main_load_more_back fa fa-map-o fa-lg'></i></span> {{ $real_tag->posts()->where('published', '1')->count() }}
                                            </a>
                                        @endif
                                    @endif
                                @endforeach
                                    <div class="main_data_item_title">
                                        {{ str_limit($map->title, $limit= 42, $end="...") }}
                                    </div>
                                </div>
                                <div class="main_post_likes_wrapper">
                                    <a class="main_data_read_more" href="location/{{ $map->slug }}"></a>
                                </div>
                            </div>
                            <img src="{{ asset('img/maps/' . $map->main_image) }}" alt="" style="float:left;">
                            <div class="clearfix"></div>
                            <div class="main_data_item_desc">&nbsp;</div>
                        </div>
                    </div>
                </div><!-- blog_item -->
            @endforeach
        </div><!-- main_data_listing -->

        <div class="clear"></div>
    </div><!-- main_data_listing_container -->
    <div style="padding-top: 80px;"></div>
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">

        {{--Galimybe perziureti sukurtus Trofejus--}}
        @if(Auth::check() and Auth::user()->hasPermission('read-maps'))
            <li rel="tooltip" title="Vietovių peržiūra">
                <a href="{{ route('maps.index') }}" aria-label="Peržiūrėti sukurtas vietoves">
                    <i class="fa fa-folder-open fa-lg"></i>
                </a>
            </li>
        @endif
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title title-main">
        <div class="simple-title">
            Visos vietovės: {{ count($maps) }}
        </div>
    </div>

    <div class="main_slide_title_wrapper main_simple_title pagination-main">
        <div class="simple-pagination">
            {{ $maps->links() }}
        </div>
    </div>

@endsection

@section('script')
    {{--Scroll title/pagination--}}
    @include('components._title_pagination')
@endsection