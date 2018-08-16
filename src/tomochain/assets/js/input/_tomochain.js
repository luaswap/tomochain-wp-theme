'use strict'

var tomochain

(
    function() {
        tomochain = (
            function () {
                return {
                    init: function () {
                        this.langSwitcher();
                        this.imageCarousel();
                        this.mainMenu();
                        this.mobileMenu();
                        this.roadmap();
                        this.utils();
                    }
                }
            }()
        )
    }
)(jQuery);
//@include('image-carousel.js')
//@include('lang-switcher.js')
//@include('main-menu.js')
//@include('roadmap.js')
//@include('mobile-menu.js')
//@include('utils.js')
jQuery (document).ready(function() {
    tomochain.init()
})
