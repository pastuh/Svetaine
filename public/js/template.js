"use strict";

function pm_fullwidth_block() {
    if (jQuery('div').hasClass('right_sidebar') || jQuery('div').hasClass('left_sidebar')) {
    } else {
        var container = jQuery('.pm_fullwidth_block'),
            cont_parent_width = jQuery(container).parent().width(),
            site_width = jQuery('body').width(),
            difference = site_width - cont_parent_width;

        jQuery(container).css({
            'margin-left': '-' + (difference / 2) + 'px',
            'width': site_width + 'px'
        }).children().css({'padding-left': (difference / 2) + 'px', 'padding-right': (difference / 2) + 'px'});

        jQuery('.pm_no_padding_block').css({'padding-left': '0px', 'padding-right': '0px'});
    }
}

function hover_on(i){
    jQuery('.pm_gallery').find('.pm_gallery_item_wrapper').css('opacity', '.3');
    jQuery(i).css('opacity', '1');
}

function hover_off(i) {
    jQuery('.pm_gallery').find('.pm_gallery_item_wrapper').css('opacity', '1');
}

// Isotope Setup
function isotope_setup() {
    var container = jQuery('.isotope');

    if (container.length) {
        jQuery(container).isotope({
            itemSelector: '.pm_gallery_item'
        });
    }
}

function listing_isotope_setup() {
    var container = jQuery('.listing_isotope');

    if (container.length) {
        jQuery(container).isotope({
            itemSelector: '.pm_albums_listing_item'
        });
    }
}

function blog_isotope_setup() {
    var container = jQuery('.blog_isotope');

    if (container.length) {
        jQuery(container).isotope({
            itemSelector: '.pm_blog_item'
        });
    }
}

function portfolio_isotope_setup() {
    var container = jQuery('.portfolio_isotope');

    if (container.length) {
        jQuery(container).isotope({
            itemSelector: '.pm_portfolio_item'
        });
    }
}

/////////////////////////////
// Load More Gallery Items //
/////////////////////////////
// Gallery with Advanced Hover
jQuery.fn.gallery_addon_advanced = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.isotope');

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
                loaded_object = loaded_object +
                    '<div class="pm_gallery_item added"><div class="pm_gallery_item_wrapper" onmouseover="hover_on(this)" onmouseout="hover_off(this)"><div class="pm_image_wrapper"><img src="' + addon_options.items[i].src + '" alt=""><div class="pm_image_likes_wrapper"><div class="pm_image_likes_container"><div class="pm_add_like_button"><i class="pm_likes_icon fa fa-heart-o"></i><span class="pm_likes_counter">0</span></div><a class="pm_popup_trigger" href="' + addon_options.items[i].popup_href + '"></a><div class="clear"></div></div></div></div></div></div>';
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            setTimeout("jQuery('.isotope').isotope();", 500);
            setTimeout("jQuery('.isotope').isotope();", 1000);
            setTimeout("jQuery('.isotope').isotope();", 2000);
            setTimeout("jQuery('.isotope').isotope();", 3000);
        }
    });
};

// Gallery Grid
jQuery.fn.gallery_addon = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.isotope');

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
                loaded_object = loaded_object +
                    '<div class="pm_gallery_item added"><div class="pm_gallery_item_wrapper"><div class="pm_image_wrapper"><img src="' + addon_options.items[i].src + '" alt=""><div class="pm_image_likes_wrapper"><div class="pm_image_likes_container"><div class="pm_add_like_button"><i class="pm_likes_icon fa fa-heart-o"></i><span class="pm_likes_counter">0</span></div><a class="pm_popup_trigger" href="' + addon_options.items[i].popup_href + '"></a><div class="clear"></div></div></div></div></div></div>';
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            setTimeout("jQuery('.isotope').isotope();", 500);
            setTimeout("jQuery('.isotope').isotope();", 1000);
            setTimeout("jQuery('.isotope').isotope();", 2000);
            setTimeout("jQuery('.isotope').isotope();", 3000);
        }
    });
};

// Gallery Grid with Titles
jQuery.fn.gallery_addon_title = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.isotope');

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
                loaded_object = loaded_object +
                    '<div class="pm_gallery_item added"><div class="pm_gallery_item_wrapper"><div class="pm_image_wrapper"><img src="' + addon_options.items[i].src + '" alt=""><div class="pm_image_likes_wrapper"><div class="pm_image_likes_container"><div class="pm_add_like_button"><i class="pm_likes_icon fa fa-heart-o"></i><span class="pm_likes_counter">0</span></div><a class="pm_popup_trigger" href="' + addon_options.items[i].popup_href + '"></a><div class="clear"></div></div></div></div><div class="pm_image_title">' + addon_options.items[i].title + '</div></div></div>';
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            setTimeout("jQuery('.isotope').isotope();", 500);
            setTimeout("jQuery('.isotope').isotope();", 1000);
            setTimeout("jQuery('.isotope').isotope();", 2000);
            setTimeout("jQuery('.isotope').isotope();", 3000);
        }
    });
};

// Grid Albums Listing
jQuery.fn.gallery_listing_addon = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.listing_isotope');

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
                loaded_object = loaded_object +
                    '<div class="pm_albums_listing_item added" style="width: 25%;"><div class="pm_slbums_listing_wrapper"><div class="pm_album_thumb_wrapper"><img src="' + addon_options.items[i].src + '" alt=""><div class="pm_album_likes_wrapper"><div class="pm_album_likes_container"><div class="pm_add_like_button"><i class="pm_likes_icon fa fa-heart-o"></i><span class="pm_likes_counter">0</span></div><a class="pm_images_counter_wrapper" href="' + addon_options.items[i].album_href + '"><span class="pm_images_counter_icon"></span><span class="images_counter">' + addon_options.items[i].item_count + '</span></a><div class="clear"></div></div></div></div></div></div>';
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            setTimeout("jQuery('.listing_isotope').isotope();", 500);
            setTimeout("jQuery('.listing_isotope').isotope();", 1000);
            setTimeout("jQuery('.listing_isotope').isotope();", 2000);
            setTimeout("jQuery('.listing_isotope').isotope();", 3000);
        }
    });
};

// Grid Albums Listing with Titles
jQuery.fn.gallery_listing_title_addon = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.listing_isotope');

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
                loaded_object = loaded_object +
                    '<div class="pm_albums_listing_item added" style="width: 25%;"><div class="pm_slbums_listing_wrapper" style="padding-left: 10px; padding-bottom: 10px"><div class="pm_album_thumb_wrapper"><img src="' + addon_options.items[i].src + '" alt=""><div class="pm_album_likes_wrapper"><div class="pm_album_likes_container"><div class="pm_add_like_button"><i class="pm_likes_icon fa fa-heart-o"></i><span class="pm_likes_counter">0</span></div><a class="pm_images_counter_wrapper" href="' + addon_options.items[i].album_href + '"><span class="pm_images_counter_icon"></span><span class="images_counter">' + addon_options.items[i].item_count + '</span></a><div class="clear"></div></div></div></div><div class="pm_album_title">' + addon_options.items[i].title + '</div></div></div>';
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            setTimeout("jQuery('.listing_isotope').isotope();", 500);
            setTimeout("jQuery('.listing_isotope').isotope();", 1000);
            setTimeout("jQuery('.listing_isotope').isotope();", 2000);
            setTimeout("jQuery('.listing_isotope').isotope();", 3000);
        }
    });
};

// Blog Listing Grid
jQuery.fn.blog_listing_addon = function (addon_options) {
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
                loaded_object = loaded_object +
                    '<div class="pm_blog_item added">' +
                    '<div class="pm_blog_item_wrapper">' +
                    '<div class="pm_blog_featured_image_wrapper">' +
                    '<img src="' + addon_options.items[i].src + '" alt="" />' +
                    '<div class="pm_post_likes_wrapper">' +
                    '<div class="pm_image_likes_container">' +
                    '<div class="pm_add_like_button">' +
                    '<i class="pm_likes_icon fa fa-heart-o"></i>' +
                    '<span class="pm_likes_counter">0</span>' +
                    '</div>' +
                    '<a class="pm_portfolio_read_more" href="' + addon_options.items[i].href + '"></a>' +
                    '<div class="clear"></div>' +
                    '</div>' +
                    '</div>' +
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
/////////////////////////////////////////////////

// Portfolio Listing Grid
jQuery.fn.portfolio_listing_addon = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.portfolio_isotope');

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
                loaded_object = loaded_object +
                    '<div class="pm_portfolio_item added">' +
                    '<div class="pm_portfolio_item_wrapper">' +
                    '<div class="pm_portfolio_featured_image_wrapper">' +
                    '<img src="' + addon_options.items[i].src + '" alt="" />' +
                    '<div class="pm_post_likes_wrapper">' +
                    '<div class="pm_image_likes_container">' +
                    '<div class="pm_add_like_button">' +
                    '<i class="pm_likes_icon fa fa-heart-o"></i>' +
                    '<span class="pm_likes_counter">0</span>' +
                    '</div>' +
                    '<a class="pm_portfolio_read_more" href="' + addon_options.items[i].href + '"></a>' +
                    '<div class="clear"></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                ;
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            setTimeout("jQuery('.portfolio_isotope').isotope();", 500);
            setTimeout("jQuery('.portfolio_isotope').isotope();", 1000);
            setTimeout("jQuery('.portfolio_isotope').isotope();", 2000);
            setTimeout("jQuery('.portfolio_isotope').isotope();", 3000);
        }
    });
};

// Portfolio Listing Grid with Titles
jQuery.fn.portfolio_listing_addon_title = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.portfolio_isotope');

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
                loaded_object = loaded_object +
                    '<div class="pm_portfolio_item added">' +
                    '<div class="pm_portfolio_item_wrapper">' +
                    '<div class="pm_portfolio_featured_image_wrapper">' +
                    '<img src="' + addon_options.items[i].src + '" alt="" />' +
                    '<div class="pm_post_likes_wrapper">' +
                    '<div class="pm_image_likes_container">' +
                    '<div class="pm_add_like_button">' +
                    '<i class="pm_likes_icon fa fa-heart-o"></i>' +
                    '<span class="pm_likes_counter">0</span>' +
                    '</div>' +
                    '<a class="pm_portfolio_read_more" href="' + addon_options.items[i].href + '"></a>' +
                    '<div class="clear"></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="pm_portfolio_post_title">' +
                    addon_options.items[i].title  +
                    '</div>' +
                    '</div>' +
                    '</div>'
                ;
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            setTimeout("jQuery('.portfolio_isotope').isotope();", 500);
            setTimeout("jQuery('.portfolio_isotope').isotope();", 1000);
            setTimeout("jQuery('.portfolio_isotope').isotope();", 2000);
            setTimeout("jQuery('.portfolio_isotope').isotope();", 3000);
        }
    });
};

function image_post_format_container() {
    var item_height = jQuery(".pm_gallery_item").height();

    jQuery(".pm_media_output_cont_wrapper").width(item_height + 1.003690036900369);
}

