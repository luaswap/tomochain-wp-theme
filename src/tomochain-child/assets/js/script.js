jQuery(document).ready(function($) {

    if (typeof $.fn.waypoint !== 'undefined') {

        var $image = $('#train-image');

        $( '#station-1' ).waypoint(function(direction) {
            $image.css('margin-top', direction == 'down' ? -862 : -1160);

            if (direction == 'down') {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        }, {
            offset: '80%'
        });

        $( '#station-2' ).waypoint(function(direction) {
            $image.css('margin-top', direction == 'down' ? -618 : -862);

            if (direction == 'down') {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        }, {
            offset: '80%'
        });

        $( '#station-3' ).waypoint(function(direction) {
            $image.css('margin-top', direction == 'down' ? -375 : -618);

            if (direction == 'down') {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        }, {
            offset: '80%'
        });

        $( '#station-4' ).waypoint(function(direction) {
            $image.css('margin-top', direction == 'down' ? -80 : -375);

            if (direction == 'down') {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        }, {
            offset: '80%'
        });
    }

    function calculateForLaptop() {
        var w = $(window).width();

        if (w >= 1024 && w <= 1919) {
            var rect1 = $('#masthead .container')[0].getBoundingClientRect(),
                right = (w - rect1.width)/2 + 15;
            $('body.mainnet-page .wpb_revslider_element .tp-parallax-wrap:nth-child(2) img').css('right', right);
        }
    }

    $(document).on('calculateForLaptop', function() {
        calculateForLaptop();
    });

    $(window).on('resize', function() {
        calculateForLaptop();
    });
});
