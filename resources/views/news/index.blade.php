@extends('layouts.main')
@section('title', '| Steam įrašai')

@section('body_class', ' page-template-page-blog-ajax blog_grid_title_page news_page background-info2')

@section('content')
    <div class="main_data_listing_container main_columns_2 main_with_margin">
        <div class="main_data_listing data_isotope">
            @foreach($entries as $key => $item)
                <div class="main_data_item"><!-- Item 1 -->
                    <div class="main_data_item_wrapper">
                        <div class="main_data_featured_image_wrapper">

                            <div class="post-short-intro">
                                <div class="mini-info-block">
                                    <span class="info-time">
                                            <i class="main_load_more_back fa fa-clock-o fa-lg"></i>
                                        {{ Date::createFromTimestamp($item->date)->format('Y-m-d H:i') }}
                                    </span>

                                    <div class="main_data_item_title">
                                        {{ str_limit($item->title, $limit= 80, $end="...") }}
                                    </div>
                                </div>
                                <div class="main_post_likes_wrapper">
                                    <a class="main_data_read_more" href="{{ $item->url }}" target='_blank'></a>
                                </div>

                            </div>

                            @php
                                $has_image = preg_match('/(http:\/\/cdn.*?(jpg|png))/', $item->contents, $images);
                            @endphp

                            <div class="main_data_item_desc steam_desc">
                                @if(!empty($images[0]))
                                    <img src="{{ $images[0] }}" alt=""
                                         class="feed-item-image img-responsive steam-image"
                                         style="float:left; max-height: 200px; width: auto">
                                @else
                                    <img src="{{ asset('/img/news/empty-foto.jpg') }}" alt=""
                                         class="feed-item-image img-responsive steam-image"
                                         style="float:left; max-height: 200px; width: auto">
                                @endif

                                @php
                                    $search = "/(\[img.*img\]|\[list\]|\[\*\])/";
                                    $replace = "";
                                    $description = preg_replace($search,$replace,$item->contents);
                                    $search = "/(\[b\]|\[\/b\])/";
                                    $description = preg_replace($search,$replace,$description);

                                    /* URL i paprasta href */
                                    $find = "/\[url=(.*)\](.*)\[\/url\]/";
                                    $description = preg_replace($find,"<span style='color:#ffc500;'>$2</span>", $description);
                                    /*$description = preg_replace($find,"<span style='color:#ffc500;'>$2</span>", $description);*/

                                    /* H1 */
                                    $find = "/\[h1\](.*)\[\/h1\]/";
                                    $description = preg_replace($find,'<b>$1</b>', $description);

                                    /* i */
                                    $find = "/\[i\](.*)\[\/i\]/";
                                    $description = preg_replace($find,'<i>$1</i>', $description);
                                    /* remove last [i] */
                                    $search = "/(\[i\]|\[\/i\])/";
                                    $description = preg_replace($search,$replace,$description);

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

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title title-main">
        <div class="simple-title">
            STEAM įrašai: {{ $news_total }}
        </div>
    </div>

    <div class="main_slide_title_wrapper main_simple_title pagination-main">
        <div class="simple-pagination">
            {{ $entries->links() }}
        </div>
    </div>
@endsection

@section('script')
    {{--Scroll title/pagination--}}
    @include('components._title_pagination')
@endsection