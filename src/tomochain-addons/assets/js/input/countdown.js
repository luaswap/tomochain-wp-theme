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

            $( '.tomochain-countdown' ).each( function() {
                var $this         = $( this ),
                    format        = $this.attr( 'data-countdown-format' ),
                    text_singular = $this.attr( 'data-label-singular' ).split( ',' ),
                    text_plural   = $this.attr( 'data-label-plural' ).split( ',' ),
                    date          = new Date( $this.text().trim() ),
                    server_date   = new Date( $this.attr( 'data-server-date' ) );

                $this.countdown( {
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

            } );
        }
})(jQuery);
