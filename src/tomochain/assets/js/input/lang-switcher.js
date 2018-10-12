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

                var $niceSelect     = $this.parent().find( '.nice-select' ),
                    selectedImgSrc  = $this.find( ':selected' ).attr( 'data-imagesrc' );

                if ( typeof selectedImgSrc != 'undefined' ) {
                    $niceSelect.find( 'span.current' ).prepend( '<img class="flag" src="' + selectedImgSrc + '" alt="" />' );
                }

                $this.find('option').each(function() {

                    var imgSrc = $(this).attr( 'data-imagesrc' ),
                        value  = $(this).attr('value');

                    // Add flag image
                    if ( typeof imgSrc != 'undefined' ) {
                        $niceSelect.find('li.option[data-value="' + value + '"]').prepend( '<img class="flag" src="' + imgSrc + '" alt="" />' );
                    }

                })

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
