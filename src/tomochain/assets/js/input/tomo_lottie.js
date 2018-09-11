(
    function ($) {
        tomochain.tomo_lottie = function () {
            var $tomo_lottie = $('.tomochain-lottie');

            $tomo_lottie.each(function() {
                var $this         = $(this),
                    animationData = JSON.parse($this.attr('data-animation'));

                lottie.loadAnimation({
                    container    : $this[0],
                    renderer     : 'svg',
                    loop         : true,
                    autoplay     : true,
                    animationData: animationData
                })
            });
        }
    }
)(jQuery);
