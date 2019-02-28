(
    function ($) {
        tomochain.roadmap = function() {
            var $roadmap = $('.tomochain-roadmap'),
                index = $roadmap.find('.tomochain-roadmap-item--current').index();

            if (!$roadmap.length) {
                return;
            }

            $roadmap.slick({
                accessibility : false,
                // arrows: false,
                infinite: false,
                initialSlide: index,
                slidesToScroll: 1,
                slidesToShow: 4,
                responsive: [
                    {
                        breakpoint: 1201,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 426,
                        settings: 'unslick'
                    }
                ]
            });

            // if ($(window).width() >= 426) {
            //     slider.on('wheel', function(e) {
            //         e.preventDefault();

            //         if (e.originalEvent.deltaY < 0) {
            //             $(this).slick('slickNext');
            //         } else {
            //             $(this).slick('slickPrev');
            //         }
            //     });
            // }
        };
        tomochain.road_filter = function () {

            if ( $( '.tomochain-roadmap-filter' ).length < 1) {
                return;
            }

            $(document).on('click', 'a[data-filter]', function(e){

                e.preventDefault();

                var $_this   = $(this);
                var $wrapper = $('.tomochain-roadmap-content');
                var $desc    = $_this.attr('data-desc');
                var $id      = $_this.attr('data-filter');
                $wrapper.addClass('loading');
                $_this.closest('ul').find('.selected').removeClass('selected');
                $_this.parent('li').addClass('selected');
                var $params    = {
                    'id'  :  $id
                };

                $.ajax({
                    url: tomochainConfigs.ajax_url,
                    type: 'POST',
                    data: ({
                        action: 'tomochain_roadmap_ajax',
                        params: $params
                    }),
                    dataType: 'html',

                    success: function ( data ) {
                        $wrapper.removeClass('loading');
                        $wrapper.closest('.tomochain-roadmap-main').find('.roadmap-desc-infor').html($desc);
                        $wrapper.html(data);
                    }
                });
            });
        }
})(jQuery);
