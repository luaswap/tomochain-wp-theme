(
    function ($) {
        tomochain.langSwitcher = function() {
            var $body                  = $( 'body' ),
                $languageSwitcher      = $( '#tomochain-lang-switcher' );

            $languageSwitcher.each(function() {
                var $this = $( this );

                if ( $( 'option', $this ).length ) {
                    $this.niceSelect();
                }

                $body.on( 'click', '.tomochain-lang-switcher-wrapper .nice-select .option', function() {
                    var $this = $( this );

                    $( '.tomochain-lang-switcher-wrapper' ).addClass( 'loading' );
                    setTimeout( function() {
                        window.location = $this.attr( 'data-value' );
                    }, 1000 );
                });
            });

        }
    }
)(jQuery);
