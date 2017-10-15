<script>
    $(document).ready(function () {
        $('.data_isotope').isotope({
            itemSelector: '.main_data_item',
            layoutMode: 'fitRows',
        });
    });
</script>

<script>
    myFunction();

    function myFunction() {
        $(window).scroll(function () {
            if ($(this).width() < 737) {
                if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    $(".title-main").hide();
                    $(".pagination-main").show();

                } else {
                    $(".pagination-main").hide();
                    $(".title-main").show();
                }
            }

            if ($(this).width() > 768) {
                $(".pagination-main").show();
                $(".title-main").show();
            }
        });

    }

    $(window).resize(function () {
        myFunction();
    });

</script>

<script type="text/javascript" src="{{  url('js\isotope.min.js') }}"></script>
<script>
    setTimeout("jQuery('.data_isotope').isotope();", 1000);
    setTimeout("jQuery('.data_isotope').isotope();", 3000);
</script>
