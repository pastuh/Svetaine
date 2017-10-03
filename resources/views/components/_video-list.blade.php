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
                    var post_title = addon_options.items[i].channel.status;
                    var title_count = 42;
                    var post_title = post_title.slice(0, title_count) + (post_title.length > title_count ? "..." : "");
                    var viewers = addon_options.items[i].viewers;
                    var video_author = addon_options.items[i].channel.display_name;
                    var preview_img = addon_options.items[i].preview.large;
                    var post_status = addon_options.items[i].channel.status;
                    var status_count = 37;
                    var post_status = post_status.slice(0, status_count) + (post_status.length > status_count ? "..." : "");

                    /* Jeigu suranda reikiama stream */
                    var featured = '';
                    if (video_author == 'expansiveworlds') {
                        featured = 'featured-video';
                    } else {
                        featured = '';
                    }

                    loaded_object = loaded_object +
                        '<div class="pm_blog_item added">' +
                        '<div class="pm_blog_item_wrapper">' +
                        '<div class="pm_blog_featured_image_wrapper">' +
                        '<div class="post-short-intro ' + featured + '" >' +
                        '<div class="mini-info-block">' +
                        '<span class="info-time">' +
                        '<i class="pm_load_more_back fa fa-twitch fa-lg"></i>' + viewers +
                        '</span>' +
                        '<div class="pm_blog_item_title">' + video_author +
                        '</div>' +
                        '</div>' +
                        '<div class="pm_post_likes_wrapper">' +
                        '<a id="twitch-new" class="pm_potrfolio_watch" style="cursor:pointer;" ' +
                        'data-toggle="modal" data-target="#myModal" ' +
                        'data-video="http://player.twitch.tv/?autoplay=false&channel=' + video_author + '">' +
                        '</a>' +
                        '<div class="clear"></div>' +
                        '</div>' +
                        '</div>' +
                        '<img src="' + preview_img + '" alt="" style="float:left;">' +
                        '<div class="clearfix"></div>' +
                        '<div class="pm_blog_item_desc">' + post_status + '</div>' +
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

        var items_set = {!! json_encode($HiddenVideos) !!};

        jQuery('#list').blog_listing_addon_title({
            load_count: 4,
            items: items_set
        });
    });
</script>