@extends('layouts.main')
@section('title', '| Visi įrašai')

@section('body_class', ' page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')
    <div class="main_data_listing_container main_columns_2 main_with_margin">
        <div class="main_data_listing data_isotope">
            @foreach($posts as $post)
                <div class="main_data_item"><!-- Item 1 -->
                    <div class="main_data_item_wrapper">
                        <div class="main_data_featured_image_wrapper">

                            <div class="post-short-intro" >
                                <div class="mini-info-block">
                                    <a href="{{ route('categories.slug', $post->category->slug) }}">
                                        @include('components._posticon')
                                    </a>
                                    <span class="info-time">
                                            <i class="main_load_more_back fa fa-clock-o fa-lg"></i>
                                        {{ date('Y-m-d H:i', strtotime($post->created_at)) }}
                                    </span>

                                    <div class="main_data_item_title">
                                        {{ str_limit($post->title, $limit= 42, $end="...") }}
                                    </div>
                                </div>

                                <div class="main_post_likes_wrapper">
                                    <a class="main_data_read_more" href="blog/{{ $post->slug }}"></a>
                                </div>

                            </div>
                                <img src="{{ asset('img/posts/' . $post->image) }}" alt="" style="float:left;">
                                <div class="clearfix"></div>
                                <div class="main_data_item_desc">{!! str_limit($post->body, $limit= 200, $end="...") !!}</div>
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
        {{--Rodomas mygtukas i STEAM postus--}}
        <li>
            <a href="{{ route('news.index') }}" aria-label="Steam naujienos">
                <i class="fa fa-steam-square fa-lg"></i>
            </a>
        </li>

        {{--Rodomas mygtukas POSTS jeigu turi Savo postu ir gali perziureti postus--}}
        @if(Auth::check() and Auth::user()->posts->count() > 0 and Auth::user()->hasPermission('read-posts'))
            <li>
                <a href="{{ route('posts.index') }}" aria-label="Peržiūrėti sukurtus įrašus">
                    <i class="fa fa-folder-open fa-lg"></i>
                </a>
            </li>
            {{--Rodoma sukurti posta, jeigu useris turi teises, bet neturi postu--}}
        @elseif(Auth::check() and Auth::user()->hasRole('author|editor|administrator|superadministrator'))
            <li>
                <a href="{{ route('posts.create') }}" aria-label="Sukurti įrašą">
                    <i class="fa fa-plus-square fa-lg"></i>
                </a>
            </li>
        @endif
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title title-main">
        <div class="simple-title">
            Visi įrašai: {{ $count }}
        </div>
    </div>

    <div class="main_slide_title_wrapper main_simple_title pagination-main">
        <div class="simple-pagination">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

@section('script')
    {{--Scroll title/pagination--}}
    @include('components._title_pagination')
@endsection