/**************************************/
/*********** DOCUMENT READY ***********/
/**************************************/
jQuery(document).ready(function(){
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('.pm_header').height();

    pm_fullwidth_block();

    // Activate Preloader
    jQuery(".preloader_active").width(site_width).height(site_height);
    jQuery(".pm_preloader_load_line").addClass("active");

    // Open Sharing Popup
    jQuery('.pm_share_button').on('click', function () {
        jQuery('.pm_sharing_back').addClass('active');
        setTimeout("jQuery('.pm_popup_share_wrapper').addClass('active_block');", 100);
    });

    // Fullscreen Toggler Button Activate
    jQuery('.pm_fullscreen_toggler').on('click', function () {
        jQuery('.pm_header.fixed_header').toggleClass('hidden_header');
        jQuery('.pm_navigation_container').toggleClass('hidden_nav');
        jQuery('.pm_slides_title_and_likes_container').toggleClass('hidden_title_and_likes');
        jQuery('#sidebar-wrapper').toggleClass('hidden_navigation');
        jQuery('#scroll-menu').toggleClass('hidden_navigation');
        jQuery(this).toggleClass('active');

        if (site_width < 1025) {
            jQuery('.pm_menu_mobile_container_wrapper').toggleClass('pm_without_margin');
        }
    });

    // Menu mobile
    jQuery('.pm_menu_mobile_toggler').on('click', function () {
        jQuery('.pm_menu_mobile_container').slideToggle(600);

        if (site_width < 1025) {
            jQuery('body').toggleClass('scrollable');
        }
    });

    // Activate Form Popup
    var popup_container = jQuery(".pm_form_popup_back"),
        form_wrapper = popup_container.find(".pm_popup_form_wrapper");

    popup_container.width(site_width).height(site_height).css("display", "none");

    // Coming Soon Page
    if (site_width > 737) {
        jQuery('.pm_coming_soon_container').height(site_height);
    }

    // Ken Burns Album
    var slider_container = jQuery('#kenburns');

    if (slider_container.length) {
        slider_container.attr({'width': site_width, 'height': site_height});

        slider_container.kenburns({
            images: [
                'img/clipart/gallery-1920-04.jpg',
                'img/clipart/gallery-1920-02.jpg',
                'img/clipart/gallery-1920-03.jpg',
                'img/clipart/gallery-1920-01.jpg',
                'img/clipart/gallery-1920-05.jpg',
                'img/clipart/gallery-1920-06.jpg',
                'img/clipart/gallery-1920-07.jpg',
                'img/clipart/gallery-1920-08.jpg',
                'img/clipart/gallery-1920-12.jpg',
                'img/clipart/gallery-1920-15.jpg'
            ],
            frames_per_second: 30,
            display_time: 5000,
            fade_time: 1000,
            zoom: 1.2,
            background_color:'#000000'
        });
    }

    // Custom Scroll Activation
    var scroll_cont = jQuery('.pm_scroll_container'),
        desc_scroll_cont = jQuery('.pm_slider_description_cont');

    if (scroll_cont.length) {
        if (site_width > 769) {
            jQuery(scroll_cont).jScrollPane({
                autoReinitialise: true
            });
        }
    }

    if (desc_scroll_cont.length) {
        if (site_width > 737) {
        jQuery(desc_scroll_cont).jScrollPane({
                autoReinitialise: true
            });
        }
    }

    // Sizes of Fullscreen Pages Containers
    var container_height = site_height - header_height,
        media_height = site_height - 160;

    jQuery('.pm_post_container').width(site_width).height(container_height);
    jQuery('.pm_content_block').height(container_height - 187);
    jQuery('.pm_media_output_cont_wrapper').find('iframe').attr('height', media_height);

    if (site_width > 737) {
        jQuery('.gallery_descriptions').height(container_height).css('margin-top', header_height);
    }

    // Open Form Popup
    jQuery('.pm_about_form_button').on('click', function(){
        jQuery('.pm_form_popup_back').css('display', 'block');
        setTimeout(form_position, 100);
    });

    jQuery('.pm_contacts_form_button').on('click', function(){
        jQuery('.pm_form_popup_back').css('display', 'block');
        setTimeout(form_position, 100);
    });

    // Magnific Popup Initialize
    var photo_gallery = jQuery('.photo_gallery');

    if (photo_gallery.length){
        jQuery(photo_gallery).magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }


    if (site_width < 1025) {
	/* Pakeista */
        jQuery('.pm_albums_tape_container, .pm_album_fullscreen, .pm_album_kenburns, .pm_album_descriptions, .pm_album_portrait, .pm_album_tape, .pm_album_stripes, .pm_album_scattered, .pm_album_waterwheel, .pm_album_video, .pm_blog_listing_tape_container').parent().find('.pm_menu_mobile_container_wrapper');/*.css('padding-top', header_height);*/

        var menu_mobile = jQuery('.pm_innerpadding_menu .pm_menu_cont').find('ul.menu').detach();

        jQuery('.pm_menu_mobile_container_wrapper .pm_menu_mobile_container').html(menu_mobile);
        jQuery('.pm_menu_mobile_container_wrapper .pm_menu_mobile_container ul.menu').find('ul.sub-menu').unwrap();

        jQuery('.pm_menu_mobile_container .menu li.menu-item-has-children a').on('click', function () {
            jQuery(this).next().slideToggle(600);
        });
    }

    // Load More Items in Grid Pages
    jQuery('.advanced_hover_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/gallery-1920-04.jpg', popup_href: 'img/clipart/gallery-1920-04.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-14.jpg', popup_href: 'img/clipart/gallery-1920-14.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-15.jpg', popup_href: 'img/clipart/gallery-1920-15.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-16.jpg', popup_href: 'img/clipart/gallery-1920-16.jpg'}
        ];

        jQuery('#list').gallery_addon_advanced({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.album_grid_margin_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/gallery-1920-09.jpg', popup_href: 'img/clipart/gallery-1920-09.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-13.jpg', popup_href: 'img/clipart/gallery-1920-13.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-14.jpg', popup_href: 'img/clipart/gallery-1920-14.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-16.jpg', popup_href: 'img/clipart/gallery-1920-16.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-15.jpg', popup_href: 'img/clipart/gallery-1920-15.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-19.jpg', popup_href: 'img/clipart/gallery-1920-19.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-18.jpg', popup_href: 'img/clipart/gallery-1920-18.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-20.jpg', popup_href: 'img/clipart/gallery-1920-20.jpg'}
        ];

        jQuery('#list').gallery_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.album_grid_title_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/gallery-1920-13.jpg', title: 'Carpathian Mountains', popup_href: 'img/clipart/gallery-1920-13.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-14.jpg', title: 'Ocean Storm', popup_href: 'img/clipart/gallery-1920-14.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-16.jpg', title: 'Snowy Mountains', popup_href: 'img/clipart/gallery-1920-16.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-15.jpg', title: 'Pines', popup_href: 'img/clipart/gallery-1920-15.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-17.jpg', title: 'Autumn Adventures', popup_href: 'img/clipart/gallery-1920-17.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-19.jpg', title: 'Dark Mountain', popup_href: 'img/clipart/gallery-1920-19.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-18.jpg', title: 'Pier', popup_href: 'img/clipart/gallery-1920-18.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-20.jpg', title: 'Golden Gate Bridge', popup_href: 'img/clipart/gallery-1920-20.jpg'}
        ];

        jQuery('#list').gallery_addon_title({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.album_grid_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/gallery-1920-13.jpg', popup_href: 'img/clipart/gallery-1920-13.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-14.jpg', popup_href: 'img/clipart/gallery-1920-14.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-16.jpg', popup_href: 'img/clipart/gallery-1920-16.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-15.jpg', popup_href: 'img/clipart/gallery-1920-15.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-17.jpg', popup_href: 'img/clipart/gallery-1920-17.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-19.jpg', popup_href: 'img/clipart/gallery-1920-19.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-18.jpg', popup_href: 'img/clipart/gallery-1920-18.jpg'},
            {src: 'img/clipart/grid/col-4/gallery-1920-20.jpg', popup_href: 'img/clipart/gallery-1920-20.jpg'}
        ];

        jQuery('#list').gallery_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.album_masonry_page').each(function(){
        var items_set = [
            {src: 'img/clipart/masonry/col-4/masonry-06.jpg', popup_href: 'img/clipart/masonry/masonry-06.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-16.jpg', popup_href: 'img/clipart/masonry/masonry-16.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-09.jpg', popup_href: 'img/clipart/masonry/masonry-09.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-10.jpg', popup_href: 'img/clipart/masonry/masonry-10.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-11.jpg', popup_href: 'img/clipart/masonry/masonry-11.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-13.jpg', popup_href: 'img/clipart/masonry/masonry-13.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-12.jpg', popup_href: 'img/clipart/masonry/masonry-12.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-14.jpg', popup_href: 'img/clipart/masonry/masonry-14.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-22.jpg', popup_href: 'img/clipart/masonry/masonry-22.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-21.jpg', popup_href: 'img/clipart/masonry/masonry-21.jpg'},
            {src: 'img/clipart/masonry/col-4/masonry-23.jpg', popup_href: 'img/clipart/masonry/masonry-23.jpg'}
        ];

        jQuery('#list').gallery_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.albums_listing_grid_title_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/thumbs/thumb-13.jpg', album_href: 'album-grid.html', title: 'Grid Gallery', item_count: '20'},
            {src: 'img/clipart/grid/thumbs/thumb-14.jpg', album_href: 'album-scattered.html', title: 'Scattered Gallery', item_count: '48'}
        ];

        jQuery('#list').gallery_listing_title_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.albums_listing_grid_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/thumbs/thumb-13.jpg', album_href: 'album-grid.html', item_count: '20'},
            {src: 'img/clipart/grid/thumbs/thumb-14.jpg', album_href: 'album-scattered.html', item_count: '48'}
        ];

        jQuery('#list').gallery_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.blog_grid_2_page').each(function(){
        var items_set = [
            {src: 'img/clipart/blog/col-2/blog11.jpg', href: 'blog-post-video-full.html', title: 'Test1'},
            {src: 'img/clipart/blog/col-2/blog03.jpg', href: 'blog-post-standard.html', title: 'Test2'},
            {src: 'img/clipart/blog/col-2/blog14.jpg', href: 'blog-post-image-full.html', title: 'Test3'},
            {src: 'img/clipart/blog/col-2/blog06.jpg', href: 'blog-post-video-full.html', title: 'Test4'},
            {src: 'img/clipart/blog/col-2/blog10.jpg', href: 'blog-post-standard.html', title: 'Test5'},
            {src: 'img/clipart/blog/col-2/blog02.jpg', href: 'blog-post-image-full.html', title: 'Test6'},
            {src: 'img/clipart/blog/col-2/post10.jpg', href: 'blog-post-video-full.html', title: 'Test7'},
            {src: 'img/clipart/blog/col-2/blog05.jpg', href: 'blog-post-standard.html', title: 'Test8'}
        ];

        jQuery('#list').blog_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.blog_grid_3_page').each(function(){
        var items_set = [
            {src: 'img/clipart/blog/col-3/blog03.jpg', href: 'blog-post-standard.html'},
            {src: 'img/clipart/blog/col-3/blog14.jpg', href: 'blog-post-image-full.html'},
            {src: 'img/clipart/blog/col-3/blog06.jpg', href: 'blog-post-video-full.html'},
            {src: 'img/clipart/blog/col-3/blog10.jpg', href: 'blog-post-standard.html'},
            {src: 'img/clipart/blog/col-3/blog02.jpg', href: 'blog-post-image-full.html'},
            {src: 'img/clipart/blog/col-3/post10.jpg', href: 'blog-post-video-full.html'},
            {src: 'img/clipart/blog/col-3/blog05.jpg', href: 'blog-post-standard.html'}
        ];

        jQuery('#list').blog_listing_addon({
            load_count: 3,
            items: items_set
        });
    });

    jQuery('.blog_grid_4_page').each(function(){
        var items_set = [
            {src: 'img/clipart/blog/col-4/blog10.jpg', href: 'blog-post-standard.html'},
            {src: 'img/clipart/blog/col-4/blog02.jpg', href: 'blog-post-image-full.html'},
            {src: 'img/clipart/blog/col-4/post10.jpg', href: 'blog-post-video-full.html'},
            {src: 'img/clipart/blog/col-4/blog05.jpg', href: 'blog-post-standard.html'}
        ];

        jQuery('#list').blog_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.blog_grid_5_page').each(function(){
        var items_set = [
            {src: 'img/clipart/blog/col-5/blog05.jpg', href: 'blog-post-standard.html'}
        ];

        jQuery('#list').blog_listing_addon({
            load_count: 5,
            items: items_set
        });
    });

    jQuery('.blog_grid_margin_page').each(function(){
        var items_set = [
            {src: 'img/clipart/blog/col-4/blog10.jpg', href: 'blog-post-standard.html'},
            {src: 'img/clipart/blog/col-4/blog02.jpg', href: 'blog-post-image-full.html'},
            {src: 'img/clipart/blog/col-4/post10.jpg', href: 'blog-post-video-full.html'},
            {src: 'img/clipart/blog/col-4/blog05.jpg', href: 'blog-post-standard.html'}
        ];

        jQuery('#list').blog_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.blog_masonry_margin_page').each(function(){
        var items_set = [
            {src: 'img/clipart/blog/blog10.jpg', href: 'blog-post-standard.html'},
            {src: 'img/clipart/blog/blog02.jpg', href: 'blog-post-image-full.html'},
            {src: 'img/clipart/blog/post10.jpg', href: 'blog-post-video-full.html'},
            {src: 'img/clipart/blog/blog05.jpg', href: 'blog-post-standard.html'}
        ];

        jQuery('#list').blog_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.blog_masonry_title_page').each(function(){
        var items_set = [
            {src: 'img/clipart/blog/blog10.jpg', href: 'blog-post-standard.html', title: 'The Fox '},
            {src: 'img/clipart/blog/blog02.jpg', href: 'blog-post-image-full.html', title: 'Stephany '},
            {src: 'img/clipart/blog/post10.jpg', href: 'blog-post-video-full.html', title: 'Something About Me '},
            {src: 'img/clipart/blog/blog05.jpg', href: 'blog-post-standard.html', title: 'Summer House '}
        ];

        jQuery('#list').blog_listing_addon_title({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.blog_masonry_page').each(function(){
        var items_set = [
            {src: 'img/clipart/blog/blog10.jpg', href: 'blog-post-standard.html'},
            {src: 'img/clipart/blog/blog02.jpg', href: 'blog-post-image-full.html'},
            {src: 'img/clipart/blog/post10.jpg', href: 'blog-post-video-full.html'},
            {src: 'img/clipart/blog/blog05.jpg', href: 'blog-post-standard.html'}
        ];

        jQuery('#list').blog_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.portfolio_grid_2_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-2/gallery-1920-25.jpg', href: 'porfolio-post-video-full.html'},
            {src: 'img/clipart/grid/col-2/gallery-1920-12.jpg', href: 'porfolio-post-standard.html'},
            {src: 'img/clipart/grid/col-2/gallery-1920-09.jpg', href: 'porfolio-post-image-full.html'},
            {src: 'img/clipart/grid/col-2/gallery-1920-23.jpg', href: 'porfolio-post-video-full.html'},
            {src: 'img/clipart/grid/col-2/gallery-1920-05.jpg', href: 'porfolio-post-standard.html'},
            {src: 'img/clipart/grid/col-2/gallery-1920-07.jpg', href: 'porfolio-post-image-full.html'},
            {src: 'img/clipart/grid/col-2/gallery-1920-17.jpg', href: 'porfolio-post-video-full.html'},
            {src: 'img/clipart/grid/col-2/gallery-1920-08.jpg', href: 'porfolio-post-standard.html'}
        ];

        jQuery('#list').portfolio_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.portfolio_grid_3_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-3/gallery-1920-12.jpg', href: 'porfolio-post-standard.html'},
            {src: 'img/clipart/grid/col-3/gallery-1920-09.jpg', href: 'porfolio-post-image-full.html'},
            {src: 'img/clipart/grid/col-3/gallery-1920-23.jpg', href: 'porfolio-post-video-full.html'},
            {src: 'img/clipart/grid/col-3/gallery-1920-05.jpg', href: 'porfolio-post-standard.html'},
            {src: 'img/clipart/grid/col-3/gallery-1920-07.jpg', href: 'porfolio-post-image-full.html'},
            {src: 'img/clipart/grid/col-3/gallery-1920-17.jpg', href: 'porfolio-post-video-full.html'},
            {src: 'img/clipart/grid/col-3/gallery-1920-08.jpg', href: 'porfolio-post-standard.html'}
        ];

        jQuery('#list').portfolio_listing_addon({
            load_count: 3,
            items: items_set
        });
    });

    jQuery('.portfolio_grid_4_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/gallery-1920-05.jpg', href: 'porfolio-post-standard.html'},
            {src: 'img/clipart/grid/col-4/gallery-1920-07.jpg', href: 'porfolio-post-image-full.html'},
            {src: 'img/clipart/grid/col-4/gallery-1920-17.jpg', href: 'porfolio-post-video-full.html'},
            {src: 'img/clipart/grid/col-4/gallery-1920-08.jpg', href: 'porfolio-post-standard.html'}
        ];

        jQuery('#list').portfolio_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.portfolio_grid_5_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-5/gallery-1920-08.jpg', href: 'porfolio-post-standard.html'}
        ];

        jQuery('#list').portfolio_listing_addon({
            load_count: 5,
            items: items_set
        });
    });

    jQuery('.portfolio_grid_margin_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/gallery-1920-05.jpg', href: 'porfolio-post-standard.html'},
            {src: 'img/clipart/grid/col-4/gallery-1920-07.jpg', href: 'porfolio-post-image-full.html'},
            {src: 'img/clipart/grid/col-4/gallery-1920-17.jpg', href: 'porfolio-post-video-full.html'},
            {src: 'img/clipart/grid/col-4/gallery-1920-08.jpg', href: 'porfolio-post-standard.html'}
        ];

        jQuery('#list').portfolio_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.portfolio_grid_title_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/gallery-1920-05.jpg', href: 'porfolio-post-standard.html', title: 'Forests'},
            {src: 'img/clipart/grid/col-4/gallery-1920-07.jpg', href: 'porfolio-post-image-full.html', title: 'Сrows'},
            {src: 'img/clipart/grid/col-4/gallery-1920-17.jpg', href: 'porfolio-post-video-full.html', title: 'Autumn Mountains'},
            {src: 'img/clipart/grid/col-4/gallery-1920-08.jpg', href: 'porfolio-post-standard.html', title: 'Green Forest'}
        ];

        jQuery('#list').portfolio_listing_addon_title({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.portfolio_masonry_margin_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/featured05.jpg', href: 'porfolio-post-standard.html'},
            {src: 'img/clipart/grid/col-4/featured07.jpg', href: 'porfolio-post-image-full.html'},
            {src: 'img/clipart/grid/col-4/featured16.jpg', href: 'porfolio-post-video-full.html'},
            {src: 'img/clipart/grid/col-4/featured08.jpg', href: 'porfolio-post-standard.html'}
        ];

        jQuery('#list').portfolio_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.portfolio_masonry_title_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/featured05.jpg', href: 'porfolio-post-standard.html', title: 'Forests'},
            {src: 'img/clipart/grid/col-4/featured07.jpg', href: 'porfolio-post-image-full.html', title: 'Сrows'},
            {src: 'img/clipart/grid/col-4/featured16.jpg', href: 'porfolio-post-video-full.html', title: 'Autumn Mountains'},
            {src: 'img/clipart/grid/col-4/featured08.jpg', href: 'porfolio-post-standard.html', title: 'Green Forest'}
        ];

        jQuery('#list').portfolio_listing_addon_title({
            load_count: 4,
            items: items_set
        });
    });

    jQuery('.portfolio_masonry_page').each(function(){
        var items_set = [
            {src: 'img/clipart/grid/col-4/featured05.jpg', href: 'porfolio-post-standard.html'},
            {src: 'img/clipart/grid/col-4/featured07.jpg', href: 'porfolio-post-image-full.html'},
            {src: 'img/clipart/grid/col-4/featured16.jpg', href: 'porfolio-post-video-full.html'},
            {src: 'img/clipart/grid/col-4/featured08.jpg', href: 'porfolio-post-standard.html'}
        ];

        jQuery('#list').portfolio_listing_addon({
            load_count: 4,
            items: items_set
        });
    });

    // Album Fullscreen
    jQuery('.album_fullscreen_page').each(function(){
        jQuery(this).height(site_height);

        slider_fade();
    });

    // Album Scattered
    jQuery('.album_scattered_page').each(function(){
        if (site_width > 1024) {
            jQuery('.gallery_scattered').width(site_width).height(site_height);
        }

        setTimeout("jQuery('.pm_scattered_layer .photo_1').removeClass('invisible')", 400);
        setTimeout("jQuery('.pm_scattered_layer .photo_2').removeClass('invisible')", 400);
        setTimeout("jQuery('.pm_scattered_layer .photo_3').removeClass('invisible')", 400);
        setTimeout("jQuery('.pm_scattered_layer .photo_4').removeClass('invisible')", 600);
        setTimeout("jQuery('.pm_scattered_layer .photo_5').removeClass('invisible')", 600);
        setTimeout("jQuery('.pm_scattered_layer .photo_6').removeClass('invisible')", 600);
        setTimeout("jQuery('.pm_scattered_layer .photo_7').removeClass('invisible')", 800);
        setTimeout("jQuery('.pm_scattered_layer .photo_8').removeClass('invisible')", 800);
        setTimeout("jQuery('.pm_scattered_layer .photo_9').removeClass('invisible')", 800);
        setTimeout("jQuery('.pm_scattered_layer .photo_10').removeClass('invisible')", 1000);
        setTimeout("jQuery('.pm_scattered_layer .photo_11').removeClass('invisible')", 1000);
        setTimeout("jQuery('.pm_scattered_layer .photo_12').removeClass('invisible')", 1000);
        setTimeout("jQuery('.pm_scattered_layer .photo_13').removeClass('invisible')", 1200);
        setTimeout("jQuery('.pm_scattered_layer .photo_14').removeClass('invisible')", 1200);
        setTimeout("jQuery('.pm_scattered_layer .photo_15').removeClass('invisible')", 1400);
        setTimeout("jQuery('.pm_scattered_layer .photo_16').removeClass('invisible')", 1400);

        var items_set = [
            {src: 'img/clipart/scattered/gallery-1920-15.jpg', layer_num: 'layer_3', photo_num: 'photo_1', popup_href: 'img/clipart/gallery-1920-15.jpg', title: 'Pines'},
            {src: 'img/clipart/scattered/gallery-1920-04.jpg', layer_num: 'layer_3', photo_num: 'photo_2', popup_href: 'img/clipart/gallery-1920-04.jpg', title: 'Mount Everest'},
            {src: 'img/clipart/scattered/gallery-1920-17.jpg', layer_num: 'layer_3', photo_num: 'photo_3', popup_href: 'img/clipart/gallery-1920-17.jpg', title: 'Autumn Adventures'},
            {src: 'img/clipart/scattered/gallery-1920-18.jpg', layer_num: 'layer_3', photo_num: 'photo_4', popup_href: 'img/clipart/gallery-1920-18.jpg', title: 'Pier'},
            {src: 'img/clipart/scattered/gallery-1920-44.jpg', layer_num: 'layer_3', photo_num: 'photo_5', popup_href: 'img/clipart/gallery-1920-44.jpg', title: 'Zenit'},
            {src: 'img/clipart/scattered/gallery-1920-19.jpg', layer_num: 'layer_3', photo_num: 'photo_6', popup_href: 'img/clipart/gallery-1920-19.jpg', title: 'Dark Mountain'},
            {src: 'img/clipart/scattered/gallery-1920-20.jpg', layer_num: 'layer_3', photo_num: 'photo_7', popup_href: 'img/clipart/gallery-1920-20.jpg', title: 'Golden Gate Bridge'},
            {src: 'img/clipart/scattered/gallery-1920-21.jpg', layer_num: 'layer_3', photo_num: 'photo_8', popup_href: 'img/clipart/gallery-1920-21.jpg', title: 'Long Way Home'},
            {src: 'img/clipart/scattered/gallery-1920-22.jpg', layer_num: 'layer_4', photo_num: 'photo_1', popup_href: 'img/clipart/gallery-1920-22.jpg', title: 'Carpathian Mountains'},
            {src: 'img/clipart/scattered/gallery-1920-23.jpg', layer_num: 'layer_4', photo_num: 'photo_2', popup_href: 'img/clipart/gallery-1920-23.jpg', title: 'Pines'},
            {src: 'img/clipart/scattered/gallery-1920-33.jpg', layer_num: 'layer_4', photo_num: 'photo_3', popup_href: 'img/clipart/gallery-1920-33.jpg', title: 'Clouds'},
            {src: 'img/clipart/scattered/gallery-1920-32.jpg', layer_num: 'layer_4', photo_num: 'photo_4', popup_href: 'img/clipart/gallery-1920-32.jpg', title: 'Sunset'},
            {src: 'img/clipart/scattered/gallery-1920-31.jpg', layer_num: 'layer_4', photo_num: 'photo_5', popup_href: 'img/clipart/gallery-1920-31.jpg', title: 'Snowy Pines'},
            {src: 'img/clipart/scattered/gallery-1920-30.jpg', layer_num: 'layer_4', photo_num: 'photo_6', popup_href: 'img/clipart/gallery-1920-30.jpg', title: 'Shore'},
            {src: 'img/clipart/scattered/gallery-1920-28.jpg', layer_num: 'layer_4', photo_num: 'photo_7', popup_href: 'img/clipart/gallery-1920-28.jpg', title: 'Summer Trip'},
            {src: 'img/clipart/scattered/gallery-1920-27.jpg', layer_num: 'layer_4', photo_num: 'photo_8', popup_href: 'img/clipart/gallery-1920-27.jpg', title: 'Mountains and Sea'},
            {src: 'img/clipart/scattered/gallery-1920-26.jpg', layer_num: 'layer_1', photo_num: 'photo_1', popup_href: 'img/clipart/gallery-1920-26.jpg', title: 'Ocean'},
            {src: 'img/clipart/scattered/gallery-1920-25.jpg', layer_num: 'layer_1', photo_num: 'photo_2', popup_href: 'img/clipart/gallery-1920-25.jpg', title: 'The Road'},
            {src: 'img/clipart/scattered/gallery-1920-24.jpg', layer_num: 'layer_1', photo_num: 'photo_3', popup_href: 'img/clipart/gallery-1920-24.jpg', title: 'Adventures'},
            {src: 'img/clipart/scattered/gallery-1920-34.jpg', layer_num: 'layer_1', photo_num: 'photo_4', popup_href: 'img/clipart/gallery-1920-34.jpg', title: 'Vanilla Sky'},
            {src: 'img/clipart/scattered/gallery-1920-35.jpg', layer_num: 'layer_1', photo_num: 'photo_5', popup_href: 'img/clipart/gallery-1920-35.jpg', title: 'Rainy Day'},
            {src: 'img/clipart/scattered/gallery-1920-36.jpg', layer_num: 'layer_1', photo_num: 'photo_6', popup_href: 'img/clipart/gallery-1920-36.jpg', title: 'Green Forest'},
            {src: 'img/clipart/scattered/gallery-1920-37.jpg', layer_num: 'layer_1', photo_num: 'photo_7', popup_href: 'img/clipart/gallery-1920-37.jpg', title: 'Pines'},
            {src: 'img/clipart/scattered/gallery-1920-38.jpg', layer_num: 'layer_1', photo_num: 'photo_8', popup_href: 'img/clipart/gallery-1920-38.jpg', title: 'Foggy Forest'},
            {src: 'img/clipart/scattered/gallery-1920-39.jpg', layer_num: 'layer_2', photo_num: 'photo_1', popup_href: 'img/clipart/gallery-1920-39.jpg', title: 'The Last Autumn Trip'},
            {src: 'img/clipart/scattered/gallery-1920-40.jpg', layer_num: 'layer_2', photo_num: 'photo_2', popup_href: 'img/clipart/gallery-1920-40.jpg', title: 'Golden Shore'},
            {src: 'img/clipart/scattered/gallery-1920-41.jpg', layer_num: 'layer_2', photo_num: 'photo_3', popup_href: 'img/clipart/gallery-1920-41.jpg', title: 'Blue Ocean'},
            {src: 'img/clipart/scattered/gallery-1920-42.jpg', layer_num: 'layer_2', photo_num: 'photo_4', popup_href: 'img/clipart/gallery-1920-42.jpg', title: 'Big Mount'},
            {src: 'img/clipart/scattered/gallery-1920-43.jpg', layer_num: 'layer_2', photo_num: 'photo_5', popup_href: 'img/clipart/gallery-1920-43.jpg', title: 'Stones'},
            {src: 'img/clipart/scattered/gallery-1920-46.jpg', layer_num: 'layer_2', photo_num: 'photo_6', popup_href: 'img/clipart/gallery-1920-46.jpg', title: 'Grasses'},
            {src: 'img/clipart/scattered/gallery-1920-48.jpg', layer_num: 'layer_2', photo_num: 'photo_7', popup_href: 'img/clipart/gallery-1920-48.jpg', title: 'Autumn Field'},
            {src: 'img/clipart/scattered/gallery-1920-45.jpg', layer_num: 'layer_2', photo_num: 'photo_8', popup_href: 'img/clipart/gallery-1920-45.jpg', title: 'Seagulls'}
        ];

        jQuery('#list').gallery_scattered_addon({
            load_count: 8,
            items: items_set
        });
    });

    // Album Video
    jQuery('.album_video_page').each(function(){
        var pm_body = jQuery('body');

        pm_body.height(site_height);

        setTimeout(slider_fade_video, 500);
    });
});

