(
    function ($) {
        tomochain.dapp_get_post = function ($params) {

                var $wrapper = $('.tomochain-dapp-main');
                    $wrapper.addClass('loading');
                $.ajax({
                    url: tomochainConfigs.ajax_url,
                    type: 'POST',
                    data: ({
                        action: 'tomochain_dapp_ajax',
                        params: $params
                    }),
                    dataType: 'html',

                    success: function ( data ) {
                        $wrapper.removeClass('loading');
                        $wrapper.html(data);
                    }
                });
        }
    }
)(jQuery);
(
    function ($) {
        tomochain.dapp_filter = function () {

            if ( $( '.tomochain-dapp-filter' ).length < 1) {
                return;
            }

            $(document).on('click', 'a[data-filter],.dapp-pagination a', function(e){

                e.preventDefault();

                var $_this   = $(this);
                if($_this.data('filter')){
                    var page = $_this.parents('.tomochain-dapp-filter').attr('data-page');
                    $_this.closest('ul').find('.selected').removeClass('selected');
                    $_this.parent('li').addClass('selected');
                }else {
                    /**
                     * Pagination
                     */
                    var page = parseInt($_this.attr('href').replace(/\D/g,''));
                    $_this = $('.tomochain-dapp-filter .selected a');
                }
                var $params    = {
                    'page' : page,
                    'id'  :  $_this.attr('data-filter'),
                    'per_page'  : $_this.parents('.tomochain-dapp-filter').attr('data-number')
                };
                tomochain.dapp_get_post($params);
            });
        }
    }
)(jQuery);