(
    function ($) {
        tomochain.sendgrid = function () {
            $('#tomo-sendgrid-form').on('submit', function(e) {
                e.preventDefault();

                var $form = $(this),
                    email = $form.find('#tomo-sendgrid-email').val();

                $form.addClass('loading');

                $.ajax({
                    type: 'POST',
                    url: tomochainConfigs.ajax_url,
                    data: {
                        action: 'tomochain_process_subscription',
                        email: email
                    },
                    success: function (response) {
                        $form.removeClass('loading');

                        if (response.code && response.message) {
                            $form.addClass(response.code);
                            $('.tomo-sendgrid-text').text(response.message).addClass('show');
                        }
                    }
                });
            });
        }
    }
)(jQuery);