/***********************************/
/*********** WINDOW LOAD ***********/
/***********************************/
jQuery(window).on('load', (function(){
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('.pm_header').height();

    // Hide Preloader
    setTimeout("jQuery('.preloader_active').fadeOut();", 1000);

    //Share Popup Position
    jQuery(".pm_sharing_back").width(site_width).height(site_height);

    // Image Slider in Post
    jQuery('.pm_media_outout_image_listing').each(function(){
        post_image_slider();
    });

    // Album Description Page
    jQuery('.album_description_page').each(function(){
        if (site_width > 737) {
            slide_carousel();
        } else {
            jQuery('.pm_album_descriptions').prepend('<div class="pm_fullscreen_toggler"></div>');

            jQuery('.pm_fullscreen_toggler').on('click', function(){
                jQuery('.pm_header.fixed_header').toggleClass('hidden_header');
                jQuery('.pm_navigation_container').toggleClass('hidden_nav');
                jQuery('.pm_slides_title_and_likes_container').toggleClass('hidden_title_and_likes');
                jQuery(this).toggleClass('active');

                if (site_width < 769) {
                    jQuery('.pm_menu_mobile_container_wrapper').toggleClass('pm_without_margin');
                }
            });
        }
    });

    // Isotope Initialize
    isotope_setup();
    setTimeout(isotope_setup, 500);
    setTimeout(isotope_setup, 1000);
    setTimeout(isotope_setup, 2000);
    setTimeout(isotope_setup, 3000);

    listing_isotope_setup();
    setTimeout(listing_isotope_setup, 500);
    setTimeout(listing_isotope_setup, 1000);
    setTimeout(listing_isotope_setup, 2000);
    setTimeout(listing_isotope_setup, 3000);

    blog_isotope_setup();
    setTimeout(blog_isotope_setup, 500);
    setTimeout(blog_isotope_setup, 1000);
    setTimeout(blog_isotope_setup, 2000);
    setTimeout(blog_isotope_setup, 3000);

    portfolio_isotope_setup();
    setTimeout(portfolio_isotope_setup, 500);
    setTimeout(portfolio_isotope_setup, 1000);
    setTimeout(portfolio_isotope_setup, 2000);
    setTimeout(portfolio_isotope_setup, 3000);

    setTimeout("jQuery('.pm_album_grid').css('opacity', '1')", 1000);
    setTimeout("jQuery('.pm_blog_listing_container').css('opacity', '1')", 1000);
    setTimeout("jQuery('.pm_portfolio_listing_container').css('opacity', '1')", 1000);

    // Album WaterWheel
    jQuery('.album_waterwheel_page').each(function(){
        var next_button = jQuery(this).find('.pm_next_slide_button'),
            prev_button = jQuery(this).find('.pm_prev_slide_button');

        if (site_width > 737) {
            carousel_waterWheel();
            setTimeout(carousel_waterWheel, 300);
            setTimeout("jQuery('.gallery_waterwheel .pm_gallery').css('opacity', '1')", 500);

            next_button.on('click', function(){
                ww_next_slide();
            });

            prev_button.on('click', function(){
                ww_prev_slide();
            });

            /* Autoplay */
            var autoplay_status = 'on',
                slide_duration = '5000',
                intervalID;

            if (autoplay_status == 'on') {

                intervalID = setInterval(ww_next_slide, slide_duration);

                jQuery('.pm_pause_button').on('click', function(){
                    if (jQuery(this).hasClass('pm_paused')) {
                        intervalID = setInterval(ww_next_slide, slide_duration);
                        jQuery(this).removeClass('pm_paused');
                    } else {
                        clearInterval(intervalID);
                        jQuery(this).addClass('pm_paused');
                    }
                });
            } else {
                jQuery('.pm_pause_button').remove();
            }

            /* Likes */
            var current_item = jQuery('.current_item'),
                slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

            jQuery('.pm_slide_likes_wrapper').html(slide_likes);

            /* Fullscreen Mode */
            jQuery('.pm_fullscreen_toggler').on('click', function(){
                jQuery('.pm_gallery_container').toggleClass('fullscreen_mode');
                resize_waterWheel();
                setTimeout(resize_waterWheel, 100);
                setTimeout(resize_waterWheel, 200);
                setTimeout(resize_waterWheel, 300);
                setTimeout(resize_waterWheel, 400);
                setTimeout(resize_waterWheel, 500);
            });
        }
    });

    // Album Tape
    jQuery('.album_tape_page').each(function(){
        var next_button = jQuery(this).find('.pm_next_slide_button'),
            prev_button = jQuery(this).find('.pm_prev_slide_button');

        if (site_width > 737) {
            carousel_tape();
            setTimeout(carousel_tape, 300);
            setTimeout(carousel_tape, 500);

            next_button.on('click', function(){
                tape_next_slide();
            });

            prev_button.on('click', function(){
                tape_prev_slide();
            });

            /* Autoplay */
            var autoplay_status = 'on',
                slide_duration = '5000',
                intervalID;

            if (autoplay_status == 'on') {

                intervalID = setInterval(tape_next_slide, slide_duration);

                jQuery('.pm_pause_button').on('click', function(){
                    if (jQuery(this).hasClass('pm_paused')) {
                        intervalID = setInterval(tape_next_slide, slide_duration);
                        jQuery(this).removeClass('pm_paused');
                    } else {
                        clearInterval(intervalID);
                        jQuery(this).addClass('pm_paused');
                    }
                });
            } else {
                jQuery('.pm_pause_button').remove();
            }

            /* Likes */
            var current_item = jQuery('.current_item'),
                slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

            jQuery('.pm_slide_likes_wrapper').html(slide_likes);

            jQuery('.pm_fullscreen_toggler').on('click', function() {
                jQuery('.pm_gallery_container').toggleClass('fullscreen_mode');
                tape_resize();
                setTimeout(tape_resize, 100);
                setTimeout(tape_resize, 200);
                setTimeout(tape_resize, 300);
                setTimeout(tape_resize, 400);
                setTimeout(tape_resize, 500);
            });
        }
    });

    // Album Stripes
    jQuery('.album_stripes_page').each(function(){
        var slider_height = site_height - header_height - 107,
            slider_width = jQuery('.pm_stripes_wrapper').width(),
            margin_size = 10,
            items_per_page = 6,
            item_with = (slider_width + margin_size) / items_per_page;

        if (site_width > 737) {
            jQuery('.gallery_stripes').height(slider_height).css('margin-top', header_height);

            jQuery('.gallery_stripes .pm_gallery_item').width(item_with);

            pm_stripe_carousel();

            jQuery('.pm_gallery li').on({
                mouseenter: function() {
                    jQuery('.pm_stripe_item_wrapper').find('.pm_stripes_fader').css('opacity', '.7');
                    jQuery(this).find('.pm_stripes_fader').css('opacity', '0');
                },
                mouseleave: function() {
                    jQuery('.pm_stripe_item_wrapper').find('.pm_stripes_fader').css('opacity', '0');
                }
            });
        } else {
            jQuery('.pm_gallery_item').attr('onclick', '');
            jQuery('.pm_album_stripes').prepend('<div class="pm_fullscreen_toggler"></div>');

            jQuery('.pm_fullscreen_toggler').on('click', function(){
                jQuery('.pm_header.fixed_header').toggleClass('hidden_header');
                jQuery('.pm_navigation_container').toggleClass('hidden_nav');
                jQuery('.pm_slides_title_and_likes_container').toggleClass('hidden_title_and_likes');
                jQuery(this).toggleClass('active');

                if (site_width < 769) {
                    jQuery('.pm_menu_mobile_container_wrapper').toggleClass('pm_without_margin');
                }
            });
        }
    });

    // Album Portrait
    jQuery('.album_portrait_page').each(function(){
        var slider_height = site_height - header_height - 80,
            slider_container = jQuery('.pm_gallery_container');

        if (site_width > 737) {
            slider_container.height(slider_height).css('margin-top', (header_height + 40));

            jQuery('.pm_fullscreen_toggler').on('click', function(){
                if (jQuery(this).hasClass('active')) {
                    slider_height = site_height - 80;

                    slider_container.height(slider_height).css('margin-top', '40px');
                } else {
                    slider_height = site_height - header_height - 80;

                    slider_container.height(slider_height).css('margin-top', (header_height + 40));
                }
            });

            slider_fade();
        }
    });

    // Albums Listing Stripes
    jQuery('.albums_listing_stripes_page').each(function(){
        var pm_albums_height = site_height - header_height;

        jQuery('.pm_albums_stripes').width(site_width).height(pm_albums_height);
    });

    // Albums Listing Tape
    jQuery('.albums_listing_tape_page').each(function(){
        var next_button = jQuery(this).find('.pm_next_slide_button'),
            prev_button = jQuery(this).find('.pm_prev_slide_button'),
            pm_index = 107;

        listing_carousel_tape();
        setTimeout(listing_carousel_tape, 300);
        setTimeout(listing_carousel_tape, 500);

        image_post_format_container();

        jQuery('.pm_media_outout_image_listing').each(function(){
            var listing_id = jQuery(this).attr('id');

            listing_post_format_image_slider(listing_id);
        });

        // Navigation
        next_button.on('click', function(){
            listing_tape_next_slide();
        });
        prev_button.on('click', function(){
            listing_tape_prev_slide();
        });
        jQuery('.pm_gallery_item').on('click', function(){
            if (jQuery(this).hasClass('next_item')) {
                listing_tape_next_slide();
            }

            if (jQuery(this).hasClass('prev_item')) {
                listing_tape_prev_slide();
            }
        });

        /* Likes */
        var current_item = jQuery('.current_item'),
            slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

        jQuery('.pm_slide_likes_wrapper').html(slide_likes);

        /* Fullscreen Mode */
        jQuery('.pm_fullscreen_toggler').on('click', function() {
            jQuery('.pm_albums_tape_container').toggleClass('fullscreen_mode');
            listing_tape_resize(pm_index);
            setTimeout(listing_tape_resize, 100);
            setTimeout(listing_tape_resize, 200);
            setTimeout(listing_tape_resize, 300);
            setTimeout(listing_tape_resize, 400);
            setTimeout(listing_tape_resize, 500);

            setTimeout(image_post_format_container, 100);
            setTimeout(image_post_format_container, 200);
            setTimeout(image_post_format_container, 300);
            setTimeout(image_post_format_container, 400);
            setTimeout(image_post_format_container, 500);
        });
    });

    // Blog Listing Tape
    jQuery('.blog_tape_page').each(function(){
        var next_button = jQuery(this).find('.pm_next_slide_button'),
            prev_button = jQuery(this).find('.pm_prev_slide_button'),
            pm_index = 107;

        blog_listing_carousel_tape(pm_index);
        setTimeout(blog_listing_carousel_tape, 300);
        setTimeout(blog_listing_carousel_tape, 500);

        image_post_format_container();

        jQuery('.pm_media_outout_image_listing').each(function(){
            var listing_id = jQuery(this).attr('id');

            blog_listing_post_format_image_slider(listing_id);
        });

        // Navigation
        next_button.on('click', function(){
            blog_listing_tape_next_slide();
        });
        prev_button.on('click', function(){
            blog_listing_tape_prev_slide();
        });
        jQuery('.pm_gallery_item').on('click', function(){
            if (jQuery(this).hasClass('next_item')) {
                blog_listing_tape_next_slide();
            }

            if (jQuery(this).hasClass('prev_item')) {
                blog_listing_tape_prev_slide();
            }
        });

        // Likes and Comments
        var current_item = jQuery('.current_item'),
            slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach(),
            comments_link = current_item.find('.pm_temp_comment_counter').attr('data-link'),
            slide_comments = current_item.find('.pm_temp_comment_counter').html();

        jQuery('.pm_slide_likes_wrapper').html(slide_likes);
        jQuery('.pm_comments_counter').attr('href', comments_link);
        jQuery('.pm_comments_counter .pm_counter_wrapper').html(slide_comments);

        // Fullscreen Mode
        jQuery('.pm_fullscreen_toggler').on('click', function() {
            jQuery('.pm_blog_listing_tape_container').toggleClass('fullscreen_mode');
            blog_listing_tape_resize(pm_index);
            setTimeout(blog_listing_tape_resize, 100);
            setTimeout(blog_listing_tape_resize, 200);
            setTimeout(blog_listing_tape_resize, 300);
            setTimeout(blog_listing_tape_resize, 400);
            setTimeout(blog_listing_tape_resize, 500);

            setTimeout(image_post_format_container, 100);
            setTimeout(image_post_format_container, 200);
            setTimeout(image_post_format_container, 300);
            setTimeout(image_post_format_container, 400);
            setTimeout(image_post_format_container, 500);
        });
    });

    // Error 404 Page
    jQuery('.page404').each(function(){
        var container_height = site_height - header_height - 107,
            wrapper = jQuery('.pm_404_content_wrapper'),
            wrapper_height = jQuery(wrapper).height();

        if (site_width > 737) {
            jQuery('.pm_404_container').height(container_height);
            wrapper.css('margin-top', (container_height - wrapper_height) / 2);
        }

        if (site_width < 737) {
            var button_back = jQuery('.pm_404_back_button').detach();

            jQuery('.pm_404_searh_container').append(button_back);
        }
    });
}));

/*************************************/
/*********** WINDOW RESIZE ***********/
/*************************************/
jQuery(window).resize(function(){
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('.pm_header').height(),
        media_height = site_height - header_height - 80;

    // Sare Popup Position
    jQuery(".pm_sharing_back").width(site_width).height(site_height);

    // Coming Soon Page
    if (site_width > 737) {
        jQuery('.pm_coming_soon_container').height(site_height);
    }

    // Ken Burns Album Reload
    jQuery('.album_kenburns_page').each(function(){
        location.href = 'album-kenburns.html';
    });

    // Album Description Reload
    jQuery('.album_description_page').each(function(){
        if (site_width > 767 && site_width < 1025) {
            location.href = 'album-description.html';
        }
    });

    // Sizes of Fullscreen Pages Containers
    var container_height = site_height - header_height;

    jQuery('.pm_post_container').width(site_width).height(container_height);
    jQuery('.pm_content_block').height(container_height - 187);

    if (site_width > 737) {
        jQuery('.gallery_descriptions').height(container_height).css('margin-top', header_height);
    }

    jQuery('.pm_media_output_cont_wrapper').find('iframe').attr('height', media_height);

    // Form Popup
    var popup_cont = jQuery('.pm_form_popup_back');

    jQuery(popup_cont).width(site_width).height(site_height);

    jQuery('.album_fullscreen_page').height(site_height);

    if (site_width > 1024) {
        jQuery('.gallery_scattered').width(site_width).height(site_height);
    }

    // Album WaterWheel
    jQuery('.album_waterwheel_page').each(function(){
        if (site_width > 737) {
            resize_waterWheel();
            setTimeout(resize_waterWheel, 100);
            setTimeout(resize_waterWheel, 200);
            setTimeout(resize_waterWheel, 300);
            setTimeout(resize_waterWheel, 400);
            setTimeout(resize_waterWheel, 500);

            if (site_width < 1025) {
                location.href = 'album-waterwheel.html';
            }
        }
    });

    // Album Tape
    jQuery('.album_tape_page').each(function(){
        if (site_width > 737) {
            tape_resize();
            setTimeout(tape_resize, 100);
            setTimeout(tape_resize, 200);
            setTimeout(tape_resize, 300);
            setTimeout(tape_resize, 400);
            setTimeout(tape_resize, 500);

            if (site_width < 1025) {
                location.href = 'album-tape.html';
            }
        }
    });

    // Album Stripes
    jQuery('.album_stripes_page').each(function(){
        var slider_height = site_height - header_height - 107;

        if (site_width > 737) {
            jQuery('.gallery_stripes').height(slider_height).css('margin-top', header_height);
        }
    });

    // Album Portrait
    jQuery('.album_portrait_page').each(function(){
        location.href = 'album-portrait.html';
    });

    // Album Video
    jQuery('.album_video_page').each(function(){
        jQuery('body').height(site_height);

        if (site_width < 737) {
            location.href = 'album-video.html';
        }
    });

    // Albums Listing Stripes
    jQuery('.albums_listing_stripes_page').each(function(){
        var pm_albums_height = site_height - header_height;

        jQuery('.pm_albums_stripes').width(site_width).height(pm_albums_height);
    });

    // Albums Listing Tape
    jQuery('.albums_listing_tape_page').each(function(){
        if (jQuery('body').hasClass('customize-support')) {
            var pm_index = 139;
        } else {
            pm_index = 107;
        }

        listing_tape_resize(pm_index);
        setTimeout(listing_tape_resize, 100);
        setTimeout(listing_tape_resize, 200);
        setTimeout(listing_tape_resize, 300);
        setTimeout(listing_tape_resize, 400);
        setTimeout(listing_tape_resize, 500);

        setTimeout(image_post_format_container, 100);
        setTimeout(image_post_format_container, 200);
        setTimeout(image_post_format_container, 300);
        setTimeout(image_post_format_container, 400);
        setTimeout(image_post_format_container, 500);
    });

    // Blog Listing Tape
    jQuery('.blog_tape_page').each(function(){
        var pm_index = 107;

        blog_listing_tape_resize(pm_index);
        setTimeout(blog_listing_tape_resize, 100);
        setTimeout(blog_listing_tape_resize, 200);
        setTimeout(blog_listing_tape_resize, 300);
        setTimeout(blog_listing_tape_resize, 400);
        setTimeout(blog_listing_tape_resize, 500);

        setTimeout(image_post_format_container, 100);
        setTimeout(image_post_format_container, 200);
        setTimeout(image_post_format_container, 300);
        setTimeout(image_post_format_container, 400);
        setTimeout(image_post_format_container, 500);

        if (site_width < 737) {
            location.href = 'blog-tape.html';
        }
    });

    // Error 404 Page
    jQuery('.page404').each(function(){
        var container_height = site_height - header_height - 107,
            wrapper = jQuery('.pm_404_content_wrapper'),
            wrapper_height = jQuery(wrapper).height();

        if (site_width > 737) {
            jQuery('.pm_404_container').height(container_height);
            wrapper.css('margin-top', (container_height - wrapper_height) / 2);
        }
    });
});

///////////////////////////
//// Post Image Slider ////
///////////////////////////
function post_image_slider() {
    var slider_container = jQuery('.pm_media_outout_image_listing'),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length,
        slide_item = jQuery('.pm_media_outout_image_listing li'),
        intervalID,
        next_button = jQuery('.pm_media_output_cont_wrapper .pm_next_slide_button'),
        prev_button = jQuery('.pm_media_output_cont_wrapper .pm_prev_slide_button'),
        current_item,
        slide_number;

    slide_item.first().addClass('visible_slide');

    current_item = jQuery('.pm_media_outout_image_listing li.visible_slide');


    var next_thumb_back = current_item.next().attr('data-thumbnail'),
        prev_thumb_back = slide_item.last().attr('data-thumbnail');

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});


    // Autoplay
    intervalID = setInterval(post_image_next_slide, 5000);

    next_button.on({
        mouseenter: function () {
            clearInterval(intervalID);
        },
        mouseleave: function () {
            intervalID = setInterval(post_image_next_slide, 5000);
        }
    });

    prev_button.on({
        mouseenter: function () {
            clearInterval(intervalID);
        },
        mouseleave: function () {
            intervalID = setInterval(post_image_next_slide, 5000);
        }
    });

    // Navigation
    next_button.on('click', function () {
        post_image_next_slide();
    });

    prev_button.on('click', function () {
        post_image_prev_slide();
    });
}

// Next Slide //
function post_image_next_slide() {
    var slider_container = jQuery('.pm_media_outout_image_listing'),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length,
        slide_item = jQuery('.pm_media_outout_image_listing li'),
        current_item = jQuery('.pm_media_outout_image_listing li.visible_slide'),
        slide_number = current_item.attr('data-number'),
        next_button = jQuery('.pm_media_output_cont_wrapper .pm_next_slide_button'),
        prev_button = jQuery('.pm_media_output_cont_wrapper .pm_prev_slide_button');

    if (slide_number < number_of_elements) {
        jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').next().addClass('visible_slide');
    } else {
        jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
        slide_item.first().addClass('visible_slide');
    }

    // Thumbnails
    var current_item_new = slider_container.find('.visible_slide'),
        slide_number_new = current_item_new.attr('data-number'),
        next_thumb_back,
        prev_thumb_back;

    if (slide_number_new < number_of_elements) {
        next_thumb_back = current_item_new.next().attr('data-thumbnail');
        prev_thumb_back = current_item_new.prev().attr('data-thumbnail');
    } else {
        next_thumb_back = slide_item.first().attr('data-thumbnail');
        prev_thumb_back = current_item_new.prev().attr('data-thumbnail');
    }

    if (slide_number_new == '1') {
        prev_thumb_back = slide_item.last().attr('data-thumbnail');
    }

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
}

