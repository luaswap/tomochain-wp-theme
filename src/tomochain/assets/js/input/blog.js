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
                    slidesToShow  : parseInt( atts.slide_item ),
                    slidesToScroll: 1,
                    infinite      : atts.loop == 'yes',
                    autoplay      : atts.auto_play == 'yes',
                    autoplaySpeed : parseInt( atts.auto_play_speed ) * 1000,
                    responsive    : [
                        {
                        breakpoint: 1200,
                        settings  : {
                                slidesToShow  : parseInt( atts.slide_item )
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
            })
        }
    }
)(jQuery);
(
    function ($) {
        tomochain.blog_filter = function () {
            var $blog_filter = $('.post-cat-filter');
            if (!$blog_filter.length) {
                return;
            }
            $blog_filter.on('click','a',function(e){
                var $_this = $(this);
                window.history.pushState({},'',$(this).attr('href'));
                e.preventDefault();
                var url = $(this).attr('href');
                url = url.replace(/\/?(\?|#|$)/, "/$1");

                $.ajax({
                    url: url,
                    dataType: 'html',
                    success: function(data){
                        var new_Obj = $($(data).find('.archive-posts').html());
                        $_this.parents('.container').find('.archive-posts').html(new_Obj);
                    }
                });
            })
        }
    }
)(jQuery);