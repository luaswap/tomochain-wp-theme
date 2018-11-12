'use strict'

var tomochainAddons

(
    function() {
        tomochainAddons = (
            function () {
                return {
                    init: function () {
                        this.countdown()
                    }
                }
            }()
        )
    }
)(jQuery);
//@include('countdown.js')
jQuery (document).ready(function() {
    tomochainAddons.init()
})
