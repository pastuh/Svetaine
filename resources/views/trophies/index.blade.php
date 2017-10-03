@extends('layouts.main')
@section('title', '| Visi trofėjai')

@section('header_class', 'fixed_header')
@section('body_class', 'pm_dark_type page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')
    <div class="pm_blog_listing_container pm_columns_4 pm_with_margin pm_posts_listing">
        <br>
        <div class="pm_blog_listing blog_isotope">
            @foreach($animals as $animal)
                <div class="pm_blog_item"><!-- Item 1 -->
                    <div class="pm_blog_item_wrapper">
                        <div class="pm_blog_featured_image_wrapper">
                            <div class="post-short-intro">
                                <div class="mini-info-block">
                                @foreach($tags as $real_tag)
                                    @if($animal->slug == $real_tag->slug)
                                        @if($real_tag->posts()->where('published', '1')->count() > 0)
                                            <a href="{{ route('tags.show', $animal->slug) }}">
                                                <span class='pm_add_icon'><i class='pm_load_more_back fa fa-paw fa-lg'></i></span> {{ $real_tag->posts()->where('published', '1')->count() }}
                                            </a>
                                        @endif
                                    @endif
                                @endforeach
                                </div>
                                <div class="pm_post_likes_wrapper">
                                    <a class="pm_portfolio_read_more" href="trophy/{{ $animal->slug }}"></a>
                                </div>
                            </div>
                            <img src="{{ asset('img/animals/' . $animal->main_image) }}" alt="" style="float:left;">
                            <div class="clearfix"></div>
                            <div class="pm_blog_item_desc">{{ str_limit($animal->title, $limit= 42, $end="...") }}</div>
                        </div>
                    </div>
                </div><!-- blog_item -->
            @endforeach
        </div><!-- pm_blog_listing -->
        {{--<a href="javascript:void(0)" class="pm_load_more"><span class="pm_load_more_back"></span></a>--}}
        <div class="clear"></div>
    </div><!-- pm_blog_listing_container -->
    <div style="padding-top: 80px;"></div>
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        {{--Rodomas mygtukas LOAD MORE jeigu yra ka rodyti--}}
        @if(count($old_animals) >= 1)
            <li>
                <a class="pm_load_more" href="javascript:void(0)" aria-label="Daugiau įrašų">
                    <i class="fa fa-history fa-lg"></i>
                </a>
            </li>
        @endif

        {{--Galimybe perziureti sukurtus Trofejus--}}
        @if(Auth::check() and Auth::user()->hasPermission('read-animals') and count($animals) > 0)
            <li>
                <a href="{{ route('animals.index') }}" aria-label="Peržiūrėti sukurtus trofėjus">
                    <i class="fa fa-folder-open fa-lg"></i>
                </a>
            </li>
        {{--Rodoma sukurti posta, jeigu useris turi teises--}}
        @elseif(Auth::check() and Auth::user()->hasPermission('create-animals'))
            <li>
                <a href="{{ route('animals.create') }}" aria-label="Aprašyti trofėjų">
                    <i class="fa fa-plus-square fa-lg"></i>
                </a>
            </li>
        @endif
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Visi trofėjai: {{ $count }}
    </div>
@endsection

@section('script')

    {{--Kad pridetu history list--}}
    @include('components._trophies-list')

    {{--Kad veiktu MAIN list--}}
    <script type="text/javascript" src="{{  url('js\template.js') }}"></script>

    <script type="text/javascript" src="{{  url('js\load-post.js') }}"></script>

@endsection