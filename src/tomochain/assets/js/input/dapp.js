(
    function ($) {
        $(".btn_submit_dapp .btn-tmp-basic").click(function() {
            $(".btn_submit_dapp").fadeOut("slow");
            $(".main_form_dapp").fadeIn("slow");
        });
        $(".btn_close_dapp .btn-tmp-basic").click(function() {
            $(".btn_submit_dapp").fadeIn("slow");
            $(".main_form_dapp").fadeOut("slow");
        });
    }
)(jQuery);
(
    function ($) {
        tomochain.dapp_categories_filter = function () {

            if ( ! $( '.tomochain-dapp-filter' ).length ) {
                return;
            }

            $(document).on('click', '.tomochain-dapp-filter a, .tomochain-dapp-pagination .page-numbers a', function(e){

                e.preventDefault();

                var $_this   = $(this),
                    url      = $(this).attr('href'),
                    $wrapper = $('.tomochain-dapp-main');

                $wrapper.addClass('loading');

                url = url.replace(/\/?(\?|#|$)/, "/$1");

                $.ajax({
                    url: url,
                    dataType: 'html',

                    success: function ( data ) {
                        $wrapper.removeClass('loading');

                        var posts = $($(data).find('.tomochain-dapp-main').html());
                        $wrapper.html(posts);
                    }
                });
            });

            $( document ).on('click', '.tomochain-dapp-pagination .page-numbers a', function() {
                $('html, body').animate({
                    scrollTop: $( '.tomochain-dapp-filter' ).offset().top - 100
                }, 400);
            });

            $( document ).on('click', '.tomochain-dapp-filter a', function(e){

                e.preventDefault();

                $('.tomochain-dapp-filter li').removeClass('selected');
                $(this).parent().addClass('selected');
            });
        }
    }
)(jQuery);