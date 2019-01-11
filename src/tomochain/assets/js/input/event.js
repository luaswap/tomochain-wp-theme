

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

            var event_filter = function () {

                if ( ! $('.event-cat-filter').length ) {
                    return;
                }

                $(document).on('click', '.event-cat-filter a, .page-numbers a', function(e){

                    e.preventDefault();

                    var $_this   = $(this),
                        url      = $(this).attr('href'),
                        $wrapper = $('.tomo-archive-wrapper');

                    url = url.replace(/\/?(\?|#|$)/, "/$1");

                    $.ajax({
                        url: url,
                        dataType: 'html',

                        beforeSend: function() {
                            $wrapper.addClass('loading');
                        },

                        success: function ( data ) {
                            $wrapper.removeClass('loading');

                            var posts = $($(data).find('.archive-posts').html());
                            $_this.parents('.container').find('.archive-posts').html(posts);
                        }
                    });
                });

                $(document).on('click', '.page-numbers a', function() {
                    $('html, body').animate({
                        scrollTop: $('.event-cat-filter').offset().top - 100
                    }, 400);
                });
            }

            event_filter();
        }
    }
)(jQuery);

(
    function ($) {
        tomochain.tab_active = function () {
            $('.tab-filter li:first').addClass('selected');
            $('.tab-filter li a').on('click', function(e){
                e.preventDefault();
                $('.tab-filter li').removeClass('selected');
                $(this).parent().addClass('selected');
            });
        }
    }
)(jQuery);
