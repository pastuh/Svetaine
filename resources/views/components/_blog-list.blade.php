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
                    var post_time = moment(addon_options.items[i].created_at).format('YYYY-MM-DD HH:mm');
                    var post_desc = addon_options.items[i].body;
                    var desc_count = 333;
                    var post_desc =  post_desc.slice(0, desc_count) + (post_desc.length > desc_count ? "..." : "");

                    loaded_object = loaded_object +
                        '<div class="pm_blog_item added">' +
                        '<div class="pm_blog_item_wrapper">' +
                        '<div class="pm_blog_featured_image_wrapper">' +
                        '<div class="post-short-intro">' +
                        /* Kategorijos icon */
                        '<a href="{{ route('categories.slug', $post->category->slug) }}">' +
                        "@include('components._posticon')" +
                        '</a>' +
                        /* Post laikas */
                        '<span class="info-time">' +
                        '<i class="pm_load_more_back fa fa-clock-o fa-lg"></i>' + post_time +
                        '</span>' +
                        /* Posto pavadinimas */
                        '<div class="pm_blog_item_title">' + post_title +
                        '</div>' +
                        /* Skaityti daugiau */
                        '<div class="pm_post_likes_wrapper">' +
                        '<a class="pm_portfolio_read_more" href="blog/' + addon_options.items[i].slug + '"></a>' +
                        '</div>' +
                        '</div>' +
                        /* Posto img */
                        '<img src="../img/posts/' + addon_options.items[i].image + '" alt="" style="float:left;" />' +
                        '<div class="clearfix"></div>' +
                        /* Posto aprasymas */
                        '<div class="pm_blog_item_desc">' + post_desc +
                        '</div>'+
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
        var items_set = {!! json_encode($old_posts->toArray()) !!};
        jQuery('#list').blog_listing_addon_title({
            load_count: 2,
            items: items_set
        });
    });
</script>