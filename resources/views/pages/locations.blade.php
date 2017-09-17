@extends('layouts.main')

@section('title', '| Vietovės')
@section('body_class', 'pm_dark_type page-template-page-blog-ajax blog_grid_title_page locations_page')

@section('content')
    <!-- Content -->
    <div class="pm_blog_listing_container pm_columns_2 pm_with_margin">
        <div class="pm_blog_listing blog_isotope">

            <div class="pm_blog_item"><!-- Item 1 -->
                <div class="pm_blog_item_wrapper">
                    <div class="pm_blog_featured_image_wrapper">
                        <img src="img\clipart\blog\col-2\blog09.jpg" alt="">
                        <div class="pm_post_likes_wrapper">
                            <div class="pm_image_likes_container">
                                <div class="pm_add_like_button">
                                    <i class="pm_likes_icon fa fa-heart-o"></i>
                                    <span class="pm_likes_counter">0</span>
                                </div>
                                <a class="pm_portfolio_read_more" href="blog-post-standard.htm"></a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pm_blog_post_title">
                        Hirschfelden
                    </div>
                </div>
            </div><!-- pm_blog_item -->

            <div class="pm_blog_item"><!-- Item 2 -->
                <div class="pm_blog_item_wrapper">
                    <div class="pm_blog_featured_image_wrapper">
                        <img src="img\clipart\blog\col-2\blog15.jpg" alt="">
                        <div class="pm_post_likes_wrapper">
                            <div class="pm_image_likes_container">
                                <div class="pm_add_like_button">
                                    <i class="pm_likes_icon fa fa-heart-o"></i>
                                    <span class="pm_likes_counter">0</span>
                                </div>
                                <a class="pm_portfolio_read_more" href="blog-post-image-full.htm"></a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pm_blog_post_title">
                        Laton Blake District
                    </div>
                </div>
            </div><!-- pm_blog_item -->
        </div><!-- pm_blog_listing -->
        <a href="javascript:void(0)" class="pm_load_more"><span class="pm_load_more_back"></span></a>
        <div class="clear"></div>
    </div><!-- pm_blog_listing_container -->
@endsection

@section('script')
    {{-- Reikia perziureti ir sutvarkyti--}}

    {{--Kad pridetu history list--}}
    @include('components._blog-list')

    {{--Kad veiktu MAIN list--}}
    <script type="text/javascript" src="{{  url('js\template.js') }}"></script>

    {{--Laiko konvertavimas--}}
    @include('components._time')
@endsection