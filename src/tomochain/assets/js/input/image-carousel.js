(function( $ ) {
    tomochain.imageCarousel = function() {
        $( '.tomochain-image-carousel' ).each( function() {
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
                arrows        : false,
                slidesToShow  : parseInt( atts.number_of_images_to_show ),
                slidesToScroll: parseInt( atts.number_of_images_to_show ),
                infinite      : atts.loop == 'yes',
                autoplay      : atts.auto_play == 'yes',
                autoplaySpeed : parseInt( atts.auto_play_speed ) * 1000,
                adaptiveHeight: true,
                speed         : 1000,
                responsive    : [{
                    breakpoint: 1200,
                    settings  : {
                        dots          : true,
                        slidesToShow  : 3,
                        slidesToScroll: 3,
                    },
                }, {
                    breakpoint: 544,
                    settings  : {
                        adaptiveHeight: true,
                        slidesToShow  : 1,
                        slidesToScroll: 1
                    },
                },],
            };

            if ( parseInt( atts.number_of_images_to_show ) == 1 ) {
                configs['responsive'] = [{
                    breakpoint: 992,
                    settings  : {
                        adaptiveHeight: true,
                        slidesToShow  : 1,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 544,
                    settings  : {
                        adaptiveHeight: true,
                        slidesToShow  : 1,
                        slidesToScroll: 1,
                    },
                }];
            }

            $this.slick( configs );
        });
    }
})(jQuery);
