    // Navbar color change
    function navbar(){
        if ($(window).scrollTop() >= 20) {
            $('.navbar').addClass('compressed');
            $('.navbar-nav').addClass('changecolormenu');
            $('.navbar-brand').addClass('changecolorlogo');

        } else {
            $('.navbar').removeClass('compressed');
            $('.navbar-nav').removeClass('changecolormenu');
            $('.navbar-brand').removeClass('changecolorlogo');
        }
    }

    $(document).ready(function() {
        $(window).on('scroll', function() {
            navbar();
        });
        navbar();
    });


    // Swipe functions for Bootstrap Carousel

    !function(t){t.fn.bcSwipe=function(e){var n={threshold:50};return e&&t.extend(n,e),this.each(function(){function e(t){1==t.touches.length&&(u=t.touches[0].pageX,c=!0,this.addEventListener("touchmove",o,!1))}function o(e){if(c){var o=e.touches[0].pageX,i=u-o;Math.abs(i)>=n.threshold&&(h(),t(this).carousel(i>0?"next":"prev"))}}function h(){this.removeEventListener("touchmove",o),u=null,c=!1}var u,c=!1;"ontouchstart"in document.documentElement&&this.addEventListener("touchstart",e,!1)}),this}}(jQuery);

    $('.carousel').bcSwipe({ threshold: 50 });


    $('.navbar-collapse a').click(function (e) {
        $('.navbar-collapse').collapse('toggle');
    });


    // Fix navbar toggle color on mobile

    $( document ).ready(function() {
        var isMobile = window.matchMedia("only screen and (max-width: 760px)");


        if (isMobile.matches) {
            $('#navbar1').addClass('collapse');
            $('#navbar1').addClass('navbar-collapse');
            $('.navbar').addClass('navbar-dark');

        } else {
            $('#navbar1').removeClass('collapse');
            $('#navbar1').removeClass('navbar-collapse');
            $('.navbar').removeClass('navbar-dark');
        }


        $('#navbar1 a').on('click', function (e) {
            e.preventDefault();
                var target = $(this).attr('href');
                var position = $(target).position();

            if (isMobile.matches) {
                $('#navbar1').removeClass('show');
            }
            $(window).scrollTop(position.top - 100);
        })
    });