// Prev Slide //
function post_image_prev_slide() {
    var slider_container = jQuery('.pm_media_outout_image_listing'),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length,
        slide_item = jQuery('.pm_media_outout_image_listing li'),
        current_item = jQuery('.pm_media_outout_image_listing li.visible_slide'),
        slide_number = current_item.attr('data-number'),
        next_button = jQuery('.pm_media_output_cont_wrapper .pm_next_slide_button'),
        prev_button = jQuery('.pm_media_output_cont_wrapper .pm_prev_slide_button');

    if (slide_number == '1') {
        jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
        slide_item.last().addClass('visible_slide');
    } else {
        jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').prev().addClass('visible_slide');
    }

    // Thumbnails
    var current_item_new = slider_container.find('.visible_slide'),
        slide_number_new = current_item_new.attr('data-number'),
        next_thumb_back,
        prev_thumb_back;

    if (slide_number_new == '1') {
        next_thumb_back = current_item_new.next().attr('data-thumbnail');
        prev_thumb_back = slide_item.last().attr('data-thumbnail');
    } else {
        next_thumb_back = current_item_new.next().attr('data-thumbnail');
        prev_thumb_back = current_item_new.prev().attr('data-thumbnail');
    }

    if (slide_number_new == number_of_elements) {
        next_thumb_back = slide_item.first().attr('data-thumbnail');
    }

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
}

///////////////////////////////////
// Carousel on Album Description //
///////////////////////////////////
function slide_carousel() {
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        sliderList = jQuery('.pm_gallery.effect_slide'),
        slide_item = jQuery(sliderList).find('li');

    slide_item.width(site_width - 80);

    var increment = jQuery(sliderList).children().outerWidth(true),
        elmnts = jQuery(sliderList).children(),
        numElmts = elmnts.length,
        sizeFirstElmnt = increment,
        shownInViewport = Math.round(jQuery(window).width() / sizeFirstElmnt),
        firstElementOnViewPort = 1,
        isAnimating = false,
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button'),
        i;

    if (elmnts) {
        for (i = 0; i < (shownInViewport); i++) {
            jQuery(sliderList).css('width',(numElmts+shownInViewport)*increment + increment + "px");
            jQuery(sliderList).append(jQuery(elmnts[i]).clone().addClass('cloned_slide'));
        }

        slide_item.first().addClass('visible_slide');

        // Thumbnails
        var current_item = jQuery('.pm_gallery.effect_slide li.visible_slide'),
            next_thumb_back = current_item.next().attr('data-thumbnail'),
            prev_thumb_back = slide_item.last().attr('data-thumbnail');

        next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
        prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});

        // Navigation
        next_button.on('click', function(){
            slide_carousel_next_slide(isAnimating, firstElementOnViewPort, numElmts, sliderList, increment);

            if (firstElementOnViewPort > numElmts) {
                firstElementOnViewPort = 2
            } else {
                firstElementOnViewPort++;
            }
        });

        prev_button.on('click', function(){
            slide_carousel_prev_slide(isAnimating, firstElementOnViewPort, numElmts, sliderList, increment, sizeFirstElmnt);

            if (firstElementOnViewPort == 1) {
                firstElementOnViewPort = numElmts;
            } else {
                firstElementOnViewPort--;
            }
        });
    }
}

// Next Slide //
function slide_carousel_next_slide(isAnimating, firstElementOnViewPort, numElmts, sliderList, increment) {
    var slider_container = jQuery('.pm_gallery.effect_slide'),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length - 1,
        slide_item = jQuery('.pm_gallery.effect_slide li'),
        current_item = jQuery('.pm_gallery.effect_slide li.visible_slide'),
        slide_number = current_item.attr('data-number'),
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button');


    if (!isAnimating) {
        if (firstElementOnViewPort > numElmts) {
            jQuery(sliderList).css('left', "0px");
        }

        jQuery(sliderList).animate({
            left: "-=" + increment,
            y: 0,
            queue: true
        }, "swing", function(){isAnimating = false;});
        isAnimating = true;
    }

    // Current Slide
    if (slide_number < number_of_elements) {
        jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').next().addClass('visible_slide');
    } else {
        jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
        slide_item.first().addClass('visible_slide');
    }

    // Thumbnails
    var current_item_new = slider_container.find('.visible_slide'),
        slide_number_new = current_item_new.attr('data-number'),
        next_thumb_back,
        prev_thumb_back;

    if (slide_number_new < number_of_elements) {
        next_thumb_back = current_item_new.next().attr('data-thumbnail');
        prev_thumb_back = current_item_new.prev().attr('data-thumbnail');
    } else {
        next_thumb_back = slide_item.first().attr('data-thumbnail');
        prev_thumb_back = current_item_new.prev().attr('data-thumbnail');
    }

    if (slide_number_new == '1') {
        prev_thumb_back = jQuery(slider_container).find('[data-number="' + number_of_elements + '"]').attr('data-thumbnail');
    }

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
}

// Previous Slide //
function slide_carousel_prev_slide(isAnimating, firstElementOnViewPort, numElmts, sliderList, increment, sizeFirstElmnt) {
    var slider_container = jQuery('.pm_gallery.effect_slide'),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length - 1,
        slide_item = jQuery('.pm_gallery.effect_slide li'),
        current_item = jQuery('.pm_gallery.effect_slide li.visible_slide'),
        slide_number = current_item.attr('data-number'),
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button');

    if (!isAnimating) {
        if (firstElementOnViewPort == 1) {
            jQuery(sliderList).css('left', "-" + numElmts * sizeFirstElmnt + "px");
        }

        jQuery(sliderList).animate({
            left: "+=" + increment,
            y: 0,
            queue: true
        }, "swing", function(){isAnimating = false;});
        isAnimating = true;
    }

    // Current Slide
    if (slide_number == '1') {
        jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
        jQuery(slider_container).find('[data-number="' + number_of_elements + '"]').addClass('visible_slide');
    } else {
        jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').prev().addClass('visible_slide');
    }

    // Thumbnails
    var current_item_new = slider_container.find('.visible_slide'),
        slide_number_new = current_item_new.attr('data-number'),
        next_thumb_back,
        prev_thumb_back;

    if (slide_number_new == '1') {
        next_thumb_back = current_item_new.next().attr('data-thumbnail');
        prev_thumb_back = jQuery(slider_container).find('[data-number="' + number_of_elements + '"]').attr('data-thumbnail');
    } else {
        next_thumb_back = current_item_new.next().attr('data-thumbnail');
        prev_thumb_back = current_item_new.prev().attr('data-thumbnail');
    }

    if (slide_number_new == number_of_elements) {
        next_thumb_back = slide_item.first().attr('data-thumbnail');
    }

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
}

/////////////////////
//// Slider Fade (WELCOME PUSLAPIS? ) ////
/////////////////////
function slider_fade() {
    var slider_container = jQuery('.pm_gallery.effect_fade'),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length,
        slide_item = jQuery('.pm_gallery.effect_fade li'),
        intervalID,
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button'),
        autuplay_status = 'on',
        slide_duration = 6000;

    slide_item.css({'width': 100 + '%', 'height': 100 + '%'});
    slide_item.first().addClass('visible_slide');

    // Slide Title
    var current_item = jQuery('.pm_gallery.effect_fade li.visible_slide'),
        slide_title = current_item.attr('data-title'),
        slide_link = current_item.attr('data-link');

    jQuery('.pm_slide_title_wrapper').html("<a href='" + slide_link + "'>" + slide_title + "</a>");

    // Likes
    var slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

    jQuery('.pm_slide_likes_wrapper').html(slide_likes);

    // Thumbnails
    var next_thumb_back = current_item.next().attr('data-thumbnail'),
        prev_thumb_back = slide_item.last().attr('data-thumbnail');

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});

    // Autoplay
    if (autuplay_status == 'on') {
        intervalID = setInterval(next_slide, slide_duration);

        jQuery('.pm_pause_button').on('click', function(){
            if (jQuery(this).hasClass('pm_paused')) {
                intervalID = setInterval(next_slide, slide_duration);
                jQuery(this).removeClass('pm_paused');
            } else {
                clearInterval(intervalID);
                jQuery(this).addClass('pm_paused');
            }
        });
    } else {
        jQuery('.pm_pause_button').remove();
    }

    // Navigation
    next_button.on('click', function(){
        next_slide();
    });

    prev_button.on('click', function(){
        prev_slide();
    });

    // Next Slide
    function next_slide() {
        var slider_container = jQuery('.pm_gallery.effect_fade'),
            elements = jQuery(slider_container).children(),
            number_of_elements = elements.length,
            slide_item = jQuery('.pm_gallery.effect_fade li'),
            current_item = jQuery('.pm_gallery.effect_fade li.visible_slide'),
            slide_number = current_item.attr('data-number'),
            next_button = jQuery('.pm_next_slide_button'),
            prev_button = jQuery('.pm_prev_slide_button');

        if (slide_number < number_of_elements) {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').next().addClass('visible_slide');
        } else {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
            slide_item.first().addClass('visible_slide');
        }

        // Likes
        var likes_container = jQuery('.pm_slide_likes_wrapper');

        slide_likes = likes_container.find('.pm_add_like_button').detach();

        current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

        var current_item_next = slider_container.find('li.visible_slide');

        slide_likes = current_item_next.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

        likes_container.html(slide_likes);

        // Slide Title
        var slide_title = current_item_next.attr('data-title');
        var slide_link = current_item_next.attr('data-link');

        jQuery('.pm_slide_title_wrapper').html("<a href='" + slide_link + "'>" + slide_title + "</a>");

        // Thumbnails
        var current_item_new = slider_container.find('.visible_slide'),
            slide_number_new = current_item_new.attr('data-number'),
            next_thumb_back,
            prev_thumb_back;

        if (slide_number_new < number_of_elements) {
            next_thumb_back = current_item_new.next().attr('data-thumbnail');
            prev_thumb_back = current_item_new.prev().attr('data-thumbnail');
        } else {
            next_thumb_back = slide_item.first().attr('data-thumbnail');
            prev_thumb_back = current_item_new.prev().attr('data-thumbnail');
        }

        if (slide_number_new == '1') {
            prev_thumb_back = slide_item.last().attr('data-thumbnail');
        }

        next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
        prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
    }

    // Previous Slide
    function prev_slide() {
        var slider_container = jQuery('.pm_gallery.effect_fade'),
            elements = jQuery(slider_container).children(),
            number_of_elements = elements.length,
            slide_item = jQuery('.pm_gallery.effect_fade li'),
            current_item = jQuery('.pm_gallery.effect_fade li.visible_slide'),
            slide_number = current_item.attr('data-number'),
            next_button = jQuery('.pm_next_slide_button'),
            prev_button = jQuery('.pm_prev_slide_button');

        if (slide_number == '1') {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
            slide_item.last().addClass('visible_slide');
        } else {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').prev().addClass('visible_slide');
        }

        // Likes
        var likes_container = jQuery('.pm_slide_likes_wrapper');
        slide_likes = likes_container.find('.pm_add_like_button').detach();

        current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

        var current_item_next = slider_container.find('li.visible_slide');

        slide_likes = current_item_next.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

        likes_container.html(slide_likes);

        // Slide Title
        var slide_title = current_item_next.attr('data-title');
        var slide_link = current_item_next.attr('data-link');

        jQuery('.pm_slide_title_wrapper').html("<a href='" + slide_link + "'>" + slide_title + "</a>");

        // Thumbnails
        var current_item_new = slider_container.find('.visible_slide'),
            slide_number_new = current_item_new.attr('data-number'),
            next_thumb_back,
            prev_thumb_back;

        if (slide_number_new == '1') {
            next_thumb_back = current_item_new.next().attr('data-thumbnail');
            prev_thumb_back = slide_item.last().attr('data-thumbnail');
        } else {
            next_thumb_back = current_item_new.next().attr('data-thumbnail');
            prev_thumb_back = current_item_new.prev().attr('data-thumbnail');
        }

        if (slide_number_new == number_of_elements) {
            next_thumb_back = slide_item.first().attr('data-thumbnail');
        }

        next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
        prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
    }
}

//////////////////////////////////
// Scattered Album More Loading //
//////////////////////////////////
jQuery.fn.gallery_scattered_addon = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.pm_scattered_layer');

    jQuery('.pm_more_scattered_photos').on('click', function () {
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
                loaded_object = loaded_object +
                    '<div class="pm_scattered_' + addon_options.items[i].layer_num + ' added">' +
                    '<div class="pm_scattered_photo ' + addon_options.items[i].photo_num + ' invisible">' +
                    '<div class="pm_scattered_image">' +
                    '<a href="' + addon_options.items[i].popup_href + '">' +
                    '<img src="' + addon_options.items[i].src + '" alt="" />' +
                    '</a>' +
                    '</div>' +
                    '<div class="pm_scattered_description">' +
                    '<div class="pm_scattered_title pm_fleft">' + addon_options.items[i].title + '</div>' +
                    '<div class="pm_scattered_likes pm_fright">' +
                    '<div class="pm_add_like_button">' +
                    '<i class="pm_likes_icon fa fa-heart-o"></i>' +
                    '<span class="pm_likes_counter">0</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                ;
            }

            $newEls = jQuery(loaded_object);
            $container.append($newEls);

            setTimeout("jQuery('.pm_scattered_layer .photo_1').removeClass('invisible')", 400);
            setTimeout("jQuery('.pm_scattered_layer .photo_2').removeClass('invisible')", 400);
            setTimeout("jQuery('.pm_scattered_layer .photo_3').removeClass('invisible')", 400);
            setTimeout("jQuery('.pm_scattered_layer .photo_4').removeClass('invisible')", 600);
            setTimeout("jQuery('.pm_scattered_layer .photo_5').removeClass('invisible')", 600);
            setTimeout("jQuery('.pm_scattered_layer .photo_6').removeClass('invisible')", 600);
            setTimeout("jQuery('.pm_scattered_layer .photo_7').removeClass('invisible')", 800);
            setTimeout("jQuery('.pm_scattered_layer .photo_8').removeClass('invisible')", 800);
        }
    });
};

///////////////////////////////////
//// Carousel WaterWheel Setup ////
///////////////////////////////////
function carousel_waterWheel() {
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('header').height(),
        slider_height = site_height - header_height - 80,
        slider_container = jQuery('.pm_gallery_container'),
        waterWheel = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(waterWheel).children(),
        number_of_elements = elements.length;

    if (site_width > 1025) {
        waterWheel.find('img').unreflect();
    }

    slider_container.height(slider_height).css('margin-top', header_height);

    if (site_width > 1025) {
        waterWheel.height(slider_height * 0.676).css({
            'margin-top': slider_height * 0.084,
            'margin-bottom': slider_height *.24
        });
    } else {
        waterWheel.height(slider_height * 0.79).css({
            'margin-top': slider_height * 0.084,
            'margin-bottom': slider_height *.084
        });
    }

    var current_item;

    current_item = jQuery('#item_3').addClass('current_item');
    current_item.prev().addClass('prev_item').prev().addClass('prev_item_2');
    current_item.next().addClass('next_item').next().addClass('next_item_2');

    position_waterWheel();

    if (site_width > 1025) {
        waterWheel.find('img').reflect({
            height: 0.3,
            opacity: 0.3
        });

        waterWheel.find('canvas').each(function(){
            jQuery(this).width(jQuery(this).prev('img').width());
        });
    }
}

////////////////////////////////
//// Gallery Items Position ////
////////////////////////////////
function position_waterWheel() {
    var current_item = jQuery('.current_item'),
        current_item_width = current_item.find('img').width(),
        prev_item = jQuery('.prev_item'),
        next_item = jQuery('.next_item'),
        prev_item_2 = jQuery('.prev_item_2'),
        next_item_2 = jQuery('.next_item_2'),
        cur_offset = current_item_width / 2,
        prev_offset = cur_offset + (prev_item.width() * 0.605) * 0.87,
        prev_2_offset = prev_offset + (prev_item_2.width() * 0.605) * 0.74,
        next_offset = cur_offset - (next_item.width() * 0.605) * 0.87,
        next_2_offset = next_offset - (next_item_2.width() * 0.605) * 0.74;

    prev_item_2.css({'margin-left': -1 * prev_2_offset, 'margin-top': (prev_item_2.width() * 0.13) / 2});
    prev_item.css({'margin-left': -1 * prev_offset, 'margin-top': (prev_item.width() * 0.065) / 2});
    current_item.css({'margin-left': -1 * cur_offset, 'margin-top': 0});
    next_item.css({'margin-left': -1 * next_offset, 'margin-top': (next_item.width() * 0.065) / 2});
    next_item_2.css({'margin-left': -1 * next_2_offset, 'margin-top': (next_item_2.width() * 0.13) / 2});

    /*Slide Title*/
    var slide_title = current_item.attr('data-title');

    jQuery('.pm_slide_title_wrapper').html(slide_title);

    /* Prev and Next Thumbnails */
    var next_thumb_back = next_item.attr('data-thumbnail'),
        prev_thumb_back = prev_item.attr('data-thumbnail'),
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button');

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
}

////////////////////////
//// Gallery Resize ////
////////////////////////
function resize_waterWheel(){
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('header').height(),
        slider_height = site_height - header_height - 80,
        slider_container = jQuery('.pm_gallery_container'),
        waterWheel = jQuery(slider_container).find('.pm_gallery'),
        pm_body = jQuery('body');

    if (site_width > 1025) {
        waterWheel.find('img').unreflect();
    }

    if (slider_container.hasClass('fullscreen_mode')) {
        slider_height = site_height - 80;

        slider_container.height(slider_height);

        if (site_width > 1025) {
            waterWheel.height(slider_height * 0.676).css({
                'margin-top': slider_height * 0.084,
                'margin-bottom': slider_height *.24
            });
        } else {
            waterWheel.height(slider_height * 0.79).css({
                'margin-top': slider_height * 0.084,
                'margin-bottom': slider_height *.084
            });
        }
    } else {
        slider_container.height(slider_height).css('margin-top', header_height);

        if (site_width > 1025) {
            waterWheel.height(slider_height * 0.676).css({
                'margin-top': slider_height * 0.084,
                'margin-bottom': slider_height *.24
            });
        } else {
            waterWheel.height(slider_height * 0.79).css({
                'margin-top': slider_height * 0.084,
                'margin-bottom': slider_height *.084
            });
        }
    }

    var current_item = jQuery('.current_item'),
        current_item_width = current_item.find('img').width(),
        prev_item = jQuery('.prev_item'),
        next_item = jQuery('.next_item'),
        prev_item_2 = jQuery('.prev_item_2'),
        next_item_2 = jQuery('.next_item_2'),
        cur_offset = current_item_width / 2,
        prev_offset = cur_offset + (prev_item.width() * 0.605) * 0.87,
        prev_2_offset = prev_offset + (prev_item_2.width() * 0.605) * 0.74,
        next_offset = cur_offset - (next_item.width() * 0.605) * 0.87,
        next_2_offset = next_offset - (next_item_2.width() * 0.605) * 0.74;

    prev_item_2.css({'margin-left': -1 * prev_2_offset, 'margin-top': (prev_item_2.width() * 0.13) / 2});
    prev_item.css({'margin-left': -1 * prev_offset, 'margin-top': (prev_item.width() * 0.065) / 2});
    current_item.css('margin-left', -1 * cur_offset);
    next_item.css({'margin-left': -1 * next_offset, 'margin-top': (next_item.width() * 0.065) / 2});
    next_item_2.css({'margin-left': -1 * next_2_offset, 'margin-top': (next_item_2.width() * 0.13) / 2});

    if (site_width > 1025) {
        waterWheel.find('img').reflect({
            height: 0.3,
            opacity: 0.3
        });

        waterWheel.find('canvas').each(function(){
            jQuery(this).width(jQuery(this).prev('img').width());
        });
    }
}

////////////////////
//// Next Slide ////
////////////////////
function ww_next_slide() {
    var slider_container = jQuery('.pm_gallery_container'),
        waterWheel = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(waterWheel).children(),
        number_of_elements = elements.length,
        gallery_item = waterWheel.find('.pm_gallery_item'),
        current_item = waterWheel.find('.current_item'),
        prev_item = waterWheel.find('.prev_item'),
        next_item = waterWheel.find('.next_item'),
        prev_item_2 = waterWheel.find('.prev_item_2'),
        next_item_2 = waterWheel.find('.next_item_2'),
        cur_item_number = current_item.attr('data-number'),
        likes_container = jQuery('.pm_slide_likes_wrapper'),
        slide_likes = likes_container.find('.pm_add_like_button').detach();

    current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

    if (cur_item_number == (number_of_elements - 2)) {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2');
        gallery_item.first().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == (number_of_elements - 1)) {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item');
        gallery_item.first().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == number_of_elements) {
        current_item.removeClass('current_item');
        gallery_item.first().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == '1') {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item');
        gallery_item.first().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == '2') {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2');
        gallery_item.first().addClass('prev_item_2');

    } else {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');
    }

    current_item = waterWheel.find('.current_item');
    slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

    likes_container.html(slide_likes);

    position_waterWheel();
}

