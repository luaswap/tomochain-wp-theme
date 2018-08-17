(
    function ($) {
        tomochain.roadmap = function() {
            var $roadmap = $('.tomochain-roadmap'),
                index = $roadmap.find('.tomochain-roadmap-item--current').index();

            var slider = $('.tomochain-roadmap').slick({
                accessibility : false,
                arrows: false,
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

            slider.on('wheel', function(e) {
                e.preventDefault();

                if (e.originalEvent.deltaY < 0) {
                    $(this).slick('slickNext');
                } else {
                    $(this).slick('slickPrev');
                }
            });
        }
})(jQuery);
