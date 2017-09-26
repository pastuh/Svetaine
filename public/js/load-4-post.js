$(".pm_load_more").click(function () {

    var $allElements = $(".pm_blog_item.added");
    var $firstElement = $('.pm_blog_item.added:not(.checked):first');

    $allElements.addClass('checked');

    $('html, body').stop(true).animate({
        scrollTop: $firstElement.offset().top - 200
    }, 1000);

    return false;
});