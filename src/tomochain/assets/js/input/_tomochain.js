'use strict'

var tomochain

(
    function() {
        tomochain = (
            function () {
                return {
                    init: function () {
                        this.mobileMenu();
                    }
                }
            }()
        )
    }
)(jQuery);
//@include('mobile-menu.js')
jQuery (document).ready(function() {
    tomochain.init()
})
