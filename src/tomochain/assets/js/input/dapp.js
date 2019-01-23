(
    function ($) {
        $(".btn_submit_dapp .btn-tmp-basic").click(function() {
            $(".btn_submit_dapp").fadeOut("slow");
            $(".main_form_dapp").fadeIn("slow");
        });
        $(".btn_close_dapp .btn-tmp-basic").click(function() {
            $(".btn_submit_dapp").fadeIn("slow");
            $(".main_form_dapp").fadeOut("slow");
        });

        tomochain.dapp_get_post = function ($params) {

            var $wrapper = $('.tomochain-dapp-main');
                $wrapper.addClass('loading');
            $.ajax({
                url: tomochainConfigs.ajax_url,
                type: 'POST',
                data: ({
                    action: 'tomochain_dapp_ajax',
                    params: $params
                }),
                dataType: 'html',

                success: function ( data ) {
                    $wrapper.removeClass('loading');
                    $wrapper.html(data);
                }
            });
        }
    }
)(jQuery);
(
    function ($) {
        tomochain.dapp_filter = function () {

            if ( $( '.tomochain-dapp-filter' ).length < 1) {
                return;
            }

            $(document).on('click', 'a[data-filter],.dapp-pagination a', function(e){

                e.preventDefault();

                var $_this   = $(this);
                if($_this.data('filter')){
                    var page = $_this.parents('.tomochain-dapp-filter').attr('data-page');
                    $_this.closest('ul').find('.selected').removeClass('selected');
                    $_this.parent('li').addClass('selected');
                }else {
                    /**
                     * Pagination
                     */
                    var page = parseInt($_this.attr('href').replace(/\D/g,''));
                    $_this = $('.tomochain-dapp-filter .selected a');
                }
                var $params    = {
                    'page' : page,
                    'id'  :  $_this.attr('data-filter'),
                    'per_page'  : $_this.parents('.tomochain-dapp-filter').attr('data-number')
                };
                tomochain.dapp_get_post($params);
            });
        }
    }
)(jQuery);

(function( $ ) {
    tomochain.dapp_slide = function() {
        $( '.dapp-slide' ).each( function() {
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
                            slidesToShow  : 4
                    },
                    },
                    {
                        breakpoint: 769,
                        settings  : {
                            slidesToShow  : 3
                        },
                    },
                    {
                        breakpoint: 544,
                        settings  : {
                            slidesToShow  : 2
                        },
                    }
                ],
            };

            if ( parseInt( atts.slide_item ) == 1 ) {
                configs['responsive'] = [{
                    breakpoint: 1200,
                    settings  : {
                        adaptiveHeight: true,
                        slidesToShow  : 2
                    },
                },
                {
                    breakpoint: 544,
                    settings  : {
                        adaptiveHeight: true,
                        slidesToShow  : 2
                    },
                }];
            }

            $this.slick( configs );
        });
    }
})(jQuery);

