

(
    function ($) {
        tomochain.event = function () {

            $('.event-carousel').each(function() {
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
                    slidesToShow  : parseInt(atts.slide_item),
                    slidesToScroll: 1,
                    infinite      : atts.loop == 'yes',
                    autoplay      : atts.auto_play == 'yes',
                    autoplaySpeed : parseInt( atts.auto_play_speed ) * 1000,
                    responsive    : [
                        {
                        breakpoint: 1200,
                        settings  : {
                                slidesToShow  : parseInt(atts.slide_item)
                        },
                        },
                        {
                            breakpoint: 1199,
                            settings  : {
                                slidesToShow  : parseInt( atts.slide_item ) > 3 ? parseInt( atts.slide_item ) - 1 : parseInt( atts.slide_item )
                            },
                        },
                        {
                            breakpoint: 767,
                            settings  : "unslick"
                        }
                    ],
                };

                $this.slick( configs );
            });
        }
    }
)(jQuery);

