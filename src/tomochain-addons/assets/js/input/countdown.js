(
    function ($) {
        tomochainAddons.countdown = function() {
            var equalWidthForCountdown = function() {

                $( '.tomochain-countdown' ).each( function() {

                    var max_width = 0;

                    $( this ).find( '.countdown-section' ).each( function() {

                        var width = $( this ).outerWidth();

                        if ( width > max_width ) {
                            max_width = width;
                        }
                    } );

                    $( this ).find( '.countdown-section' ).css( 'width', max_width );
                } );
            };

            var initCountdown = function($el) {
                var format    = $el.attr( 'data-countdown-format' ),
                text_singular = $el.attr( 'data-label-singular' ).split( ',' ),
                text_plural   = $el.attr( 'data-label-plural' ).split( ',' ),
                date          = new Date( $el.text().trim() ),
                server_date   = new Date( $el.attr( 'data-server-date' ) );

                $el.countdown( {
                    labels    : text_plural,
                    labels1   : text_singular,
                    format    : format,
                    until     : date,
                    padZeroes : true,
                    serverSync: server_date,
                    onTick    : function() {
                        equalWidthForCountdown();
                    },
                } );
            }

            $( '.tomochain-countdown' ).each( function() {
                var $this         = $( this );

                if ($this.closest('.rev_slider').length) {
                    $this.on('initCountdownInSlider', function() { // Trigger in custom JS of the slider settings
                        initCountdown($this);
                    });
                } else {
                    initCountdown($this);
                }

            } );
        }
})(jQuery);
