$(".pm_load_more").click(function(){var e=$(".pm_blog_item.added"),d=$(".pm_blog_item.added:not(.checked):first");return e.addClass("checked"),$("html, body").stop(!0).animate({scrollTop:d.offset().top-200},1e3),!1});