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

});

/*
$(document).ready(function () {

    /!* Show hide header *!/
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('header').removeClass('nav-down',250).addClass('nav-up', 250);
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('header').removeClass('nav-up',250).addClass('nav-down', 250);
            }
        }

        lastScrollTop = st;
    }

});*/
