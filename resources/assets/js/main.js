"use strict";

/*********** DOCUMENT READY ***********/
jQuery(document).ready(function(){
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height();

    // Album Fullscreen
    jQuery('.main_fullscreen_page').each(function(){
        jQuery(this).height(site_height);
        slider_fade();
    });
});

/*********** WINDOW RESIZE ***********/
jQuery(window).resize(function(){
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height();

    jQuery('.main_fullscreen_page').height(site_height);
});

/*********** WELCOME PAGE ***********/
function slider_fade() {
    var slider_container = jQuery('.main_gallery.effect_fade'),
        elements = jQuery(slider_container).children(),
        number_of_elements = elements.length,
        slide_item = jQuery('.main_gallery.effect_fade li'),
        intervalID,
        next_button = jQuery('.main_next_slide_button'),
        prev_button = jQuery('.main_prev_slide_button'),
        autuplay_status = 'on',
        slide_duration = 6000;

    slide_item.css({'width': 100 + '%', 'height': 100 + '%'});
    slide_item.first().addClass('visible_slide');

    // Title
    var current_item = jQuery('.main_gallery.effect_fade li.visible_slide'),
        slide_title = current_item.attr('data-title'),
        slide_link = current_item.attr('data-link');

    jQuery('.main_slide_title_wrapper').html("<a href='" + slide_link + "'>" + slide_title + "</a>");

    // Play
    if (autuplay_status == 'on') {
        intervalID = setInterval(next_slide, slide_duration);

        jQuery('.main_pause_button').on('click', function(){
            if (jQuery(this).hasClass('main_paused')) {
                intervalID = setInterval(next_slide, slide_duration);
                jQuery(this).removeClass('main_paused');
            } else {
                clearInterval(intervalID);
                jQuery(this).addClass('main_paused');
            }
        });
    } else {
        jQuery('.main_pause_button').remove();
    }

    // Nav
    next_button.on('click', function(){
        next_slide();
    });

    prev_button.on('click', function(){
        prev_slide();
    });

    // Next Slide
    function next_slide() {
        var slider_container = jQuery('.main_gallery.effect_fade'),
            elements = jQuery(slider_container).children(),
            number_of_elements = elements.length,
            slide_item = jQuery('.main_gallery.effect_fade li'),
            current_item = jQuery('.main_gallery.effect_fade li.visible_slide'),
            slide_number = current_item.attr('data-number'),
            next_button = jQuery('.main_next_slide_button'),
            prev_button = jQuery('.main_prev_slide_button');

        if (slide_number < number_of_elements) {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').next().addClass('visible_slide');
        } else {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
            slide_item.first().addClass('visible_slide');
        }

        var current_item_next = slider_container.find('li.visible_slide');

        // Title
        var slide_title = current_item_next.attr('data-title');
        var slide_link = current_item_next.attr('data-link');

        jQuery('.main_slide_title_wrapper').html("<a href='" + slide_link + "'>" + slide_title + "</a>");
    }

    // Previous Slide
    function prev_slide() {
        var slider_container = jQuery('.main_gallery.effect_fade'),
            elements = jQuery(slider_container).children(),
            number_of_elements = elements.length,
            slide_item = jQuery('.main_gallery.effect_fade li'),
            current_item = jQuery('.main_gallery.effect_fade li.visible_slide'),
            slide_number = current_item.attr('data-number'),
            next_button = jQuery('.main_next_slide_button'),
            prev_button = jQuery('.main_prev_slide_button');

        if (slide_number == '1') {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide');
            slide_item.last().addClass('visible_slide');
        } else {
            jQuery(slider_container).find('li.visible_slide').removeClass('visible_slide').prev().addClass('visible_slide');
        }

        var current_item_next = slider_container.find('li.visible_slide');

        // Title
        var slide_title = current_item_next.attr('data-title');
        var slide_link = current_item_next.attr('data-link');

        jQuery('.main_slide_title_wrapper').html("<a href='" + slide_link + "'>" + slide_title + "</a>");

    }
}
