$(".pm_load_more").click(function () {
//            console.log('-----LOAD-----');

    /* Surandami visi Posta, su ADDED klase */
    var $addedElement = $(".pm_blog_item.added");

    /* Surandamas LAST Post, su klase ADDED */
    var $lastElement = $addedElement.last();

    /* Pasalinta is Post Seno LAST (jeigu randama) */
    if($addedElement.hasClass('last')){
        $addedElement.removeClass('last');
//                $addedElement.css('background', 'yellow');
//                console.log('Pasalinta sena LAST klase :: Geltona');
    }

    /* Pasalinta is Post Seno SCROLLED (jeigu randama) */
    if($addedElement.hasClass('scrolled')){
        $addedElement.removeClass('scrolled');
//                $addedElement.css('background', 'purple');
//                console.log('Pasalinta sena SCROLLED klase :: Purple');
    }

    /* LAST Postui, nustatau CHECKED ir LAST */
    $lastElement.addClass('checked last');
//            $lastElement.css('background', 'red');
//            console.log('Last POST\'ui pridetas CHECKED ir LAST :: Raudona');


    /* PREV Postui (nuo LAST) nustatau SCROLLED ir CHECKED, jeigu NEturi */
    var $prevElement = $lastElement.prev('.pm_blog_item.added');

    if(!$prevElement.hasClass('scrolled') && !$prevElement.hasClass('checked')) {

        $prevElement.addClass('checked scrolled');
//                $prevElement.css('background', 'blue');
//                console.log('PREV Postui uzdedu CHECKED ir SCROLLED, nes neturi');
    }

    // Tikrinu ar PREV Postas egzistuoja ir turi Scrolled reiksme
    if($prevElement.length && $prevElement.hasClass('scrolled')) {

//                $prevElement.css('background', 'green');
//                console.log('Scrollinu iki SCROLLED. Zalia');

//                $lastElement = $nextElement;
        $('html, body').stop(true).animate({
            scrollTop: $prevElement.offset().top-200
        }, 1000);

    } else {

        console.log('Nerastas postas su Scrolled klase. Scrollinu i LAST post');
        $('html, body').stop(true).animate({
            scrollTop: $lastElement.offset().top
        }, 1000);

    }

    return false;
});