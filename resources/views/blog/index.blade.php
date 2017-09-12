@extends('layouts.main')
@section('title', '| Visi įrašai')

@section('header_class', 'fixed_header')
@section('body_class', 'pm_dark_type page-template-page-blog-ajax blog_grid_title_page news_page background-info2')
@section('body_style', 'overflow-y: hidden;')

@section('content')
    <div class="pm_blog_listing_container pm_columns_4 pm_with_margin">
        <br>
        <div class="pm_blog_listing blog_isotope">
            @foreach($posts as $post)
                <div class="pm_blog_item"><!-- Item 1 -->
                    <div class="pm_blog_item_wrapper">
                        <div class="pm_blog_featured_image_wrapper">
                            <img src="{{ asset('img/posts/' . $post->image) }}" alt="">
                            <div class="pm_post_likes_wrapper">
                                <a class="pm_potrfolio_read_more" href="blog/{{ $post->slug }}"></a>
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
                            {{ str_limit($post->title, $limit= 60, $end="...") }}
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
        @if($count > 4)
            <li>
                <a class="pm_load_more" href="javascript:void(0)" aria-label="Daugiau įrašų">
                    <i class="fa fa-history fa-lg"></i>
                </a>
            </li>
        @endif

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
    <div class="pm_slide_title_wrapper pm_simple_title">
        Visi įrašai: {{ $count }}
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        // Blog Listing Grid with Titles
        jQuery.fn.blog_listing_addon_title = function (addon_options) {
            "use strict";
            //Set Variables
            var addon_el = jQuery(this),
                addon_base = this,
                img_count = addon_options.items.length,
                img_per_load = addon_options.load_count,
                $newEls = '',
                loaded_object = '',
                $container = jQuery('.blog_isotope');

            jQuery('.pm_load_more').on('click', function () {
                $newEls = '';
                loaded_object = '';
                var loaded_images = $container.find('.added').size();
                if ((img_count - loaded_images) > img_per_load) {
                    var now_load = img_per_load;
                } else {
                    now_load = img_count - loaded_images;
                }

                if ((loaded_images + now_load) == img_count) jQuery(this).fadeOut();

                if (loaded_images < 1) {
                    var i_start = 1;
                } else {
                    i_start = loaded_images + 1;
                }

                if (now_load > 0) {
                    // load more elements
                    for (var i = i_start - 1; i < i_start + now_load - 1; i++) {

                        /* Įrašo pavadinimo sutrumpinimas */
                        var post_title = addon_options.items[i].title;
                        var title_count = 60;
                        var post_title = post_title.slice(0, title_count) + (post_title.length > title_count ? "..." : "");
                        var post_time = moment(addon_options.items[i].created_at).format('YYYY-MM-DD HH:mm');

                        loaded_object = loaded_object +
                            '<div class="pm_blog_item added">' +
                            '<div class="pm_blog_item_wrapper">' +
                            '<div class="pm_blog_featured_image_wrapper">' +
                            '<img src="../img/posts/' + addon_options.items[i].image + '" alt="" />' +
                            '<div class="pm_post_likes_wrapper">' +
                            '<a class="pm_potrfolio_read_more" href="blog/' + addon_options.items[i].slug + '"></a>' +
                            '<div class="clear"></div>' +
                            '</div>' +

                            '<div class="post-short-intro" style="float:left; margin-top: -40px; position: relative;">' +
                            '<a href="{{ route('categories.slug', $post->category->slug) }}">' +
                            "@include('components._posticon')" +
                            '</a>' +
                            '<span class="info-tiny">' +
                            '<i class="pm_load_more_back fa fa-clock-o fa-lg"></i>' + post_time +
                            '</span>' +
                            '</div>' +

                            '</div>' +
                            '<div class="pm_blog_post_title">' + post_title +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        ;
                    }

                    $newEls = jQuery(loaded_object);
                    $container.isotope('insert', $newEls, function () {
                        $container.isotope('reLayout');
                    });
                    setTimeout("jQuery('.blog_isotope').isotope();", 500);
                    setTimeout("jQuery('.blog_isotope').isotope();", 1000);
                    setTimeout("jQuery('.blog_isotope').isotope();", 2000);
                    setTimeout("jQuery('.blog_isotope').isotope();", 3000);
                }
            });
        };
    </script>

    <script type="text/javascript">
        jQuery('.news_page').each(function () {
            /*var items_set = [
             {src: 'img/clipart/blog/col-4/blog10.jpg', href: 'blog-post-standard.html', title: 'The Fox 2'},
             {src: 'img/clipart/blog/col-4/blog02.jpg', href: 'blog-post-image-full.html', title: 'Stephany'},
             {src: 'img/clipart/blog/col-4/post10.jpg', href: 'blog-post-video-full.html', title: 'Something About Me'},
             {src: 'img/clipart/blog/col-4/blog05.jpg', href: 'blog-post-standard.html', title: 'Summer House'}
             ];*/
            var items_set = {!! json_encode($old_posts->toArray()) !!};

            jQuery('#list').blog_listing_addon_title({
                load_count: 4,
                items: items_set
            });
        });
    </script>
    <script type="text/javascript" src="{{  url('js\main.js') }}"></script> {{--Kad veiktu MAIN template--}}
    <script type="text/javascript" src="{{  url('js\isotope.pkgd.min.js') }}"></script> {{--Kad uzkrautu grazius Postus--}}
    @include('components._time')
@endsection