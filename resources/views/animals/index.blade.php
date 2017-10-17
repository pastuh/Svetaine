@extends('layouts.main')
@section('title', '| Visi trofėjai')

@section('body_class', ' page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')
    <div class="main_data_listing_container main_columns_4 main_with_margin main_datas_listing">
        <div class="main_data_listing data_isotope">
            @foreach($animals as $animal)
                <div class="main_data_item"><!-- Item 1 -->
                    <div class="main_data_item_wrapper">
                        <div class="main_data_featured_image_wrapper">
                            <div class="post-short-intro">
                                <div class="mini-info-block">
                                <div class="{{ $animal->published ? 'post_published' : 'post_invisible' }}"></div>
                                @foreach($tags as $real_tag)
                                    @if($animal->slug == $real_tag->slug)
                                        @if($real_tag->posts()->where('published', '1')->count() > 0)
                                            <a href="{{ route('tags.show', $animal->slug) }}">
                                                <span class='main_add_icon'><i class='main_load_more_back fa fa-paw fa-lg'></i></span> {{ $real_tag->posts()->where('published', '1')->count() }}
                                            </a>
                                        @endif
                                    @endif
                                @endforeach
                                    <div class="main_data_item_title">
                                        {{ str_limit($animal->title, $limit= 42, $end="...") }}
                                    </div>
                                </div>
                                <div class="main_post_likes_wrapper">
                                    <a class="main_data_read_more" href="animals/{{ $animal->id }}"></a>
                                </div>
                            </div>
                            <img src="{{ asset('img/animals/' . $animal->main_image) }}" alt="" style="float:left;">
                            <div class="clearfix"></div>
                            <div class="main_data_item_desc">&nbsp;</div>
                        </div>
                    </div>
                </div><!-- blog_item -->
            @endforeach
        </div><!-- main_data_listing -->
        {{--<a href="javascript:void(0)" class="main_load_more"><span class="main_load_more_back"></span></a>--}}
        <div class="clear"></div>
    </div><!-- main_data_listing_container -->
    <div style="padding-top: 80px;"></div>
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        {{--Rodoma sukurti posta, jeigu useris turi teises--}}
        @if(Auth::check() and Auth::user()->hasPermission('create-animals'))
            <li rel="tooltip" title="Sukurti">
                <a href="{{ route('animals.create') }}" aria-label="Sukurti trofėjų">
                    <i class="fa fa-plus-square fa-lg"></i>
                </a>
            </li>
        @endif
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title title-main">
        <div class="simple-title">
            Aprašyti trofėjai: {{ count($animals) }}
        </div>
    </div>

    <div class="main_slide_title_wrapper main_simple_title pagination-main">
        <div class="simple-pagination">
            {{ $animals->links() }}
        </div>
    </div>

@endsection

@section('script')
    {{--Scroll title/pagination--}}
    @include('components._title_pagination')
@endsection