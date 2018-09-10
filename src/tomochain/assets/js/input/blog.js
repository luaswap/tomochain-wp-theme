(
    function ($) {
        tomochain.blog = function () {
            $('.blog-carousel').each(function() {
                var $this = $( this ),
                    atts  = JSON.parse( $this.attr( 'data-atts' ) );

                if ( atts == null ) {
                    return;
                }

                if ( typeof atts.auto_play_speed === 'undefined' || isNaN( atts.auto_play_speed ) ) {
                    atts.auto_play_speed = 5;
                }

                var configs = {
                    accessibility : false,
                    slidesToShow  : 4,
                    slidesToScroll: 1,
                    infinite      : atts.loop == 'yes',
                    autoplay      : atts.auto_play == 'yes',
                    autoplaySpeed : parseInt( atts.auto_play_speed ) * 1000,
                    responsive    : [
                        {
                        breakpoint: 1200,
                        settings  : {
                                slidesToShow  : 4
                        },
                        },
                        {
                            breakpoint: 1199,
                            settings  : {
                                slidesToShow  : 3
                            },
                        },
                        {
                            breakpoint: 767,
                            settings  : "unslick"
                        }
                    ],
                };

                var slider = $this.slick( configs );

                if ($(window).width() >= 768) {
                    slider.on('wheel', function(e) {
                        e.preventDefault();

                        if (e.originalEvent.deltaY < 0) {
                            $(this).slick('slickNext');
                        } else {
                            $(this).slick('slickPrev');
                        }
                    });
                }
            })
        }
    }
)(jQuery);
