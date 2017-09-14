@extends('layouts.main')
@section('title', '| Visi įrašai')

@section('header_class', 'fixed_header')
@section('body_class', 'pm_dark_type page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')
    <div class="pm_blog_listing_container pm_columns_4 pm_with_margin">
        <br>
        <div class="pm_blog_listing blog_isotope">
            @foreach($posts as $post)
                <div class="pm_blog_item"><!-- Item 1 -->
                    <div class="pm_blog_item_wrapper">
                        <div class="pm_blog_featured_image_wrapper {{ $post->published ? 'post_published' : 'post_invisible' }}">
                            <img src="{{ asset('img/posts/' . $post->image) }}" alt="">
                            <div class="pm_post_likes_wrapper">
                                <a class="pm_potrfolio_read_more" href="posts/{{ $post->id }}"></a>
                                <div class="clear"></div>
                            </div>
                            <div class="post-short-intro" style="float:left; margin-top: -40px; position: relative;">
                                <a href="{{ route('categories.slug', $post->category->slug) }}">
                                    @include('components._posticon')
                                </a>
                                <span class="info-tiny">
                                    <i class="pm_load_more_back fa fa-clock-o fa-lg"></i> {{ date('Y-m-d H:i', strtotime($post->created_at)) }}
                                </span>
                            </div>
                        </div>
                        <div class="pm_blog_post_title">
                            {{ str_limit($post->title, $limit= 42, $end="...") }}
                        </div>
                    </div>
                </div><!-- pm_blog_item -->
            @endforeach
        </div><!-- pm_blog_listing -->
        {{--<a href="javascript:void(0)" class="pm_load_more"><span class="pm_load_more_back"></span></a>--}}
        <div class="clear"></div>
    </div><!-- pm_blog_listing_container -->
    <div style="padding-top: 80px;"></div>
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        @if($user_posts > 4)
        <li>
            <a class="pm_load_more" href="javascript:void(0)" aria-label="Daugiau įrašų">
                <i class="pm_load_more_back fa fa-history fa-lg"></i>
            </a>
        </li>
        @endif
        <li>
            <a href="{{ route('posts.create') }}" aria-label="Sukurti įrašą">
                <i class="fa fa-plus-square fa-lg"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Mano sukurti įrašai: {{ $user_posts }}
    </div>
@endsection

@section('script')

    {{--Kad pridetu history list--}}
    @include('components._post-list')

    {{--Kad veiktu MAIN list--}}
    <script type="text/javascript" src="{{  url('js\template.js') }}"></script>

    {{--Laiko konvertavimas--}}
    @include('components._time')
@endsection