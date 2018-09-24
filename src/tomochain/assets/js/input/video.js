(function( $ ) {
    tomochain.video = function() {

        var $videos = $('.tomochain-videos');

        $videos.flipster({
            style: 'flat',
            spacing: -0.45,
            keyboard: false,
            scrollwheel: false
        });

        $('.tomochain-video-item .video-link').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false
        });
    }
})(jQuery);
