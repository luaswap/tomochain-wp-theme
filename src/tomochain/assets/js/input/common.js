(function($) {
    // smoothScroll
    $(function(){
        var speed = 1000,
            easing = 'swing';

        $('a').not('.noscroll').click(function(){
            var href = $(this).attr('href'),
                case1 = href.charAt(0) == '#',
                case2 = location.href.split('#')[0] == href.split('#')[0];

            if(case1 || case2) {
                if(case2) {
                    href = '#'+href.split('#')[1];
                }
                var $target = $(href);
                if($target.length){
                    $('html').add($('body')).not(':animated').animate({scrollTop : String($target.offset().top - 0)},speed,easing);
                    return false;
                }
            }
        });

        $(window).on('load', function() {
            if(location.href.split('#')[1]) {
                var href = '#' + location.href.split('#')[1];
                var $target = $(href);
                $('html').add($('body')).not(':animated').animate({scrollTop : String($target.offset().top - 0)},speed,easing);
                return false;
            }
        });
    });

})(jQuery); // End of use strict