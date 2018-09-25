(
    function ($) {
        tomochain.testnet = function () {
            var $testnet = $('.tomochain-testnet');

            if (!$testnet.length) {
                return;
            }

            $testnet.slick({
                accessibility : false,
                adaptiveHeight: true,
                arrows: false,
                centerMode: true,
                centerPadding: '2px',
                vertical: true,
                slidesToScroll: 1,
                slidesToShow: 3,
                autoplay: true,
                autoplaySpeed: 1000,
                focusOnSelect: true
            })
        }
    }
)(jQuery);
