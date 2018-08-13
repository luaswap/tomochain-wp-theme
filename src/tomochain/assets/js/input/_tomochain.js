'use strict'

var tomochain

(
    function() {
        tomochain = (
            function () {
                return {
                    init: function () {
                        this.mobileMenu();
                        this.mainMenu();
                    }
                }
            }()
        )
    }
)(jQuery);
//@include('mobile-menu.js')
//@include('main-menu.js')
jQuery (document).ready(function() {
    tomochain.init()
})
