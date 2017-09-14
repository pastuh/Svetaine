// Linku ant thumb arrow blokavimas
[].slice.call(document.querySelectorAll('nav > a span')).forEach(function (el) {
    el.addEventListener('click', function (ev) {
        ev.preventDefault();
    });
});

//
$(document).on('click', '#pagination-wrapper a', function(e){
    e.preventDefault();
    $('#results-wrapper').load($(this).attr('href') + ' #results-wrapper');
});

// Accordion
$('.accordion').accordion({
    "transitionSpeed": 100
});

// YOUTUBE BOX
$(document).on('mouseenter', '.youtube-play', function() {
	$(this).next('img').css('background', 'rgba(37, 34, 32, 0.4)');
}).on('mouseleave', '.youtube-play', function() {
	$(this).next('img').css('border', '');
});

$('.video-box').click(function () {
	var linkas = $(this).children('img').attr('data-video');
	video = '<div class="youtube-box youtube-img col-md-10 col-lg-6"><iframe class="youtube-iframe" width="100%" height="355" src="'+linkas+'" frameborder="0" allowfullscreen></iframe></div>';

	$(this).replaceWith(video);
});