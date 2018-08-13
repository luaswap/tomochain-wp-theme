'use strict'

var tomochain

(
    function() {
        tomochain = (
            function () {
                return {
                    init: function () {
                        this.mobileMenu();
                        this.mainMenu();
                    }
                }
            }()
        )
    }
)(jQuery);
(
    function ($) {
        var $window = $( window ),
            $body   = $( 'body' );

        tomochain.setTopValue = function ($el) {
            var $adminBar = $( '#wpadminbar' ),
                w         = $window.width(),
                h         = $adminBar.height(),
                top       = h;

            if ( $adminBar.length ) {
                var t = $adminBar[0].getBoundingClientRect().top;
                top = (t >= 0 - h) ? h + t : 0;
            }

            if ( $el.closest( '.sticky-header.is-sticky' ).length ) {
                top = 0;
            }

            $el.css( 'top', top );
        };

        tomochain.mobileMenu = function () {
            var $mobileBtn      = $( '.mobile-menu-btn' ),
                $mobileMenu     = $( '#site-mobile-menu' ),
                $mobileMenuWrap = $( '.site-mobile-menu-wrapper' ),
                $siteContent    = $( '#content.site-content' );

            var caculateRealHeight = function( $ul ) {
                var height = 0;

                $ul.find( '>li' ).each( function() {
                    height += $( this ).outerHeight();
                } );

                return height;
            };

            var setUpOverflow = function( h1, h2 ) {
                if ( h1 < h2 ) {
                    $mobileMenuWrap.css( 'overflow-y', 'hidden' );
                } else {
                    $mobileMenuWrap.css( 'overflow-y', 'auto' );
                }
            };

            var buildSlideOut = function() {
                if ( typeof $mobileMenu !== 'undefined' && typeof $siteContent !== 'undefined' ) {
                    $mobileBtn.on( 'click', function() {
                        $( this ).toggleClass( 'is-active' );
                        $body.toggleClass( 'mobile-menu-opened' );
                        tomochain.setTopValue( $mobileMenuWrap );
                    } );

                    // Close menu if click on the site
                    $siteContent.on( 'click touchstart', function( e ) {
                        if ( ! $( e.target ).closest( '.mobile-menu-btn' ).length ) {
                            if ( $body.hasClass( 'mobile-menu-opened' ) ) {
                                $body.removeClass( 'mobile-menu-opened' );
                                $mobileBtn.removeClass( 'is-active' );
                                $mobileMenu.find( '#searchform input[type="text"]' ).blur();
                                e.preventDefault();
                            }
                        }
                    } );

                    setUpOverflow( $mobileMenu.height(), $mobileMenuWrap.height() );
                }
            };

            var buildDrillDown = function() {
                var level  = 0,
                    opener = '<span class="open-child">open</span>',
                    height = $mobileMenuWrap.height();

                $mobileMenu.find( 'li:has(ul)' ).each( function() {
                    var $this   = $( this ),
                        allLink = $this.find( '> a' ).clone();

                    if ( allLink.length ) {
                        $this.prepend( opener );
                        allLink.find( '.menu-item-tag' ).remove();
                        $this.find( '> ul' )
                                .prepend( '<li class="menu-back">' + allLink.wrap( '<div>' )
                                                                            .parent()
                                                                            .html() + '</a></li>' );
                    }
                } );

                $mobileMenu.on( 'click', '.open-child', function() {
                    var $parent = $( this ).parent();

                    if ( $parent.hasClass( 'over' ) ) {
                        $parent.removeClass( 'over' );
                        level --;
                        if ( level == 0 ) {
                            setUpOverflow( $mobileMenu.height(), height );
                        }
                    } else {
                        $parent.parent().find( '>li.over' ).removeClass( 'over' );
                        $parent.addClass( 'over' );
                        level ++;
                        setUpOverflow( caculateRealHeight( $parent.find( '>.sub-menu' ) ), height );
                    }

                    $mobileMenu.parent().scrollTop( 0 );
                } );

                $mobileMenu.on( 'click', '.menu-back', function() {
                    var $grand = $( this ).parent().parent();
                    if ( $grand.hasClass( 'over' ) ) {
                        $grand.removeClass( 'over' );
                        level --;

                        if ( level == 0 ) {
                            setUpOverflow( $mobileMenu.height(), height );
                        }
                    }

                    $mobileMenu.parent().scrollTop( 0 );
                } );

                $mobileMenu.on( 'click', '.menu-back > a', function(e) {
                    e.preventDefault();
                });
            };

            buildSlideOut();
            buildDrillDown();

            // re-calculate the top value of mobile menu when resize
            $window.on( 'resize', function() {
                tomochain.setTopValue( $mobileMenuWrap );
            } );
        }
    }
)(jQuery);

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

jQuery (document).ready(function() {
    tomochain.init()
})
