/*Loading screen'o veikimas*/
    var site_width = jQuery(window).width(),
        site_height = jQuery(window).height(),
        header_height = jQuery('.pm_header').height();
    // Activate Preloader
    jQuery(".preloader_active").width(site_width).height(site_height);
    jQuery(".pm_preloader_load_line").addClass("active");

    // Hide Preloader
    setTimeout("jQuery('.preloader_active').fadeOut();", 500);


/*Scrollbar rodymas po loado, skirta veikimui su Loading screen*/
setTimeout("jQuery('html').addClass('show-scrollbar');", 1000);

/*Navigacijos ir mygtuku valdymas*/

$(document).ready(function () {

    /* Paspaudus Hamburget uzslepia virsutiniu mini meniu */

    $( ".navbar-toggle" ).click(function() {
        $('.short-menu').toggle();
        $('.nav-slit').toggle();
        $('.navbar-fixed-bottom').toggleClass('transp-bg');
        $('.navbar-collapse.collapse').toggleClass('dark-bg');
    });
    /* Submit forma */
    $("#submit-button").click(function () {
        $("#main-form").submit();
    });

    /* Show hide header */
    $(document).on('mousewheel',function (evt) {
        var delta = evt.originalEvent.wheelDelta;
        console.log('scroll ' + delta, evt);
        if ( delta >= 120 ){
            $('.nav-up').animate({ top: '-50px' }, 200);
            $('body').animate({ top: '0px' }, 200);
        }
        else if ( delta <= -120 ){
            $('.nav-up').animate({ top: '0px' }, 200);
            $('body').animate({ top: '50px' }, 200);
        }
    });

});