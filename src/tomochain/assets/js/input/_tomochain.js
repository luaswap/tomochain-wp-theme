'use strict'

var tomochain

(
    function() {
        tomochain = (
            function () {
                return {
                    init: function () {
                        this.header();
                        this.imageCarousel();
                        this.langSwitcher();
                        this.mainMenu();
                        this.mobileMenu();
                        this.roadmap();
                        this.sendgrid();
                    }
                }
            }()
        )
    }
)(jQuery);
//@include('header.js')
//@include('image-carousel.js')
//@include('lang-switcher.js')
//@include('main-menu.js')
//@include('roadmap.js')
//@include('mobile-menu.js')
//@include('sendgrid.js')
jQuery (document).ready(function() {
    tomochain.init()
})
