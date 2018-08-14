(
    function ($) {
        tomochain.utils = function () {
            this.addPlaceHolder();
        },
        // add place holder text for subscribe widget
        tomochain.addPlaceHolder = function () {
            var text = tomochainConfigs.placeholder_subscribe_text;

            if (text) {
                $('#sendgrid_mc_email').attr('placeholder', text);
            }
        }
    }
)(jQuery);