////////////////////
//// Prev Slide ////
////////////////////
function ww_prev_slide() {
    var slider_container = jQuery('.pm_gallery_container'),
        waterWheel = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(waterWheel).children(),
        number_of_elements = elements.length,
        gallery_item = waterWheel.find('.pm_gallery_item'),
        current_item = waterWheel.find('.current_item'),
        prev_item = waterWheel.find('.prev_item'),
        next_item = waterWheel.find('.next_item'),
        prev_item_2 = waterWheel.find('.prev_item_2'),
        next_item_2 = waterWheel.find('.next_item_2'),
        cur_item_number = current_item.attr('data-number'),
        likes_container = jQuery('.pm_slide_likes_wrapper'),
        slide_likes = likes_container.find('.pm_add_like_button').detach();

    current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

    if (cur_item_number == '3') {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2');
        gallery_item.last().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == '2') {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item');
        gallery_item.last().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == '1') {
        current_item.removeClass('current_item');
        gallery_item.last().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == number_of_elements) {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item');
        gallery_item.last().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == (number_of_elements - 1)) {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2');
        gallery_item.last().addClass('next_item_2');

    } else {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');
    }

    current_item = waterWheel.find('.current_item');
    slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

    likes_container.html(slide_likes);

    position_waterWheel();
}
////////////////////////////////////
//// End of Carousel WaterWheel ////
////////////////////////////////////

