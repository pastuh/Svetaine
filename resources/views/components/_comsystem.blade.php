<script>
    // Nustatau komentaru perziura
    $(document).ready(function () {

        @if(session()->has('success'))
        $(".main_post_comments_standard").removeClass("hidden");
        $(".comment-post").addClass("hidden");
        $('html, body').animate({
            scrollTop: $(".main_post_comments_standard").offset().top
        }, 500);
        @endif

        @if(count($errors) > 0)
        $(".main_post_comments_standard").removeClass("hidden");
        $(".comment-post").addClass("hidden");
        $('html, body').animate({
            scrollTop: $(".main_post_comments_standard").offset().top
        }, 500);
        @endif

        $('.accordion').accordion({
            "transitionSpeed": 100
        });

    });

    /* Linku ant arrow blokavimas */
    [].slice.call(document.querySelectorAll('nav > a span')).forEach(function (el) {
        el.addEventListener('click', function (ev) {
            ev.preventDefault();
        });
    });


    @if($comment_time > 0)
    /* Jeigu laikas virs 0, tuomet rodyti forma ir Countdown */
    $('#submit-button').addClass('hidden');
    $('.comment-timer').removeClass('hidden');
    /* Paprastas timer */
    var count = {{ $comment_time }};
    var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

    function timer() {
        count = count - 1;
        if (count <= 0) {
            clearInterval(counter);
            $('.comment-timer').addClass('hidden');

            /*Jeigu comments counter matomas, tai nerodyti submit comment*/
            if ($('.comment-post').is(":hidden")) {
                $('#submit-button').removeClass('hidden');
            }

            $('.comment-post').click(function () {
                $('#submit-button').removeClass('hidden');
            });

            return;
        }
        document.getElementById("timer").innerHTML = count;
    }
    @else
       {{--Jeigu istrinamas komentaras, atvaizduoti submit mygtuka--}}
        @if (session()->has('deleted-comment'))
            $('#submit-button').removeClass('hidden');
    @endif

    /* Jeigu laikas yra 0 */
    $('.comment-post').click(function () {
        $('#submit-button').removeClass('hidden');
        $('.main_simple_title').css('cursor', 'pointer');
    });
    @endif

$('.main_simple_title').click(function () {
        $(this).css('cursor', '');
        $(".main_post_comments_standard,#submit-button").addClass("hidden");
        $('.comment-post').removeClass('hidden');
        $('html,body').animate({scrollTop: 0}, 'fast');
        return false;
    });


    // Paslepia Rodyti komentarus ir scroolina i komentaru forma
    $(".comment-post").click(function () {
        $(".comment-post").addClass("hidden");
        $(".main_post_comments_standard").removeClass("hidden");
        $('html, body').animate({
            scrollTop: $(".main_comments_list").offset().top
        }, 300);
    });

    //Confirm komentaro trynima
    $(".delete-button").click(function () {
        $(this).hide();
        $(this).parent().find('.delete-confirm').removeClass('hidden');
    });

    //Confirm post trynima
    $(".post-delete-confirm").click(function () {
        $(this).hide();
        $('#submit-button').removeClass('hidden');
    });

</script>