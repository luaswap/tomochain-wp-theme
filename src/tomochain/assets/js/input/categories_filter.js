(
    function ($) {
        tomochain.categories_filter = function () {

            if ( ! $( '.tomo-categories-filter' ).length ) {
                return;
            }

            $(document).on('click', '.tomo-categories-filter a, .tomochain-pagination .page-numbers a', function(e){

                e.preventDefault();

                var $_this   = $(this),
                    url      = $(this).attr('href'),
                    $wrapper = $('.tomo-archive-wrapper');

                $wrapper.addClass('loading');

                url = url.replace(/\/?(\?|#|$)/, "/$1");

                $.ajax({
                    url: url,
                    dataType: 'html',

                    success: function ( data ) {
                        $wrapper.removeClass('loading');

                        var posts = $($(data).find('.archive-posts').html());
                        $_this.closest('.container').find('.archive-posts').html(posts);
                    }
                });
            });

            $( document ).on('click', '.tomochain-pagination .page-numbers a', function() {
                $('html, body').animate({
                    scrollTop: $( '.tomo-categories-filter' ).offset().top - 100
                }, 400);
            });

            $( document ).on('click', '.tomo-categories-filter a', function(e){

                e.preventDefault();

                $('.tomo-categories-filter li').removeClass('selected');
                $(this).parent().addClass('selected');
            });
        }
    }
)(jQuery);
