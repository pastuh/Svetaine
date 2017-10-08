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
                    var title_count = 42;
                    var post_title = post_title.slice(0, title_count) + (post_title.length > title_count ? "..." : "");
                    var post_slug = addon_options.items[i].slug;
                    var post_tag = '';

                    @foreach($tags as $real_tag)
                    if(post_slug === "{{$real_tag->slug}}" ){
                        if("{{$real_tag->posts()->where('published', '1')->count()}}" > 0) {
                            post_tag = '<a href="tags/' + post_slug + '"><span class="pm_add_icon"><i class="pm_load_more_back fa fa-paw fa-lg"></i></span> {{ $real_tag->posts()->where("published", "1")->count() }}</a>';
                        }
                    }
                    @endforeach

                        loaded_object = loaded_object +
                        '<div class="pm_blog_item added">' +
                        '<div class="pm_blog_item_wrapper">' +
                        '<div class="pm_blog_featured_image_wrapper">' +
                        '<div class="post-short-intro">' +
                        '<div class="mini-info-block">' +
                        post_tag +
                        '</div>' +
                        '<div class="pm_post_likes_wrapper">' +
                        '<a class="pm_portfolio_read_more" href="maps/' + post_slug + '"></a>' +
                        '</div>' +
                        '</div>' +
                        '<img src="../img/maps/' + addon_options.items[i].main_image + '" alt="" style="float:left;"/>' +
                        '<div class="clearfix"></div>' +
                        '<div class="pm_blog_item_desc">' + post_title + '</div>' +
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

    jQuery('.news_page').each(function () {

        var items_set = {!! json_encode($old_maps->toArray()) !!};

        jQuery('#list').blog_listing_addon_title({
            load_count: 3,
            items: items_set
        });
    });
</script>