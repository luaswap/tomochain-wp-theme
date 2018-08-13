(
    function ($) {
        tomochain.mainMenu = function() {
            var $siteHeader   = $( '.site-header:not(.sticky-header)' ),
                $stickyHeader = $( '.site-header.sticky-header' ),
                $mainMenu     = $siteHeader.find( '.main-menu' );

                if ( $stickyHeader.hasClass( 'is-sticky' ) ) {
                    $mainMenu = $stickyHeader.find( '.main-menu' );
                }

                if ( ! $mainMenu.length && ! $mainMenu.find( 'ul.menu' ).length ) {
                    return;
                }

                $mainMenu.find('ul.menu').superfish({
                    delay       : 300,
                    speed       : 300,
                    speedOut    : 300,
                    autoArrows  : false,
                    dropShadows : false,
                    onBeforeShow: function() {
                        $( this ).removeClass( 'animated fast fadeOutDownSmall' );
                        $( this ).addClass( 'animated fast fadeInUpSmall' );
                    },
                    onBeforeHide: function() {
                        $( this ).removeClass( 'animated fast fadeInUpSmall' );
                        $( this ).addClass( 'animated fast fadeOutDownSmall' );
                    }
                });
        }
    }
)(jQuery);