/////////////////////////////
//// Carousel Tape Setup ////
/////////////////////////////
function carousel_tape() {
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('header').height(),
        slider_height = site_height - header_height - 107,
        slider_container = jQuery('.pm_gallery_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(slider_list).children(),
        number_of_elements = elements.length,
        gallery_item = slider_list.find('.pm_gallery_item');

    slider_container.height(slider_height).css('margin-top', header_height);
    slider_list.height(slider_height * 0.91).css({
        'margin-top': slider_height * 0.044,
        'margin-bottom': slider_height * 0.044
    });

    var current_item;

    current_item = jQuery('#item_1').addClass('current_item');
    gallery_item.last().addClass('prev_item').prev().addClass('prev_item_2');
    current_item.next().addClass('next_item').next().addClass('next_item_2');

    tape_position();
}

////////////////////////////////
//// Gallery Items Position ////
////////////////////////////////
function tape_position() {
    var current_item = jQuery('.current_item'),
        current_item_width = current_item.find('img').width(),
        prev_item = jQuery('.prev_item'),
        next_item = jQuery('.next_item'),
        prev_item_2 = jQuery('.prev_item_2'),
        next_item_2 = jQuery('.next_item_2'),
        cur_offset = current_item_width / 2,
        prev_offset = cur_offset + (prev_item.find('img').width()) + 10,
        prev_2_offset = prev_offset + (prev_item_2.find('img').width()) + 10,
        next_offset = cur_offset + 10,
        next_2_offset = next_offset + next_item.find('img').width() + 10;

    prev_item_2.css({'margin-left': -1 * prev_2_offset});
    prev_item.css({'margin-left': -1 * prev_offset});
    current_item.css({'margin-left': -1 * cur_offset});
    next_item.css({'margin-left': next_offset});
    next_item_2.css({'margin-left': next_2_offset});

    /*Slide Title*/
    var slide_title = current_item.attr('data-title');

    jQuery('.pm_slide_title_wrapper').html(slide_title);

    /* Prev and Next Thumbnails */
    var next_thumb_back = next_item.attr('data-thumbnail'),
        prev_thumb_back = prev_item.attr('data-thumbnail'),
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button');

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
}

////////////////////////
//// Gallery Resize ////
////////////////////////
function tape_resize() {
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('header').height(),
        slider_height = site_height - header_height - 107,
        slider_container = jQuery('.pm_gallery_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery');

    if (slider_container.hasClass('fullscreen_mode')) {
        slider_height = site_height - 40;
        slider_container.height(slider_height).css('margin-top', '0');

        slider_list.height(slider_height).css({
            'margin-top': 40,
            'margin-bottom': 0
        });
    } else {
        slider_container.height(slider_height).css('margin-top', header_height);
        slider_list.height(slider_height * 0.91).css({
            'margin-top': slider_height * 0.044,
            'margin-bottom': slider_height * 0.044
        });
    }

    var current_item = jQuery('.current_item'),
        current_item_width = current_item.find('img').width(),
        prev_item = jQuery('.prev_item'),
        next_item = jQuery('.next_item'),
        prev_item_2 = jQuery('.prev_item_2'),
        next_item_2 = jQuery('.next_item_2'),
        cur_offset = current_item_width / 2,
        prev_offset = cur_offset + (prev_item.find('img').width()) + 10,
        prev_2_offset = prev_offset + (prev_item_2.find('img').width()) + 10,
        next_offset = cur_offset + 10,
        next_2_offset = next_offset + next_item.find('img').width() + 10;

    prev_item_2.css({'margin-left': -1 * prev_2_offset});
    prev_item.css({'margin-left': -1 * prev_offset});
    current_item.css({'margin-left': -1 * cur_offset});
    next_item.css({'margin-left': next_offset});
    next_item_2.css({'margin-left': next_2_offset});
}

////////////////////
//// Next Slide ////
////////////////////
function tape_next_slide() {
    var slider_container = jQuery('.pm_gallery_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(slider_list).children(),
        number_of_elements = elements.length,
        gallery_item = slider_list.find('.pm_gallery_item'),
        current_item = slider_list.find('.current_item'),
        prev_item = slider_list.find('.prev_item'),
        next_item = slider_list.find('.next_item'),
        prev_item_2 = slider_list.find('.prev_item_2'),
        next_item_2 = slider_list.find('.next_item_2'),
        cur_item_number = current_item.attr('data-number'),
        likes_container = jQuery('.pm_slide_likes_wrapper'),
        slide_likes = likes_container.find('.pm_add_like_button').detach();

    current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

    if (cur_item_number == (number_of_elements - 2)) {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2');
        gallery_item.first().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == (number_of_elements - 1)) {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item');
        gallery_item.first().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == number_of_elements) {
        current_item.removeClass('current_item');
        gallery_item.first().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == '1') {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item');
        gallery_item.first().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == '2') {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2');
        gallery_item.first().addClass('prev_item_2');

    } else {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');
    }

    current_item = slider_list.find('.current_item');
    slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

    likes_container.html(slide_likes);

    tape_position();
}

////////////////////
//// Prev Slide ////
////////////////////
function tape_prev_slide() {
    var slider_container = jQuery('.pm_gallery_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(slider_list).children(),
        number_of_elements = elements.length,
        gallery_item = slider_list.find('.pm_gallery_item'),
        current_item = slider_list.find('.current_item'),
        prev_item = slider_list.find('.prev_item'),
        next_item = slider_list.find('.next_item'),
        prev_item_2 = slider_list.find('.prev_item_2'),
        next_item_2 = slider_list.find('.next_item_2'),
        cur_item_number = current_item.attr('data-number'),
        likes_container = jQuery('.pm_slide_likes_wrapper'),
        slide_likes = likes_container.find('.pm_add_like_button').detach();

    current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

    if (cur_item_number == '3') {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2');
        gallery_item.last().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == '2') {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item');
        gallery_item.last().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == '1') {
        current_item.removeClass('current_item');
        gallery_item.last().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == number_of_elements) {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item');
        gallery_item.last().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == (number_of_elements - 1)) {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2');
        gallery_item.last().addClass('next_item_2');

    } else {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');
    }

    current_item = slider_list.find('.current_item');
    slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

    likes_container.html(slide_likes);

    tape_position();
}
//////////////////////////////
//// End of Carousel Tape ////
//////////////////////////////

/////////////////////////
//// Stripe Carousel ////
/////////////////////////
function pm_stripe_carousel() {
    var site_width = jQuery(window).width(),
        slider_list = jQuery('.pm_gallery'),
        increment = slider_list.find('li.pm_gallery_item').width(),
        elements = jQuery(slider_list).children(),
        number_elements = elements.length,
        elements_in_window = Math.round(jQuery(this).width() / increment),
        first_element_in_window = 1,
        isAnimating = false,
        i;

    if (elements) {
        for (i = 0; i < (elements_in_window + 1); i++) {
            jQuery(slider_list).css('width',(number_elements + elements_in_window) * increment + increment + "px");
            jQuery(slider_list).append(jQuery(elements[i]).clone().removeClass('pm_gallery_item').addClass('pm_gallery_item_clone'));
        }

        jQuery(slider_list).find('.pm_gallery_item_clone.first_item').removeClass('first_item');
        jQuery(slider_list).find('.pm_gallery_item_clone.last_item').removeClass('last_item');
    }

    // Thumbnails
    var stripe_item = jQuery('.pm_gallery_item'),
        first_item = stripe_item.first(),
        last_item = jQuery(slider_list).find('#item_6'),
        first_item_num = jQuery(first_item).attr('data-number'),
        last_item_num = jQuery(last_item).attr('data-number'),
        prev_thumb_back,
        next_thumb_back,
        all_slides = stripe_item.length,
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button');

    first_item.addClass('first_item');
    last_item.addClass('last_item');

    prev_thumb_back = stripe_item.last().attr('data-thumbnail');

    if (last_item_num < all_slides) {
        next_thumb_back = last_item.next().attr('data-thumbnail');
    } else {
        next_thumb_back = first_item.attr('data-thumbnail');
    }

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});

    // Next Slide
    next_button.on('click', function () {
        stripe_next_slide();
    });

    function stripe_next_slide() {
        if (!isAnimating) {
            if (first_element_in_window > number_elements) {
                first_element_in_window = 2;
                jQuery(slider_list).css('left', "0px");
            } else {
                first_element_in_window++;
            }

            jQuery(slider_list).animate({
                left: "-=" + increment,
                y: 0,
                queue: true
            }, "swing", function(){isAnimating = false;});
            isAnimating = true;
        }

        // Next Thumbnail
        var stripe_container = jQuery('.pm_gallery'),
            stripe_item = jQuery(stripe_container).find('.pm_gallery_item'),
            first_item = jQuery(stripe_container).find('.first_item'),
            last_item = jQuery(stripe_container).find('.last_item'),
            first_item_num = jQuery(first_item).attr('data-number'),
            last_item_num = jQuery(last_item).attr('data-number'),
            all_slides = stripe_item.length,
            next_button = jQuery('.pm_next_slide_button'),
            prev_button = jQuery('.pm_prev_slide_button'),
            new_first_item,
            new_last_item,
            prev_thumb_back,
            next_thumb_back;

        if (last_item_num < all_slides) {
            last_item.removeClass('last_item').next().addClass('last_item');
        } else {
            last_item.removeClass('last_item');
            stripe_item.first().addClass('last_item');
        }

        if (first_item_num < all_slides) {
            first_item.removeClass('first_item').next().addClass('first_item');
        } else {
            first_item.removeClass('first_item');
            stripe_item.first().addClass('first_item');
        }

        new_last_item = jQuery(stripe_container).find('.last_item');
        new_first_item = jQuery(stripe_container).find('.first_item');
        last_item_num = new_last_item.attr('data-number');
        first_item_num = new_first_item.attr('data-number');

        if (last_item_num < all_slides) {
            next_thumb_back = new_last_item.next().attr('data-thumbnail');
        } else {
            next_thumb_back = stripe_item.first().attr('data-thumbnail');
        }

        if (first_item_num !== '1') {
            prev_thumb_back = new_first_item.prev().attr('data-thumbnail');
        } else {
            prev_thumb_back = stripe_item.last().attr('data-thumbnail');
        }

        next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
        prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
    }

    // Prev Slide
    prev_button.on('click', function(){
        stripe_prev_slide();
    });

    function stripe_prev_slide() {
        if (!isAnimating) {
            if (first_element_in_window == 1) {
                jQuery(slider_list).css('left', "-" + number_elements * increment + "px");
                first_element_in_window = number_elements;
            } else {
                first_element_in_window--;
            }

            jQuery(slider_list).animate({
                left: "+=" + increment,
                y: 0,
                queue: true
            }, "swing", function(){isAnimating = false;});
            isAnimating = true;
        }

        // Prev Thumbnail
        var stripe_container = jQuery('.pm_gallery'),
            stripe_item = jQuery(stripe_container).find('.pm_gallery_item'),
            first_item = jQuery(stripe_container).find('.first_item'),
            last_item = jQuery(stripe_container).find('.last_item'),
            first_item_num = jQuery(first_item).attr('data-number'),
            last_item_num = jQuery(last_item).attr('data-number'),
            all_slides = stripe_item.length,
            next_button = jQuery('.pm_next_slide_button'),
            prev_button = jQuery('.pm_prev_slide_button'),
            new_first_item,
            new_last_item,
            prev_thumb_back,
            next_thumb_back;

        if (last_item_num !== '1') {
            last_item.removeClass('last_item').prev().addClass('last_item');
        } else {
            last_item.removeClass('last_item');
            stripe_item.last().addClass('last_item');
        }

        if (first_item_num !== '1') {
            first_item.removeClass('first_item').prev().addClass('first_item');
        } else {
            first_item.removeClass('first_item');
            stripe_item.last().addClass('first_item');
        }

        new_last_item = jQuery(stripe_container).find('.last_item');
        new_first_item = jQuery(stripe_container).find('.first_item');
        last_item_num = new_last_item.attr('data-number');
        first_item_num = new_first_item.attr('data-number');

        if (last_item_num < all_slides) {
            next_thumb_back = new_last_item.next().attr('data-thumbnail');
        } else {
            next_thumb_back = stripe_item.first().attr('data-thumbnail');
        }

        if (first_item_num !== '1') {
            prev_thumb_back = new_first_item.prev().attr('data-thumbnail');
        } else {
            prev_thumb_back = stripe_item.last().attr('data-thumbnail');
        }

        next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
        prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
    }

    /* Autoplay */
    var autoplay_status = 'on',
        slide_duration = '5000',
        intervalID;

    if (autoplay_status == 'on') {

        intervalID = setInterval(stripe_next_slide, slide_duration);

        jQuery('.pm_pause_button').on('click', function(){
            if (jQuery(this).hasClass('pm_paused')) {
                intervalID = setInterval(stripe_next_slide, slide_duration);
                jQuery(this).removeClass('pm_paused');
            } else {
                clearInterval(intervalID);
                jQuery(this).addClass('pm_paused');
            }
        });
    } else {
        jQuery('.pm_pause_button').remove();
    }
}

/////////////////////////////////////
//// Slider Fade for Video Album ////
/////////////////////////////////////
function slider_fade_video() {
    var slider_container = jQuery('.pm_gallery.effect_fade'),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length,
        slide_item = jQuery('.pm_gallery.effect_fade li'),
        intervalID,
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button'),
        site_width = jQuery(window).width(),
        site_height = jQuery(window).height();

    slide_item.css({'width': 100 + '%', 'height': 100 + '%'});
    slide_item.first().addClass('visible_slide').css('z-index', '10');

    var current_item = jQuery('.pm_gallery.effect_fade li.visible_slide'),
        video_player_link = jQuery(current_item).find('.pm_video_link').html();

    jQuery(current_item).find('.pm_video_wrapper').html(video_player_link);

    var video_player = jQuery('.pm_video_wrapper > iframe');

    if (site_width > 1024) {
        if (((site_height + 150) / 9) * 16 > site_width) {
            var player_width = ((site_height + 150) / 9) * 16,
                player_height = site_height + 150;

            video_player.width(player_width).height(player_height);
            video_player.css({'margin-left': -1 * (player_width / 2) + 'px', 'margin-top': '0px', 'top': '-75px'});
        } else {
            player_height = ((site_width / 16) * 9);

            video_player.width(site_width).height(player_height);
            video_player.css({'margin-left': -1 * (player_width / 2) + 'px', 'margin-top': -1 * (player_height / 2) + 'px', 'top': '50%', 'left': '0'});
        }
    } else {
        video_player.width(site_width).height(site_height);
        video_player.css({'margin-left': '0', 'margin-top': '0', 'left': '0', 'top': '0'});
    }

    var likes_container = jQuery('.pm_slide_likes_wrapper'),
        slide_likes = likes_container.find('.pm_add_like_button').detach();

    // Navigation
    next_button.on('click', function(){
        next_slide();
    });

    prev_button.on('click', function(){
        prev_slide();
    });


    // Next Slide
    function next_slide() {
        var slider_container = jQuery('.pm_gallery.effect_fade'),
            elements = jQuery(slider_container).children(),
            number_of_elements = elements.length,
            slide_item = jQuery('.pm_gallery.effect_fade li'),
            current_item = jQuery('.pm_gallery.effect_fade li.visible_slide'),
            slide_number = current_item.attr('data-number'),
            next_button = jQuery('.pm_next_slide_button'),
            prev_button = jQuery('.pm_prev_slide_button');

        current_item.css('z-index', '0');
        jQuery(current_item).find('.pm_video_wrapper').html('');

        if (slide_number < number_of_elements) {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').next().addClass('visible_slide');
        } else {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
            slide_item.first().addClass('visible_slide');
        }

        current_item = slider_container.find('li.visible_slide');
        video_player_link = jQuery(current_item).find('.pm_video_link').html();

        jQuery(current_item).find('.pm_video_wrapper').html(video_player_link);

        video_player = jQuery('.pm_video_wrapper > iframe');

        if (site_width > 1024) {
            if (((site_height + 150) / 9) * 16 > site_width) {
                var player_width = ((site_height + 150) / 9) * 16,
                    player_height = site_height + 150;

                video_player.width(player_width).height(player_height);
                video_player.css({'margin-left': -1 * (player_width / 2) + 'px', 'margin-top': '0px', 'top': '-75px'});
            } else {
                player_height = ((site_width / 16) * 9);

                video_player.width(site_width).height(player_height);
                video_player.css({'margin-left': -1 * (player_width / 2) + 'px', 'margin-top': -1 * (player_height / 2) + 'px', 'top': '50%', 'left': '0'});
            }
        } else {
            video_player.width(site_width).height(site_height);
            video_player.css({'margin-left': '0', 'margin-top': '0', 'left': '0', 'top': '0'});
        }

        current_item.css('z-index', '10');

        // Likes
        slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

        likes_container.html(slide_likes);
    }

    // Previous Slide
    function prev_slide() {
        var slider_container = jQuery('.pm_gallery.effect_fade'),
            elements = jQuery(slider_container).children(),
            number_of_elements = elements.length,
            slide_item = jQuery('.pm_gallery.effect_fade li'),
            current_item = jQuery('.pm_gallery.effect_fade li.visible_slide'),
            slide_number = current_item.attr('data-number'),
            next_button = jQuery('.pm_next_slide_button'),
            prev_button = jQuery('.pm_prev_slide_button');

        current_item.css('z-index', '0');
        jQuery(current_item).find('.pm_video_wrapper').html('');

        if (slide_number == '1') {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
            slide_item.last().addClass('visible_slide');
        } else {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').prev().addClass('visible_slide');
        }

        current_item = slider_container.find('li.visible_slide');
        video_player_link = jQuery(current_item).find('.pm_video_link').html();

        jQuery(current_item).find('.pm_video_wrapper').html(video_player_link);

        video_player = jQuery('.pm_video_wrapper > iframe');

        if (site_width > 1024) {
            if (((site_height + 150) / 9) * 16 > site_width) {
                var player_width = ((site_height + 150) / 9) * 16,
                    player_height = site_height + 150;

                video_player.width(player_width).height(player_height);
                video_player.css({'margin-left': -1 * (player_width / 2) + 'px', 'margin-top': '0px', 'top': '-75px'});
            } else {
                player_height = ((site_width / 16) * 9);

                video_player.width(site_width).height(player_height);
                video_player.css({'margin-left': -1 * (player_width / 2) + 'px', 'margin-top': -1 * (player_height / 2) + 'px', 'top': '50%', 'left': '0'});
            }
        } else {
            video_player.width(site_width).height(site_height);
            video_player.css({'margin-left': '0', 'margin-top': '0', 'left': '0', 'top': '0'});
        }

        current_item.css('z-index', '10');
    }
}
////////////////////////////////////////////
//// End of Slider Fade for Video Album ////
////////////////////////////////////////////

/////////////////////////////////////
//// Listing Carousel Tape Setup ////
/////////////////////////////////////
function listing_carousel_tape() {
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('header').height(),
        slider_container = jQuery('.pm_albums_tape_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(slider_list).children(),
        number_of_elements = elements.length,
        gallery_item = slider_list.find('.pm_gallery_item'),
        gallery_image_width = jQuery(gallery_item).find('img').width();

    if (jQuery('body').hasClass('customize-support')) {
        var slider_height = site_height - header_height - 139;
    } else {
        slider_height = site_height - header_height - 107;
    }

    if (site_width < 737) {
        slider_height = site_height - header_height - 60;
    }

    slider_container.height(slider_height).css('margin-top', header_height);
    slider_list.height(slider_height * 0.91).css({
        'margin-top': slider_height * 0.044,
        'margin-bottom': slider_height * 0.044
    });

    gallery_item.width(gallery_image_width);
    gallery_item.find('.pm_media_output_cont_wrapper').width(gallery_image_width);

    var current_item;

    current_item = jQuery('#item_1').addClass('current_item');
    gallery_item.last().addClass('prev_item').prev().addClass('prev_item_2');
    current_item.next().addClass('next_item').next().addClass('next_item_2');

    listing_tape_position();
}

////////////////////////////////////////
//// Listing Gallery Items Position ////
////////////////////////////////////////
function listing_tape_position() {
    var current_item = jQuery('.current_item'),
        current_item_width = current_item.find('img').width(),
        prev_item = jQuery('.prev_item'),
        next_item = jQuery('.next_item'),
        prev_item_2 = jQuery('.prev_item_2'),
        next_item_2 = jQuery('.next_item_2'),
        cur_offset = current_item_width / 2,
        prev_offset = cur_offset + (prev_item.find('img').width()) + 10,
        prev_2_offset = prev_offset + (prev_item_2.find('img').width()) + 10,
        next_offset = cur_offset + 10,
        next_2_offset = next_offset + next_item.find('img').width() + 10;

    prev_item_2.css({'margin-left': -1 * prev_2_offset});
    prev_item.css({'margin-left': -1 * prev_offset});
    current_item.css({'margin-left': -1 * cur_offset});
    next_item.css({'margin-left': next_offset});
    next_item_2.css({'margin-left': next_2_offset});

    /*Slide Title*/
    var slide_title = current_item.attr('data-title');

    jQuery('.pm_slide_title_wrapper').html(slide_title);

    /* Prev and Next Thumbnails */
    var next_thumb_back = next_item.attr('data-thumbnail'),
        prev_thumb_back = prev_item.attr('data-thumbnail'),
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button');

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
}

////////////////////////////////
//// Listing Gallery Resize ////
////////////////////////////////
function listing_tape_resize(i) {
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('header').height(),
        slider_height = site_height - header_height - i,
        slider_container = jQuery('.pm_albums_tape_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery');

    if (site_width < 737) {
        slider_height = site_height - header_height - 60;
    }

    if (slider_container.hasClass('fullscreen_mode')) {
        slider_height = site_height - 40;
        slider_container.height(slider_height).css('margin-top', '0');

        if (jQuery('body').hasClass('customize-support')) {
            slider_list.height(slider_height).css({
                'margin-top': 8,
                'margin-bottom': 0
            });
        } else {
            slider_list.height(slider_height).css({
                'margin-top': 40,
                'margin-bottom': 0
            });
        }

    } else {
        slider_container.height(slider_height).css('margin-top', header_height);
        slider_list.height(slider_height * 0.91).css({
            'margin-top': slider_height * 0.044,
            'margin-bottom': slider_height * 0.044
        });
    }

    var current_item = jQuery('.current_item'),
        current_item_width = current_item.find('img').width(),
        prev_item = jQuery('.prev_item'),
        next_item = jQuery('.next_item'),
        prev_item_2 = jQuery('.prev_item_2'),
        next_item_2 = jQuery('.next_item_2'),
        cur_offset = current_item_width / 2,
        prev_offset = cur_offset + (prev_item.find('img').width()) + 10,
        prev_2_offset = prev_offset + (prev_item_2.find('img').width()) + 10,
        next_offset = cur_offset + 10,
        next_2_offset = next_offset + next_item.find('img').width() + 10;

    prev_item_2.css({'margin-left': -1 * prev_2_offset});
    prev_item.css({'margin-left': -1 * prev_offset});
    current_item.css({'margin-left': -1 * cur_offset});
    next_item.css({'margin-left': next_offset});
    next_item_2.css({'margin-left': next_2_offset});
}

////////////////////
//// Next Slide ////
////////////////////
function listing_tape_next_slide() {
    var slider_container = jQuery('.pm_albums_tape_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(slider_list).children(),
        number_of_elements = elements.length,
        gallery_item = slider_list.find('.pm_gallery_item'),
        current_item = slider_list.find('.current_item'),
        prev_item = slider_list.find('.prev_item'),
        next_item = slider_list.find('.next_item'),
        prev_item_2 = slider_list.find('.prev_item_2'),
        next_item_2 = slider_list.find('.next_item_2'),
        cur_item_number = current_item.attr('data-number'),
        likes_container = jQuery('.pm_slide_likes_wrapper'),
        slide_likes = likes_container.find('.pm_add_like_button').detach();

    current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

    if (cur_item_number == (number_of_elements - 2)) {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2');
        gallery_item.first().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == (number_of_elements - 1)) {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item');
        gallery_item.first().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == number_of_elements) {
        current_item.removeClass('current_item');
        gallery_item.first().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == '1') {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item');
        gallery_item.first().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == '2') {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2');
        gallery_item.first().addClass('prev_item_2');

    } else {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');
    }

    current_item = slider_list.find('.current_item');
    slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

    likes_container.html(slide_likes);

    listing_tape_position();
}

////////////////////
//// Prev Slide ////
////////////////////
function listing_tape_prev_slide() {
    var slider_container = jQuery('.pm_albums_tape_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(slider_list).children(),
        number_of_elements = elements.length,
        gallery_item = slider_list.find('.pm_gallery_item'),
        current_item = slider_list.find('.current_item'),
        prev_item = slider_list.find('.prev_item'),
        next_item = slider_list.find('.next_item'),
        prev_item_2 = slider_list.find('.prev_item_2'),
        next_item_2 = slider_list.find('.next_item_2'),
        cur_item_number = current_item.attr('data-number'),
        likes_container = jQuery('.pm_slide_likes_wrapper'),
        slide_likes = likes_container.find('.pm_add_like_button').detach();

    current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

    if (cur_item_number == '3') {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2');
        gallery_item.last().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == '2') {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item');
        gallery_item.last().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == '1') {
        current_item.removeClass('current_item');
        gallery_item.last().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == number_of_elements) {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item');
        gallery_item.last().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == (number_of_elements - 1)) {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2');
        gallery_item.last().addClass('next_item_2');

    } else {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');
    }

    current_item = slider_list.find('.current_item');
    slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();

    likes_container.html(slide_likes);

    listing_tape_position();
}

//////////////////////////////
// Post Format Image Slider //
//////////////////////////////
function listing_post_format_image_slider(i) {
    var listing_id = '#' + i,
        slider_container = jQuery(listing_id),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length,
        slide_item = jQuery(slider_container).find('li'),
        intervalID,
        next_button = jQuery(slider_container).parent().parent().find('.pm_prev_image_slide_button'),
        prev_button = jQuery(".pm_media_output_cont_wrapper .pm_prev_slide_button"),
        current_item,
        slide_number;

    slide_item.first().addClass("visible");

    // Navigation
    slider_container.parent().parent().find('.pm_prev_image_slide_button').on('click', function(){
        current_item = jQuery(slider_container).find('li.visible');
        slide_number = current_item.attr('data-number');

        if (slide_number == "1") {
            jQuery(slider_container).find("li.visible").removeClass("visible");
            slide_item.last().addClass('visible');
        } else {
            jQuery(slider_container).find("li.visible").removeClass("visible").prev().addClass("visible");
        }
    });

    slider_container.parent().parent().find('.pm_next_image_slide_button').on('click', function(){
        current_item = jQuery(slider_container).find('li.visible');
        slide_number = current_item.attr('data-number');

        if (slide_number < number_of_elements) {
            jQuery(slider_container).find("li.visible").removeClass("visible").next().addClass("visible");
        } else {
            jQuery(slider_container).find("li.visible").removeClass("visible");
            slide_item.first().addClass("visible");
        }
    });
}
////////////////////////////////////////////
//// End of Listing Carousel Tape Setup ////
////////////////////////////////////////////

//////////////////////////////////////////
//// Blog Listing Carousel Tape Setup ////
//////////////////////////////////////////
function blog_listing_carousel_tape(i) {
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('header').height(),
        slider_height = site_height - header_height - i,
        slider_container = jQuery('.pm_blog_listing_tape_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(slider_list).children(),
        number_of_elements = elements.length,
        gallery_item = slider_list.find('.pm_gallery_item'),
        gallery_image_width = jQuery(gallery_item).find('img').width();

    if (site_width < 737) {
        slider_height = site_height - header_height - 60;
    }

    slider_container.height(slider_height).css('margin-top', header_height);
    slider_list.height(slider_height * 0.91).css({
        'margin-top': slider_height * 0.044,
        'margin-bottom': slider_height * 0.044
    });

    gallery_item.width(gallery_image_width);
    gallery_item.find('.pm_media_output_cont_wrapper').width(gallery_image_width);

    var current_item;

    current_item = jQuery('#item_1').addClass('current_item');
    gallery_item.last().addClass('prev_item').prev().addClass('prev_item_2');
    current_item.next().addClass('next_item').next().addClass('next_item_2');

    blog_listing_tape_position();
}

/////////////////////////////////////////////
//// Blog Listing Gallery Items Position ////
/////////////////////////////////////////////
function blog_listing_tape_position() {
    var current_item = jQuery('.current_item'),
        current_item_width = current_item.find('img').width(),
        prev_item = jQuery('.prev_item'),
        next_item = jQuery('.next_item'),
        prev_item_2 = jQuery('.prev_item_2'),
        next_item_2 = jQuery('.next_item_2'),
        cur_offset = current_item_width / 2,
        prev_offset = cur_offset + (prev_item.find('img').width()) + 10,
        prev_2_offset = prev_offset + (prev_item_2.find('img').width()) + 10,
        next_offset = cur_offset + 10,
        next_2_offset = next_offset + next_item.find('img').width() + 10;

    prev_item_2.css({'margin-left': -1 * prev_2_offset});
    prev_item.css({'margin-left': -1 * prev_offset});
    current_item.css({'margin-left': -1 * cur_offset});
    next_item.css({'margin-left': next_offset});
    next_item_2.css({'margin-left': next_2_offset});

    /*Slide Title*/
    var slide_title = current_item.attr('data-title');

    jQuery('.pm_slide_title_wrapper').html(slide_title);

    /* Prev and Next Thumbnails */
    var next_thumb_back = next_item.attr('data-thumbnail'),
        prev_thumb_back = prev_item.attr('data-thumbnail'),
        next_button = jQuery('.pm_next_slide_button'),
        prev_button = jQuery('.pm_prev_slide_button');

    next_button.find('.pm_next_thumb_cont').css({'background-image': 'url(' + next_thumb_back + ')'});
    prev_button.find('.pm_prev_thumb_cont').css({'background-image': 'url(' + prev_thumb_back + ')'});
}

/////////////////////////////////////
//// Blog Listing Gallery Resize ////
/////////////////////////////////////
function blog_listing_tape_resize(i) {
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('header').height(),
        slider_height = site_height - header_height - i,
        slider_container = jQuery('.pm_blog_listing_tape_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        gallery_item = slider_list.find('.pm_gallery_item'),
        gallery_image_width = jQuery(gallery_item).find('img').width();

    if (site_width < 737) {
        slider_height = site_height - header_height - 60;
    }

    if (slider_container.hasClass('fullscreen_mode')) {
        slider_height = site_height - 40;
        slider_container.height(slider_height).css('margin-top', '0');

        slider_list.height(slider_height).css({
            'margin-top': 40,
            'margin-bottom': 0
        });
    } else {
        slider_container.height(slider_height).css('margin-top', header_height);
        slider_list.height(slider_height * 0.91).css({
            'margin-top': slider_height * 0.044,
            'margin-bottom': slider_height * 0.044
        });
    }

    gallery_item.width(gallery_image_width);

    var current_item = jQuery('.current_item'),
        current_item_width = current_item.find('img').width(),
        prev_item = jQuery('.prev_item'),
        next_item = jQuery('.next_item'),
        prev_item_2 = jQuery('.prev_item_2'),
        next_item_2 = jQuery('.next_item_2'),
        cur_offset = current_item_width / 2,
        prev_offset = cur_offset + (prev_item.find('img').width()) + 10,
        prev_2_offset = prev_offset + (prev_item_2.find('img').width()) + 10,
        next_offset = cur_offset + 10,
        next_2_offset = next_offset + next_item.find('img').width() + 10;

    prev_item_2.css({'margin-left': -1 * prev_2_offset});
    prev_item.css({'margin-left': -1 * prev_offset});
    current_item.css({'margin-left': -1 * cur_offset});
    next_item.css({'margin-left': next_offset});
    next_item_2.css({'margin-left': next_2_offset});
}

////////////////////
//// Next Slide ////
////////////////////
function blog_listing_tape_next_slide() {
    var slider_container = jQuery('.pm_blog_listing_tape_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(slider_list).children(),
        number_of_elements = elements.length,
        gallery_item = slider_list.find('.pm_gallery_item'),
        current_item = slider_list.find('.current_item'),
        prev_item = slider_list.find('.prev_item'),
        next_item = slider_list.find('.next_item'),
        prev_item_2 = slider_list.find('.prev_item_2'),
        next_item_2 = slider_list.find('.next_item_2'),
        cur_item_number = current_item.attr('data-number'),
        likes_container = jQuery('.pm_slide_likes_wrapper'),
        slide_likes = likes_container.find('.pm_add_like_button').detach(),
        comments_link,
        slide_comments;

    current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

    if (cur_item_number == (number_of_elements - 2)) {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2');
        gallery_item.first().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == (number_of_elements - 1)) {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item');
        gallery_item.first().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == number_of_elements) {
        current_item.removeClass('current_item');
        gallery_item.first().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == '1') {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item');
        gallery_item.first().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');

    } else if (cur_item_number == '2') {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2');
        gallery_item.first().addClass('prev_item_2');

    } else {
        current_item.removeClass('current_item').next().addClass('current_item');
        next_item.removeClass('next_item').next().addClass('next_item');
        next_item_2.removeClass('next_item_2').next().addClass('next_item_2');
        prev_item.removeClass('prev_item').next().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').next().addClass('prev_item_2');
    }

    // Likes and Comments
    current_item = slider_list.find('.current_item');
    slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();
    comments_link = current_item.find('.pm_temp_comment_counter').attr('data-link');
    slide_comments = current_item.find('.pm_temp_comment_counter').html();

    likes_container.html(slide_likes);

    jQuery('.pm_comments_counter').attr('href', comments_link);
    jQuery('.pm_comments_counter .pm_counter_wrapper').html(slide_comments);

    blog_listing_tape_position();
}

////////////////////
//// Prev Slide ////
////////////////////
function blog_listing_tape_prev_slide() {
    var slider_container = jQuery('.pm_blog_listing_tape_container'),
        slider_list = jQuery(slider_container).find('.pm_gallery'),
        elements = jQuery(slider_list).children(),
        number_of_elements = elements.length,
        gallery_item = slider_list.find('.pm_gallery_item'),
        current_item = slider_list.find('.current_item'),
        prev_item = slider_list.find('.prev_item'),
        next_item = slider_list.find('.next_item'),
        prev_item_2 = slider_list.find('.prev_item_2'),
        next_item_2 = slider_list.find('.next_item_2'),
        cur_item_number = current_item.attr('data-number'),
        likes_container = jQuery('.pm_slide_likes_wrapper'),
        slide_likes = likes_container.find('.pm_add_like_button').detach(),
        comments_link,
        slide_comments;

    current_item.find('.pm_temp_likes_wrapper').html(slide_likes);

    if (cur_item_number == '3') {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2');
        gallery_item.last().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == '2') {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item');
        gallery_item.last().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == '1') {
        current_item.removeClass('current_item');
        gallery_item.last().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == number_of_elements) {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item');
        gallery_item.last().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');

    } else if (cur_item_number == (number_of_elements - 1)) {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2');
        gallery_item.last().addClass('next_item_2');

    } else {
        current_item.removeClass('current_item').prev().addClass('current_item');
        prev_item.removeClass('prev_item').prev().addClass('prev_item');
        prev_item_2.removeClass('prev_item_2').prev().addClass('prev_item_2');
        next_item.removeClass('next_item').prev().addClass('next_item');
        next_item_2.removeClass('next_item_2').prev().addClass('next_item_2');
    }

    // Likes and Comments
    current_item = slider_list.find('.current_item');
    slide_likes = current_item.find('.pm_temp_likes_wrapper .pm_add_like_button').detach();
    comments_link = current_item.find('.pm_temp_comment_counter').attr('data-link');
    slide_comments = current_item.find('.pm_temp_comment_counter').html();

    likes_container.html(slide_likes);

    jQuery('.pm_comments_counter').attr('href', comments_link);
    jQuery('.pm_comments_counter .pm_counter_wrapper').html(slide_comments);

    blog_listing_tape_position();
}

//////////////////////////////
// Post Format Image Slider //
//////////////////////////////
function blog_listing_post_format_image_slider(i) {
    var listing_id = '#' + i,
        slider_container = jQuery(listing_id),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length,
        slide_item = jQuery(slider_container).find('li'),
        intervalID,
        next_button = jQuery(slider_container).parent().parent().find('.pm_prev_image_slide_button'),
        prev_button = jQuery(".pm_media_output_cont_wrapper .pm_prev_slide_button"),
        current_item,
        slide_number;

    slide_item.first().addClass("visible");

    // Navigation
    slider_container.parent().parent().find('.pm_prev_image_slide_button').on('click', function(){
        current_item = jQuery(slider_container).find('li.visible');
        slide_number = current_item.attr('data-number');

        if (slide_number == "1") {
            jQuery(slider_container).find("li.visible").removeClass("visible");
            slide_item.last().addClass('visible');
        } else {
            jQuery(slider_container).find("li.visible").removeClass("visible").prev().addClass("visible");
        }
    });

    slider_container.parent().parent().find('.pm_next_image_slide_button').on('click', function(){
        current_item = jQuery(slider_container).find('li.visible');
        slide_number = current_item.attr('data-number');

        if (slide_number < number_of_elements) {
            jQuery(slider_container).find("li.visible").removeClass("visible").next().addClass("visible");
        } else {
            jQuery(slider_container).find("li.visible").removeClass("visible");
            slide_item.first().addClass("visible");
        }
    });
}
/////////////////////////////////////////////////
//// End of Blog Listing Carousel Tape Setup ////
/////////////////////////////////////////////////

/*!
 * Isotope PACKAGED v2.1.1
 * Filter & sort magical layouts
 * http://isotope.metafizzy.co
 */

(function(t){function e(){}function i(t){function i(e){e.prototype.option||(e.prototype.option=function(e){t.isPlainObject(e)&&(this.options=t.extend(!0,this.options,e))})}function n(e,i){t.fn[e]=function(n){if("string"==typeof n){for(var s=o.call(arguments,1),a=0,u=this.length;u>a;a++){var p=this[a],h=t.data(p,e);if(h)if(t.isFunction(h[n])&&"_"!==n.charAt(0)){var f=h[n].apply(h,s);if(void 0!==f)return f}else r("no such method '"+n+"' for "+e+" instance");else r("cannot call methods on "+e+" prior to initialization; "+"attempted to call '"+n+"'")}return this}return this.each(function(){var o=t.data(this,e);o?(o.option(n),o._init()):(o=new i(this,n),t.data(this,e,o))})}}if(t){var r="undefined"==typeof console?e:function(t){console.error(t)};return t.bridget=function(t,e){i(e),n(t,e)},t.bridget}}var o=Array.prototype.slice;"function"==typeof define&&define.amd?define("jquery-bridget/jquery.bridget",["jquery"],i):"object"==typeof exports?i(require("jquery")):i(t.jQuery)})(window),function(t){function e(e){var i=t.event;return i.target=i.target||i.srcElement||e,i}var i=document.documentElement,o=function(){};i.addEventListener?o=function(t,e,i){t.addEventListener(e,i,!1)}:i.attachEvent&&(o=function(t,i,o){t[i+o]=o.handleEvent?function(){var i=e(t);o.handleEvent.call(o,i)}:function(){var i=e(t);o.call(t,i)},t.attachEvent("on"+i,t[i+o])});var n=function(){};i.removeEventListener?n=function(t,e,i){t.removeEventListener(e,i,!1)}:i.detachEvent&&(n=function(t,e,i){t.detachEvent("on"+e,t[e+i]);try{delete t[e+i]}catch(o){t[e+i]=void 0}});var r={bind:o,unbind:n};"function"==typeof define&&define.amd?define("eventie/eventie",r):"object"==typeof exports?module.exports=r:t.eventie=r}(this),function(t){function e(t){"function"==typeof t&&(e.isReady?t():s.push(t))}function i(t){var i="readystatechange"===t.type&&"complete"!==r.readyState;e.isReady||i||o()}function o(){e.isReady=!0;for(var t=0,i=s.length;i>t;t++){var o=s[t];o()}}function n(n){return"complete"===r.readyState?o():(n.bind(r,"DOMContentLoaded",i),n.bind(r,"readystatechange",i),n.bind(t,"load",i)),e}var r=t.document,s=[];e.isReady=!1,"function"==typeof define&&define.amd?define("doc-ready/doc-ready",["eventie/eventie"],n):"object"==typeof exports?module.exports=n(require("eventie")):t.docReady=n(t.eventie)}(window),function(){function t(){}function e(t,e){for(var i=t.length;i--;)if(t[i].listener===e)return i;return-1}function i(t){return function(){return this[t].apply(this,arguments)}}var o=t.prototype,n=this,r=n.EventEmitter;o.getListeners=function(t){var e,i,o=this._getEvents();if(t instanceof RegExp){e={};for(i in o)o.hasOwnProperty(i)&&t.test(i)&&(e[i]=o[i])}else e=o[t]||(o[t]=[]);return e},o.flattenListeners=function(t){var e,i=[];for(e=0;t.length>e;e+=1)i.push(t[e].listener);return i},o.getListenersAsObject=function(t){var e,i=this.getListeners(t);return i instanceof Array&&(e={},e[t]=i),e||i},o.addListener=function(t,i){var o,n=this.getListenersAsObject(t),r="object"==typeof i;for(o in n)n.hasOwnProperty(o)&&-1===e(n[o],i)&&n[o].push(r?i:{listener:i,once:!1});return this},o.on=i("addListener"),o.addOnceListener=function(t,e){return this.addListener(t,{listener:e,once:!0})},o.once=i("addOnceListener"),o.defineEvent=function(t){return this.getListeners(t),this},o.defineEvents=function(t){for(var e=0;t.length>e;e+=1)this.defineEvent(t[e]);return this},o.removeListener=function(t,i){var o,n,r=this.getListenersAsObject(t);for(n in r)r.hasOwnProperty(n)&&(o=e(r[n],i),-1!==o&&r[n].splice(o,1));return this},o.off=i("removeListener"),o.addListeners=function(t,e){return this.manipulateListeners(!1,t,e)},o.removeListeners=function(t,e){return this.manipulateListeners(!0,t,e)},o.manipulateListeners=function(t,e,i){var o,n,r=t?this.removeListener:this.addListener,s=t?this.removeListeners:this.addListeners;if("object"!=typeof e||e instanceof RegExp)for(o=i.length;o--;)r.call(this,e,i[o]);else for(o in e)e.hasOwnProperty(o)&&(n=e[o])&&("function"==typeof n?r.call(this,o,n):s.call(this,o,n));return this},o.removeEvent=function(t){var e,i=typeof t,o=this._getEvents();if("string"===i)delete o[t];else if(t instanceof RegExp)for(e in o)o.hasOwnProperty(e)&&t.test(e)&&delete o[e];else delete this._events;return this},o.removeAllListeners=i("removeEvent"),o.emitEvent=function(t,e){var i,o,n,r,s=this.getListenersAsObject(t);for(n in s)if(s.hasOwnProperty(n))for(o=s[n].length;o--;)i=s[n][o],i.once===!0&&this.removeListener(t,i.listener),r=i.listener.apply(this,e||[]),r===this._getOnceReturnValue()&&this.removeListener(t,i.listener);return this},o.trigger=i("emitEvent"),o.emit=function(t){var e=Array.prototype.slice.call(arguments,1);return this.emitEvent(t,e)},o.setOnceReturnValue=function(t){return this._onceReturnValue=t,this},o._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},o._getEvents=function(){return this._events||(this._events={})},t.noConflict=function(){return n.EventEmitter=r,t},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return t}):"object"==typeof module&&module.exports?module.exports=t:n.EventEmitter=t}.call(this),function(t){function e(t){if(t){if("string"==typeof o[t])return t;t=t.charAt(0).toUpperCase()+t.slice(1);for(var e,n=0,r=i.length;r>n;n++)if(e=i[n]+t,"string"==typeof o[e])return e}}var i="Webkit Moz ms Ms O".split(" "),o=document.documentElement.style;"function"==typeof define&&define.amd?define("get-style-property/get-style-property",[],function(){return e}):"object"==typeof exports?module.exports=e:t.getStyleProperty=e}(window),function(t){function e(t){var e=parseFloat(t),i=-1===t.indexOf("%")&&!isNaN(e);return i&&e}function i(){}function o(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0,i=s.length;i>e;e++){var o=s[e];t[o]=0}return t}function n(i){function n(){if(!d){d=!0;var o=t.getComputedStyle;if(p=function(){var t=o?function(t){return o(t,null)}:function(t){return t.currentStyle};return function(e){var i=t(e);return i||r("Style returned "+i+". Are you running this code in a hidden iframe on Firefox? "+"See http://bit.ly/getsizebug1"),i}}(),h=i("boxSizing")){var n=document.createElement("div");n.style.width="200px",n.style.padding="1px 2px 3px 4px",n.style.borderStyle="solid",n.style.borderWidth="1px 2px 3px 4px",n.style[h]="border-box";var s=document.body||document.documentElement;s.appendChild(n);var a=p(n);f=200===e(a.width),s.removeChild(n)}}}function a(t){if(n(),"string"==typeof t&&(t=document.querySelector(t)),t&&"object"==typeof t&&t.nodeType){var i=p(t);if("none"===i.display)return o();var r={};r.width=t.offsetWidth,r.height=t.offsetHeight;for(var a=r.isBorderBox=!(!h||!i[h]||"border-box"!==i[h]),d=0,l=s.length;l>d;d++){var c=s[d],y=i[c];y=u(t,y);var m=parseFloat(y);r[c]=isNaN(m)?0:m}var g=r.paddingLeft+r.paddingRight,v=r.paddingTop+r.paddingBottom,_=r.marginLeft+r.marginRight,I=r.marginTop+r.marginBottom,L=r.borderLeftWidth+r.borderRightWidth,z=r.borderTopWidth+r.borderBottomWidth,b=a&&f,x=e(i.width);x!==!1&&(r.width=x+(b?0:g+L));var S=e(i.height);return S!==!1&&(r.height=S+(b?0:v+z)),r.innerWidth=r.width-(g+L),r.innerHeight=r.height-(v+z),r.outerWidth=r.width+_,r.outerHeight=r.height+I,r}}function u(e,i){if(t.getComputedStyle||-1===i.indexOf("%"))return i;var o=e.style,n=o.left,r=e.runtimeStyle,s=r&&r.left;return s&&(r.left=e.currentStyle.left),o.left=i,i=o.pixelLeft,o.left=n,s&&(r.left=s),i}var p,h,f,d=!1;return a}var r="undefined"==typeof console?i:function(t){console.error(t)},s=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"];"function"==typeof define&&define.amd?define("get-size/get-size",["get-style-property/get-style-property"],n):"object"==typeof exports?module.exports=n(require("desandro-get-style-property")):t.getSize=n(t.getStyleProperty)}(window),function(t){function e(t,e){return t[s](e)}function i(t){if(!t.parentNode){var e=document.createDocumentFragment();e.appendChild(t)}}function o(t,e){i(t);for(var o=t.parentNode.querySelectorAll(e),n=0,r=o.length;r>n;n++)if(o[n]===t)return!0;return!1}function n(t,o){return i(t),e(t,o)}var r,s=function(){if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0,o=e.length;o>i;i++){var n=e[i],r=n+"MatchesSelector";if(t[r])return r}}();if(s){var a=document.createElement("div"),u=e(a,"div");r=u?e:n}else r=o;"function"==typeof define&&define.amd?define("matches-selector/matches-selector",[],function(){return r}):"object"==typeof exports?module.exports=r:window.matchesSelector=r}(Element.prototype),function(t){function e(t,e){for(var i in e)t[i]=e[i];return t}function i(t){for(var e in t)return!1;return e=null,!0}function o(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}function n(t,n,r){function a(t,e){t&&(this.element=t,this.layout=e,this.position={x:0,y:0},this._create())}var u=r("transition"),p=r("transform"),h=u&&p,f=!!r("perspective"),d={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"otransitionend",transition:"transitionend"}[u],l=["transform","transition","transitionDuration","transitionProperty"],c=function(){for(var t={},e=0,i=l.length;i>e;e++){var o=l[e],n=r(o);n&&n!==o&&(t[o]=n)}return t}();e(a.prototype,t.prototype),a.prototype._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},a.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},a.prototype.getSize=function(){this.size=n(this.element)},a.prototype.css=function(t){var e=this.element.style;for(var i in t){var o=c[i]||i;e[o]=t[i]}},a.prototype.getPosition=function(){var t=s(this.element),e=this.layout.options,i=e.isOriginLeft,o=e.isOriginTop,n=parseInt(t[i?"left":"right"],10),r=parseInt(t[o?"top":"bottom"],10);n=isNaN(n)?0:n,r=isNaN(r)?0:r;var a=this.layout.size;n-=i?a.paddingLeft:a.paddingRight,r-=o?a.paddingTop:a.paddingBottom,this.position.x=n,this.position.y=r},a.prototype.layoutPosition=function(){var t=this.layout.size,e=this.layout.options,i={};e.isOriginLeft?(i.left=this.position.x+t.paddingLeft+"px",i.right=""):(i.right=this.position.x+t.paddingRight+"px",i.left=""),e.isOriginTop?(i.top=this.position.y+t.paddingTop+"px",i.bottom=""):(i.bottom=this.position.y+t.paddingBottom+"px",i.top=""),this.css(i),this.emitEvent("layout",[this])};var y=f?function(t,e){return"translate3d("+t+"px, "+e+"px, 0)"}:function(t,e){return"translate("+t+"px, "+e+"px)"};a.prototype._transitionTo=function(t,e){this.getPosition();var i=this.position.x,o=this.position.y,n=parseInt(t,10),r=parseInt(e,10),s=n===this.position.x&&r===this.position.y;if(this.setPosition(t,e),s&&!this.isTransitioning)return this.layoutPosition(),void 0;var a=t-i,u=e-o,p={},h=this.layout.options;a=h.isOriginLeft?a:-a,u=h.isOriginTop?u:-u,p.transform=y(a,u),this.transition({to:p,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},a.prototype.goTo=function(t,e){this.setPosition(t,e),this.layoutPosition()},a.prototype.moveTo=h?a.prototype._transitionTo:a.prototype.goTo,a.prototype.setPosition=function(t,e){this.position.x=parseInt(t,10),this.position.y=parseInt(e,10)},a.prototype._nonTransition=function(t){this.css(t.to),t.isCleaning&&this._removeStyles(t.to);for(var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)},a.prototype._transition=function(t){if(!parseFloat(this.layout.options.transitionDuration))return this._nonTransition(t),void 0;var e=this._transn;for(var i in t.onTransitionEnd)e.onEnd[i]=t.onTransitionEnd[i];for(i in t.to)e.ingProperties[i]=!0,t.isCleaning&&(e.clean[i]=!0);if(t.from){this.css(t.from);var o=this.element.offsetHeight;o=null}this.enableTransition(t.to),this.css(t.to),this.isTransitioning=!0};var m=p&&o(p)+",opacity";a.prototype.enableTransition=function(){this.isTransitioning||(this.css({transitionProperty:m,transitionDuration:this.layout.options.transitionDuration}),this.element.addEventListener(d,this,!1))},a.prototype.transition=a.prototype[u?"_transition":"_nonTransition"],a.prototype.onwebkitTransitionEnd=function(t){this.ontransitionend(t)},a.prototype.onotransitionend=function(t){this.ontransitionend(t)};var g={"-webkit-transform":"transform","-moz-transform":"transform","-o-transform":"transform"};a.prototype.ontransitionend=function(t){if(t.target===this.element){var e=this._transn,o=g[t.propertyName]||t.propertyName;if(delete e.ingProperties[o],i(e.ingProperties)&&this.disableTransition(),o in e.clean&&(this.element.style[t.propertyName]="",delete e.clean[o]),o in e.onEnd){var n=e.onEnd[o];n.call(this),delete e.onEnd[o]}this.emitEvent("transitionEnd",[this])}},a.prototype.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(d,this,!1),this.isTransitioning=!1},a.prototype._removeStyles=function(t){var e={};for(var i in t)e[i]="";this.css(e)};var v={transitionProperty:"",transitionDuration:""};return a.prototype.removeTransitionStyles=function(){this.css(v)},a.prototype.removeElem=function(){this.element.parentNode.removeChild(this.element),this.emitEvent("remove",[this])},a.prototype.remove=function(){if(!u||!parseFloat(this.layout.options.transitionDuration))return this.removeElem(),void 0;var t=this;this.on("transitionEnd",function(){return t.removeElem(),!0}),this.hide()},a.prototype.reveal=function(){delete this.isHidden,this.css({display:""});var t=this.layout.options;this.transition({from:t.hiddenStyle,to:t.visibleStyle,isCleaning:!0})},a.prototype.hide=function(){this.isHidden=!0,this.css({display:""});var t=this.layout.options;this.transition({from:t.visibleStyle,to:t.hiddenStyle,isCleaning:!0,onTransitionEnd:{opacity:function(){this.isHidden&&this.css({display:"none"})}}})},a.prototype.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},a}var r=t.getComputedStyle,s=r?function(t){return r(t,null)}:function(t){return t.currentStyle};"function"==typeof define&&define.amd?define("outlayer/item",["eventEmitter/EventEmitter","get-size/get-size","get-style-property/get-style-property"],n):"object"==typeof exports?module.exports=n(require("wolfy87-eventemitter"),require("get-size"),require("desandro-get-style-property")):(t.Outlayer={},t.Outlayer.Item=n(t.EventEmitter,t.getSize,t.getStyleProperty))}(window),function(t){function e(t,e){for(var i in e)t[i]=e[i];return t}function i(t){return"[object Array]"===f.call(t)}function o(t){var e=[];if(i(t))e=t;else if(t&&"number"==typeof t.length)for(var o=0,n=t.length;n>o;o++)e.push(t[o]);else e.push(t);return e}function n(t,e){var i=l(e,t);-1!==i&&e.splice(i,1)}function r(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()}function s(i,s,f,l,c,y){function m(t,i){if("string"==typeof t&&(t=a.querySelector(t)),!t||!d(t))return u&&u.error("Bad "+this.constructor.namespace+" element: "+t),void 0;this.element=t,this.options=e({},this.constructor.defaults),this.option(i);var o=++g;this.element.outlayerGUID=o,v[o]=this,this._create(),this.options.isInitLayout&&this.layout()}var g=0,v={};return m.namespace="outlayer",m.Item=y,m.defaults={containerStyle:{position:"relative"},isInitLayout:!0,isOriginLeft:!0,isOriginTop:!0,isResizeBound:!0,isResizingContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}},e(m.prototype,f.prototype),m.prototype.option=function(t){e(this.options,t)},m.prototype._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),e(this.element.style,this.options.containerStyle),this.options.isResizeBound&&this.bindResize()},m.prototype.reloadItems=function(){this.items=this._itemize(this.element.children)},m.prototype._itemize=function(t){for(var e=this._filterFindItemElements(t),i=this.constructor.Item,o=[],n=0,r=e.length;r>n;n++){var s=e[n],a=new i(s,this);o.push(a)}return o},m.prototype._filterFindItemElements=function(t){t=o(t);for(var e=this.options.itemSelector,i=[],n=0,r=t.length;r>n;n++){var s=t[n];if(d(s))if(e){c(s,e)&&i.push(s);for(var a=s.querySelectorAll(e),u=0,p=a.length;p>u;u++)i.push(a[u])}else i.push(s)}return i},m.prototype.getItemElements=function(){for(var t=[],e=0,i=this.items.length;i>e;e++)t.push(this.items[e].element);return t},m.prototype.layout=function(){this._resetLayout(),this._manageStamps();var t=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;this.layoutItems(this.items,t),this._isLayoutInited=!0},m.prototype._init=m.prototype.layout,m.prototype._resetLayout=function(){this.getSize()},m.prototype.getSize=function(){this.size=l(this.element)},m.prototype._getMeasurement=function(t,e){var i,o=this.options[t];o?("string"==typeof o?i=this.element.querySelector(o):d(o)&&(i=o),this[t]=i?l(i)[e]:o):this[t]=0},m.prototype.layoutItems=function(t,e){t=this._getItemsForLayout(t),this._layoutItems(t,e),this._postLayout()},m.prototype._getItemsForLayout=function(t){for(var e=[],i=0,o=t.length;o>i;i++){var n=t[i];n.isIgnored||e.push(n)}return e},m.prototype._layoutItems=function(t,e){function i(){o.emitEvent("layoutComplete",[o,t])}var o=this;if(!t||!t.length)return i(),void 0;this._itemsOn(t,"layout",i);for(var n=[],r=0,s=t.length;s>r;r++){var a=t[r],u=this._getItemLayoutPosition(a);u.item=a,u.isInstant=e||a.isLayoutInstant,n.push(u)}this._processLayoutQueue(n)},m.prototype._getItemLayoutPosition=function(){return{x:0,y:0}},m.prototype._processLayoutQueue=function(t){for(var e=0,i=t.length;i>e;e++){var o=t[e];this._positionItem(o.item,o.x,o.y,o.isInstant)}},m.prototype._positionItem=function(t,e,i,o){o?t.goTo(e,i):t.moveTo(e,i)},m.prototype._postLayout=function(){this.resizeContainer()},m.prototype.resizeContainer=function(){if(this.options.isResizingContainer){var t=this._getContainerSize();t&&(this._setContainerMeasure(t.width,!0),this._setContainerMeasure(t.height,!1))}},m.prototype._getContainerSize=h,m.prototype._setContainerMeasure=function(t,e){if(void 0!==t){var i=this.size;i.isBorderBox&&(t+=e?i.paddingLeft+i.paddingRight+i.borderLeftWidth+i.borderRightWidth:i.paddingBottom+i.paddingTop+i.borderTopWidth+i.borderBottomWidth),t=Math.max(t,0),this.element.style[e?"width":"height"]=t+"px"}},m.prototype._itemsOn=function(t,e,i){function o(){return n++,n===r&&i.call(s),!0}for(var n=0,r=t.length,s=this,a=0,u=t.length;u>a;a++){var p=t[a];p.on(e,o)}},m.prototype.ignore=function(t){var e=this.getItem(t);e&&(e.isIgnored=!0)},m.prototype.unignore=function(t){var e=this.getItem(t);e&&delete e.isIgnored},m.prototype.stamp=function(t){if(t=this._find(t)){this.stamps=this.stamps.concat(t);for(var e=0,i=t.length;i>e;e++){var o=t[e];this.ignore(o)}}},m.prototype.unstamp=function(t){if(t=this._find(t))for(var e=0,i=t.length;i>e;e++){var o=t[e];n(o,this.stamps),this.unignore(o)}},m.prototype._find=function(t){return t?("string"==typeof t&&(t=this.element.querySelectorAll(t)),t=o(t)):void 0},m.prototype._manageStamps=function(){if(this.stamps&&this.stamps.length){this._getBoundingRect();for(var t=0,e=this.stamps.length;e>t;t++){var i=this.stamps[t];this._manageStamp(i)}}},m.prototype._getBoundingRect=function(){var t=this.element.getBoundingClientRect(),e=this.size;this._boundingRect={left:t.left+e.paddingLeft+e.borderLeftWidth,top:t.top+e.paddingTop+e.borderTopWidth,right:t.right-(e.paddingRight+e.borderRightWidth),bottom:t.bottom-(e.paddingBottom+e.borderBottomWidth)}},m.prototype._manageStamp=h,m.prototype._getElementOffset=function(t){var e=t.getBoundingClientRect(),i=this._boundingRect,o=l(t),n={left:e.left-i.left-o.marginLeft,top:e.top-i.top-o.marginTop,right:i.right-e.right-o.marginRight,bottom:i.bottom-e.bottom-o.marginBottom};return n},m.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},m.prototype.bindResize=function(){this.isResizeBound||(i.bind(t,"resize",this),this.isResizeBound=!0)},m.prototype.unbindResize=function(){this.isResizeBound&&i.unbind(t,"resize",this),this.isResizeBound=!1},m.prototype.onresize=function(){function t(){e.resize(),delete e.resizeTimeout}this.resizeTimeout&&clearTimeout(this.resizeTimeout);var e=this;this.resizeTimeout=setTimeout(t,100)},m.prototype.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},m.prototype.needsResizeLayout=function(){var t=l(this.element),e=this.size&&t;return e&&t.innerWidth!==this.size.innerWidth},m.prototype.addItems=function(t){var e=this._itemize(t);return e.length&&(this.items=this.items.concat(e)),e},m.prototype.appended=function(t){var e=this.addItems(t);e.length&&(this.layoutItems(e,!0),this.reveal(e))},m.prototype.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps(),this.layoutItems(e,!0),this.reveal(e),this.layoutItems(i)}},m.prototype.reveal=function(t){var e=t&&t.length;if(e)for(var i=0;e>i;i++){var o=t[i];o.reveal()}},m.prototype.hide=function(t){var e=t&&t.length;if(e)for(var i=0;e>i;i++){var o=t[i];o.hide()}},m.prototype.getItem=function(t){for(var e=0,i=this.items.length;i>e;e++){var o=this.items[e];if(o.element===t)return o}},m.prototype.getItems=function(t){if(t&&t.length){for(var e=[],i=0,o=t.length;o>i;i++){var n=t[i],r=this.getItem(n);r&&e.push(r)}return e}},m.prototype.remove=function(t){t=o(t);var e=this.getItems(t);if(e&&e.length){this._itemsOn(e,"remove",function(){this.emitEvent("removeComplete",[this,e])});for(var i=0,r=e.length;r>i;i++){var s=e[i];s.remove(),n(s,this.items)}}},m.prototype.destroy=function(){var t=this.element.style;t.height="",t.position="",t.width="";for(var e=0,i=this.items.length;i>e;e++){var o=this.items[e];o.destroy()}this.unbindResize();var n=this.element.outlayerGUID;delete v[n],delete this.element.outlayerGUID,p&&p.removeData(this.element,this.constructor.namespace)},m.data=function(t){var e=t&&t.outlayerGUID;return e&&v[e]},m.create=function(t,i){function o(){m.apply(this,arguments)}return Object.create?o.prototype=Object.create(m.prototype):e(o.prototype,m.prototype),o.prototype.constructor=o,o.defaults=e({},m.defaults),e(o.defaults,i),o.prototype.settings={},o.namespace=t,o.data=m.data,o.Item=function(){y.apply(this,arguments)},o.Item.prototype=new y,s(function(){for(var e=r(t),i=a.querySelectorAll(".js-"+e),n="data-"+e+"-options",s=0,h=i.length;h>s;s++){var f,d=i[s],l=d.getAttribute(n);try{f=l&&JSON.parse(l)}catch(c){u&&u.error("Error parsing "+n+" on "+d.nodeName.toLowerCase()+(d.id?"#"+d.id:"")+": "+c);continue}var y=new o(d,f);p&&p.data(d,t,y)}}),p&&p.bridget&&p.bridget(t,o),o},m.Item=y,m}var a=t.document,u=t.console,p=t.jQuery,h=function(){},f=Object.prototype.toString,d="function"==typeof HTMLElement||"object"==typeof HTMLElement?function(t){return t instanceof HTMLElement}:function(t){return t&&"object"==typeof t&&1===t.nodeType&&"string"==typeof t.nodeName},l=Array.prototype.indexOf?function(t,e){return t.indexOf(e)}:function(t,e){for(var i=0,o=t.length;o>i;i++)if(t[i]===e)return i;return-1};"function"==typeof define&&define.amd?define("outlayer/outlayer",["eventie/eventie","doc-ready/doc-ready","eventEmitter/EventEmitter","get-size/get-size","matches-selector/matches-selector","./item"],s):"object"==typeof exports?module.exports=s(require("eventie"),require("doc-ready"),require("wolfy87-eventemitter"),require("get-size"),require("desandro-matches-selector"),require("./item")):t.Outlayer=s(t.eventie,t.docReady,t.EventEmitter,t.getSize,t.matchesSelector,t.Outlayer.Item)}(window),function(t){function e(t){function e(){t.Item.apply(this,arguments)}e.prototype=new t.Item,e.prototype._create=function(){this.id=this.layout.itemGUID++,t.Item.prototype._create.call(this),this.sortData={}},e.prototype.updateSortData=function(){if(!this.isIgnored){this.sortData.id=this.id,this.sortData["original-order"]=this.id,this.sortData.random=Math.random();var t=this.layout.options.getSortData,e=this.layout._sorters;for(var i in t){var o=e[i];this.sortData[i]=o(this.element,this)}}};var i=e.prototype.destroy;return e.prototype.destroy=function(){i.apply(this,arguments),this.css({display:""})},e}"function"==typeof define&&define.amd?define("isotope/js/item",["outlayer/outlayer"],e):"object"==typeof exports?module.exports=e(require("outlayer")):(t.Isotope=t.Isotope||{},t.Isotope.Item=e(t.Outlayer))}(window),function(t){function e(t,e){function i(t){this.isotope=t,t&&(this.options=t.options[this.namespace],this.element=t.element,this.items=t.filteredItems,this.size=t.size)}return function(){function t(t){return function(){return e.prototype[t].apply(this.isotope,arguments)}}for(var o=["_resetLayout","_getItemLayoutPosition","_manageStamp","_getContainerSize","_getElementOffset","needsResizeLayout"],n=0,r=o.length;r>n;n++){var s=o[n];i.prototype[s]=t(s)}}(),i.prototype.needsVerticalResizeLayout=function(){var e=t(this.isotope.element),i=this.isotope.size&&e;return i&&e.innerHeight!==this.isotope.size.innerHeight},i.prototype._getMeasurement=function(){this.isotope._getMeasurement.apply(this,arguments)},i.prototype.getColumnWidth=function(){this.getSegmentSize("column","Width")},i.prototype.getRowHeight=function(){this.getSegmentSize("row","Height")},i.prototype.getSegmentSize=function(t,e){var i=t+e,o="outer"+e;if(this._getMeasurement(i,o),!this[i]){var n=this.getFirstItemSize();this[i]=n&&n[o]||this.isotope.size["inner"+e]}},i.prototype.getFirstItemSize=function(){var e=this.isotope.filteredItems[0];return e&&e.element&&t(e.element)},i.prototype.layout=function(){this.isotope.layout.apply(this.isotope,arguments)},i.prototype.getSize=function(){this.isotope.getSize(),this.size=this.isotope.size},i.modes={},i.create=function(t,e){function o(){i.apply(this,arguments)}return o.prototype=new i,e&&(o.options=e),o.prototype.namespace=t,i.modes[t]=o,o},i}"function"==typeof define&&define.amd?define("isotope/js/layout-mode",["get-size/get-size","outlayer/outlayer"],e):"object"==typeof exports?module.exports=e(require("get-size"),require("outlayer")):(t.Isotope=t.Isotope||{},t.Isotope.LayoutMode=e(t.getSize,t.Outlayer))}(window),function(t){function e(t,e){var o=t.create("masonry");return o.prototype._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns();var t=this.cols;for(this.colYs=[];t--;)this.colYs.push(0);this.maxY=0},o.prototype.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var t=this.items[0],i=t&&t.element;this.columnWidth=i&&e(i).outerWidth||this.containerWidth}this.columnWidth+=this.gutter,this.cols=Math.floor((this.containerWidth+this.gutter)/this.columnWidth),this.cols=Math.max(this.cols,1)},o.prototype.getContainerWidth=function(){var t=this.options.isFitWidth?this.element.parentNode:this.element,i=e(t);this.containerWidth=i&&i.innerWidth},o.prototype._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth%this.columnWidth,o=e&&1>e?"round":"ceil",n=Math[o](t.size.outerWidth/this.columnWidth);n=Math.min(n,this.cols);for(var r=this._getColGroup(n),s=Math.min.apply(Math,r),a=i(r,s),u={x:this.columnWidth*a,y:s},p=s+t.size.outerHeight,h=this.cols+1-r.length,f=0;h>f;f++)this.colYs[a+f]=p;return u},o.prototype._getColGroup=function(t){if(2>t)return this.colYs;for(var e=[],i=this.cols+1-t,o=0;i>o;o++){var n=this.colYs.slice(o,o+t);e[o]=Math.max.apply(Math,n)}return e},o.prototype._manageStamp=function(t){var i=e(t),o=this._getElementOffset(t),n=this.options.isOriginLeft?o.left:o.right,r=n+i.outerWidth,s=Math.floor(n/this.columnWidth);s=Math.max(0,s);var a=Math.floor(r/this.columnWidth);a-=r%this.columnWidth?0:1,a=Math.min(this.cols-1,a);for(var u=(this.options.isOriginTop?o.top:o.bottom)+i.outerHeight,p=s;a>=p;p++)this.colYs[p]=Math.max(u,this.colYs[p])},o.prototype._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var t={height:this.maxY};return this.options.isFitWidth&&(t.width=this._getContainerFitWidth()),t},o.prototype._getContainerFitWidth=function(){for(var t=0,e=this.cols;--e&&0===this.colYs[e];)t++;return(this.cols-t)*this.columnWidth-this.gutter},o.prototype.needsResizeLayout=function(){var t=this.containerWidth;return this.getContainerWidth(),t!==this.containerWidth},o}var i=Array.prototype.indexOf?function(t,e){return t.indexOf(e)}:function(t,e){for(var i=0,o=t.length;o>i;i++){var n=t[i];if(n===e)return i}return-1};"function"==typeof define&&define.amd?define("masonry/masonry",["outlayer/outlayer","get-size/get-size"],e):"object"==typeof exports?module.exports=e(require("outlayer"),require("get-size")):t.Masonry=e(t.Outlayer,t.getSize)}(window),function(t){function e(t,e){for(var i in e)t[i]=e[i];return t}function i(t,i){var o=t.create("masonry"),n=o.prototype._getElementOffset,r=o.prototype.layout,s=o.prototype._getMeasurement;e(o.prototype,i.prototype),o.prototype._getElementOffset=n,o.prototype.layout=r,o.prototype._getMeasurement=s;var a=o.prototype.measureColumns;o.prototype.measureColumns=function(){this.items=this.isotope.filteredItems,a.call(this)};var u=o.prototype._manageStamp;return o.prototype._manageStamp=function(){this.options.isOriginLeft=this.isotope.options.isOriginLeft,this.options.isOriginTop=this.isotope.options.isOriginTop,u.apply(this,arguments)},o}"function"==typeof define&&define.amd?define("isotope/js/layout-modes/masonry",["../layout-mode","masonry/masonry"],i):"object"==typeof exports?module.exports=i(require("../layout-mode"),require("masonry-layout")):i(t.Isotope.LayoutMode,t.Masonry)}(window),function(t){function e(t){var e=t.create("fitRows");return e.prototype._resetLayout=function(){this.x=0,this.y=0,this.maxY=0,this._getMeasurement("gutter","outerWidth")},e.prototype._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth+this.gutter,i=this.isotope.size.innerWidth+this.gutter;0!==this.x&&e+this.x>i&&(this.x=0,this.y=this.maxY);var o={x:this.x,y:this.y};return this.maxY=Math.max(this.maxY,this.y+t.size.outerHeight),this.x+=e,o},e.prototype._getContainerSize=function(){return{height:this.maxY}},e}"function"==typeof define&&define.amd?define("isotope/js/layout-modes/fit-rows",["../layout-mode"],e):"object"==typeof exports?module.exports=e(require("../layout-mode")):e(t.Isotope.LayoutMode)}(window),function(t){function e(t){var e=t.create("vertical",{horizontalAlignment:0});return e.prototype._resetLayout=function(){this.y=0},e.prototype._getItemLayoutPosition=function(t){t.getSize();var e=(this.isotope.size.innerWidth-t.size.outerWidth)*this.options.horizontalAlignment,i=this.y;return this.y+=t.size.outerHeight,{x:e,y:i}},e.prototype._getContainerSize=function(){return{height:this.y}},e}"function"==typeof define&&define.amd?define("isotope/js/layout-modes/vertical",["../layout-mode"],e):"object"==typeof exports?module.exports=e(require("../layout-mode")):e(t.Isotope.LayoutMode)}(window),function(t){function e(t,e){for(var i in e)t[i]=e[i];return t}function i(t){return"[object Array]"===h.call(t)}function o(t){var e=[];if(i(t))e=t;else if(t&&"number"==typeof t.length)for(var o=0,n=t.length;n>o;o++)e.push(t[o]);else e.push(t);return e}function n(t,e){var i=f(e,t);-1!==i&&e.splice(i,1)}function r(t,i,r,u,h){function f(t,e){return function(i,o){for(var n=0,r=t.length;r>n;n++){var s=t[n],a=i.sortData[s],u=o.sortData[s];if(a>u||u>a){var p=void 0!==e[s]?e[s]:e,h=p?1:-1;return(a>u?1:-1)*h}}return 0}}var d=t.create("isotope",{layoutMode:"masonry",isJQueryFiltering:!0,sortAscending:!0});d.Item=u,d.LayoutMode=h,d.prototype._create=function(){this.itemGUID=0,this._sorters={},this._getSorters(),t.prototype._create.call(this),this.modes={},this.filteredItems=this.items,this.sortHistory=["original-order"];for(var e in h.modes)this._initLayoutMode(e)},d.prototype.reloadItems=function(){this.itemGUID=0,t.prototype.reloadItems.call(this)},d.prototype._itemize=function(){for(var e=t.prototype._itemize.apply(this,arguments),i=0,o=e.length;o>i;i++){var n=e[i];n.id=this.itemGUID++}return this._updateItemsSortData(e),e
},d.prototype._initLayoutMode=function(t){var i=h.modes[t],o=this.options[t]||{};this.options[t]=i.options?e(i.options,o):o,this.modes[t]=new i(this)},d.prototype.layout=function(){return!this._isLayoutInited&&this.options.isInitLayout?(this.arrange(),void 0):(this._layout(),void 0)},d.prototype._layout=function(){var t=this._getIsInstant();this._resetLayout(),this._manageStamps(),this.layoutItems(this.filteredItems,t),this._isLayoutInited=!0},d.prototype.arrange=function(t){function e(){o.reveal(i.needReveal),o.hide(i.needHide)}this.option(t),this._getIsInstant();var i=this._filter(this.items);this.filteredItems=i.matches;var o=this;this._isInstant?this._noTransition(e):e(),this._sort(),this._layout()},d.prototype._init=d.prototype.arrange,d.prototype._getIsInstant=function(){var t=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;return this._isInstant=t,t},d.prototype._filter=function(t){var e=this.options.filter;e=e||"*";for(var i=[],o=[],n=[],r=this._getFilterTest(e),s=0,a=t.length;a>s;s++){var u=t[s];if(!u.isIgnored){var p=r(u);p&&i.push(u),p&&u.isHidden?o.push(u):p||u.isHidden||n.push(u)}}return{matches:i,needReveal:o,needHide:n}},d.prototype._getFilterTest=function(t){return s&&this.options.isJQueryFiltering?function(e){return s(e.element).is(t)}:"function"==typeof t?function(e){return t(e.element)}:function(e){return r(e.element,t)}},d.prototype.updateSortData=function(t){var e;t?(t=o(t),e=this.getItems(t)):e=this.items,this._getSorters(),this._updateItemsSortData(e)},d.prototype._getSorters=function(){var t=this.options.getSortData;for(var e in t){var i=t[e];this._sorters[e]=l(i)}},d.prototype._updateItemsSortData=function(t){for(var e=t&&t.length,i=0;e&&e>i;i++){var o=t[i];o.updateSortData()}};var l=function(){function t(t){if("string"!=typeof t)return t;var i=a(t).split(" "),o=i[0],n=o.match(/^\[(.+)\]$/),r=n&&n[1],s=e(r,o),u=d.sortDataParsers[i[1]];return t=u?function(t){return t&&u(s(t))}:function(t){return t&&s(t)}}function e(t,e){var i;return i=t?function(e){return e.getAttribute(t)}:function(t){var i=t.querySelector(e);return i&&p(i)}}return t}();d.sortDataParsers={parseInt:function(t){return parseInt(t,10)},parseFloat:function(t){return parseFloat(t)}},d.prototype._sort=function(){var t=this.options.sortBy;if(t){var e=[].concat.apply(t,this.sortHistory),i=f(e,this.options.sortAscending);this.filteredItems.sort(i),t!==this.sortHistory[0]&&this.sortHistory.unshift(t)}},d.prototype._mode=function(){var t=this.options.layoutMode,e=this.modes[t];if(!e)throw Error("No layout mode: "+t);return e.options=this.options[t],e},d.prototype._resetLayout=function(){t.prototype._resetLayout.call(this),this._mode()._resetLayout()},d.prototype._getItemLayoutPosition=function(t){return this._mode()._getItemLayoutPosition(t)},d.prototype._manageStamp=function(t){this._mode()._manageStamp(t)},d.prototype._getContainerSize=function(){return this._mode()._getContainerSize()},d.prototype.needsResizeLayout=function(){return this._mode().needsResizeLayout()},d.prototype.appended=function(t){var e=this.addItems(t);if(e.length){var i=this._filterRevealAdded(e);this.filteredItems=this.filteredItems.concat(i)}},d.prototype.prepended=function(t){var e=this._itemize(t);if(e.length){this._resetLayout(),this._manageStamps();var i=this._filterRevealAdded(e);this.layoutItems(this.filteredItems),this.filteredItems=i.concat(this.filteredItems),this.items=e.concat(this.items)}},d.prototype._filterRevealAdded=function(t){var e=this._filter(t);return this.hide(e.needHide),this.reveal(e.matches),this.layoutItems(e.matches,!0),e.matches},d.prototype.insert=function(t){var e=this.addItems(t);if(e.length){var i,o,n=e.length;for(i=0;n>i;i++)o=e[i],this.element.appendChild(o.element);var r=this._filter(e).matches;for(i=0;n>i;i++)e[i].isLayoutInstant=!0;for(this.arrange(),i=0;n>i;i++)delete e[i].isLayoutInstant;this.reveal(r)}};var c=d.prototype.remove;return d.prototype.remove=function(t){t=o(t);var e=this.getItems(t);if(c.call(this,t),e&&e.length)for(var i=0,r=e.length;r>i;i++){var s=e[i];n(s,this.filteredItems)}},d.prototype.shuffle=function(){for(var t=0,e=this.items.length;e>t;t++){var i=this.items[t];i.sortData.random=Math.random()}this.options.sortBy="random",this._sort(),this._layout()},d.prototype._noTransition=function(t){var e=this.options.transitionDuration;this.options.transitionDuration=0;var i=t.call(this);return this.options.transitionDuration=e,i},d.prototype.getFilteredItemElements=function(){for(var t=[],e=0,i=this.filteredItems.length;i>e;e++)t.push(this.filteredItems[e].element);return t},d}var s=t.jQuery,a=String.prototype.trim?function(t){return t.trim()}:function(t){return t.replace(/^\s+|\s+$/g,"")},u=document.documentElement,p=u.textContent?function(t){return t.textContent}:function(t){return t.innerText},h=Object.prototype.toString,f=Array.prototype.indexOf?function(t,e){return t.indexOf(e)}:function(t,e){for(var i=0,o=t.length;o>i;i++)if(t[i]===e)return i;return-1};"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size","matches-selector/matches-selector","isotope/js/item","isotope/js/layout-mode","isotope/js/layout-modes/masonry","isotope/js/layout-modes/fit-rows","isotope/js/layout-modes/vertical"],r):"object"==typeof exports?module.exports=r(require("outlayer"),require("get-size"),require("desandro-matches-selector"),require("./item"),require("./layout-mode"),require("./layout-modes/masonry"),require("./layout-modes/fit-rows"),require("./layout-modes/vertical")):t.Isotope=r(t.Outlayer,t.getSize,t.matchesSelector,t.Isotope.Item,t.Isotope.LayoutMode)}(window);