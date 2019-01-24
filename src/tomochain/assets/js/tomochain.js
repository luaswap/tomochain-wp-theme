'use strict'

var tomochain

(
    function() {
        tomochain = (
            function () {
                return {
                    init: function () {
                        this.header();
                        this.imageCarousel();
                        this.langSwitcher();
                        this.mainMenu();
                        this.mobileMenu();
                        this.roadmap();
                        this.sendgrid();
                        this.team();
                        this.testnet();
                        this.tomo_lottie();
                        this.video();
                        this.event();
                        this.blog();
                        this.categories_filter();
                        this.dapp_filter();
                        this.dapp_slide();
                    }
                }
            }()
        )
    }
)(jQuery);
(
    function ($) {
        tomochain.blog = function () {
            $('.blog-carousel').each(function() {
                var $this = $( this ),
                    atts  = JSON.parse( $this.attr( 'data-atts' ) );

                if ( atts == null ) {
                    return;
                }

                if ( typeof atts.auto_play_speed === 'undefined' || isNaN( atts.auto_play_speed ) ) {
                    atts.auto_play_speed = 5;
                }

                var configs = {
                    accessibility : false,
                    slidesToShow  : parseInt( atts.slide_item ),
                    slidesToScroll: 1,
                    infinite      : atts.loop == 'yes',
                    autoplay      : atts.auto_play == 'yes',
                    autoplaySpeed : parseInt( atts.auto_play_speed ) * 1000,
                    responsive    : [
                        {
                        breakpoint: 1200,
                        settings  : {
                                slidesToShow  : parseInt( atts.slide_item )
                        },
                        },
                        {
                            breakpoint: 1199,
                            settings  : {
                                slidesToShow  : parseInt( atts.slide_item ) > 3 ? parseInt( atts.slide_item ) - 1 : parseInt( atts.slide_item )
                            },
                        },
                        {
                            breakpoint: 767,
                            settings  : "unslick"
                        }
                    ],
                };

                $this.slick( configs );
            })
        }
    }
)(jQuery);

(
    function ($) {
        tomochain.categories_filter = function () {

            if ( ! $( '.tomo-categories-filter' ).length ) {
                return;
            }

            $(document).on('click', '.tomo-categories-filter a, .page-numbers a', function(e){

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

            $( document ).on('click', '.page-numbers a', function() {
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

(function( $ ) {
    tomochain.dapp_slide = function() {
        $( '.dapp-slide' ).each( function() {
            var $this = $( this ),
                atts  = JSON.parse( $this.attr( 'data-atts' ) );

            if ( atts == null ) {
                return;
            }

            if ( typeof atts.auto_play_speed === 'undefined' || isNaN( atts.auto_play_speed ) ) {
                atts.auto_play_speed = 5;
            }

            var configs = {
                accessibility : false,
                slidesToShow  : parseInt( atts.slide_item ),
                slidesToScroll: 1,
                infinite      : atts.loop == 'yes',
                autoplay      : atts.auto_play == 'yes',
                autoplaySpeed : parseInt( atts.auto_play_speed ) * 1000,
                responsive    : [
                    {
                    breakpoint: 1200,
                    settings  : {
                            slidesToShow  : 4
                    },
                    },
                    {
                        breakpoint: 769,
                        settings  : {
                            slidesToShow  : 3
                        },
                    },
                    {
                        breakpoint: 544,
                        settings  : {
                            slidesToShow  : 2
                        },
                    }
                ],
            };

            if ( parseInt( atts.slide_item ) == 1 ) {
                configs['responsive'] = [{
                    breakpoint: 1200,
                    settings  : {
                        adaptiveHeight: true,
                        slidesToShow  : 2
                    },
                },
                {
                    breakpoint: 544,
                    settings  : {
                        adaptiveHeight: true,
                        slidesToShow  : 2
                    },
                }];
            }

            $this.slick( configs );
        });
    }
})(jQuery);




(
    function ($) {
        tomochain.event = function () {

            $('.event-carousel').each(function() {
                var $this = $( this ),
                    atts  = JSON.parse( $this.attr( 'data-atts' ) );

                if ( atts == null ) {
                    return;
                }

                if ( typeof atts.auto_play_speed === 'undefined' || isNaN( atts.auto_play_speed ) ) {
                    atts.auto_play_speed = 5;
                }

                var configs = {
                    accessibility : false,
                    slidesToShow  : parseInt(atts.slide_item),
                    slidesToScroll: 1,
                    infinite      : atts.loop == 'yes',
                    autoplay      : atts.auto_play == 'yes',
                    autoplaySpeed : parseInt( atts.auto_play_speed ) * 1000,
                    responsive    : [
                        {
                        breakpoint: 1200,
                        settings  : {
                                slidesToShow  : parseInt(atts.slide_item)
                        },
                        },
                        {
                            breakpoint: 1199,
                            settings  : {
                                slidesToShow  : parseInt( atts.slide_item ) > 3 ? parseInt( atts.slide_item ) - 1 : parseInt( atts.slide_item )
                            },
                        },
                        {
                            breakpoint: 767,
                            settings  : "unslick"
                        }
                    ],
                };

                $this.slick( configs );
            });
        }
    }
)(jQuery);


(
    function ($) {
        tomochain.header = function () {
            $('.site-header').headroom();
        }
    }
)(jQuery);

(function( $ ) {
    tomochain.imageCarousel = function() {
        $( '.tomochain-image-carousel' ).each( function() {
            var $this = $( this ),
                atts  = JSON.parse( $this.attr( 'data-atts' ) );

            if ( atts == null ) {
                return;
            }

            if ( typeof atts.auto_play_speed === 'undefined' || isNaN( atts.auto_play_speed ) ) {
                atts.auto_play_speed = 5;
            }

            var configs = {
                accessibility : false,
                slidesToShow  : parseInt( atts.number_of_images_to_show ),
                slidesToScroll: 1,
                infinite      : atts.loop == 'yes',
                autoplay      : atts.auto_play == 'yes',
                autoplaySpeed : parseInt( atts.auto_play_speed ) * 1000,
                responsive    : [
                    {
                    breakpoint: 1200,
                    settings  : {
                            slidesToShow  : 4
                    },
                    },
                    {
                        breakpoint: 769,
                        settings  : {
                            slidesToShow  : 3
                        },
                    },
                    {
                        breakpoint: 544,
                        settings  : {
                            slidesToShow  : 2
                        },
                    }
                ],
            };

            if ( parseInt( atts.number_of_images_to_show ) == 1 ) {
                configs['responsive'] = [{
                    breakpoint: 1200,
                    settings  : {
                        adaptiveHeight: true,
                        slidesToShow  : 2
                    },
                },
                {
                    breakpoint: 544,
                    settings  : {
                        adaptiveHeight: true,
                        slidesToShow  : 2
                    },
                }];
            }

            $this.slick( configs );
        });
    }
})(jQuery);

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

(
    function ($) {
        tomochain.roadmap = function() {
            var $roadmap = $('.tomochain-roadmap'),
                index = $roadmap.find('.tomochain-roadmap-item--current').index();

            if (!$roadmap.length) {
                return;
            }

            $roadmap.slick({
                accessibility : false,
                // arrows: false,
                infinite: false,
                initialSlide: index,
                slidesToScroll: 1,
                slidesToShow: 4,
                responsive: [
                    {
                        breakpoint: 1201,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 426,
                        settings: 'unslick'
                    }
                ]
            });

            // if ($(window).width() >= 426) {
            //     slider.on('wheel', function(e) {
            //         e.preventDefault();

            //         if (e.originalEvent.deltaY < 0) {
            //             $(this).slick('slickNext');
            //         } else {
            //             $(this).slick('slickPrev');
            //         }
            //     });
            // }
        }
})(jQuery);

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

(
    function ($) {
        var $window       = $( window ),
            $document     = $( document ),
            $body         = $( 'body' ),
            maxQuickWidth = 725;

        tomochain.team = function () {
            var $info = $('#team-member-info');

            $('.tomochain-team-member__open-popup').on('click', function(e) {
                var $this   = $(this),
                    $member = $this.closest('.tomochain-team-member'),
                    $image  = $this.find('img')

                e.preventDefault();

                if ($member.hasClass('tomochain-team-member--hide-info')) {
                    return;
                }

                setContent($(this).closest('.tomochain-team-member'));

                animateProfile($image, 200, maxQuickWidth, 'open');
            });

            $('.team-member-info__close').on('click', function(e) {
                e.preventDefault();
                closeQuickView( 200, maxQuickWidth );
            });

            $body.on('click', function(e) {
                if (!$(e.target).closest('#team-member-info').length
                    && $body.hasClass('info-opened')) {
                    closeQuickView( 200, maxQuickWidth );
                }
            });

            $('.tomochain-team__see-all').on('click', function(e){
                e.preventDefault();

                if (!$(this).hasClass('tomochain-team__see-all--collapse')) {
                    $(this).addClass('tomochain-team__see-all--collapse');
                    $('.tomochain-team--hide .tomochain-team__wrapper').show(500).css('display', 'grid');
                } else {
                    $(this).removeClass('tomochain-team__see-all--collapse');
                    $('.tomochain-team--hide .tomochain-team__wrapper').hide(500);
                }
            })

            // if user has pressed 'Esc'
            $document.keyup( function( event ) {
                if ( event.which == '27' ) {
                    closeQuickView( 200, maxQuickWidth );
                }
            } );

            $window.on( 'resize', function() {
                if ( $info.hasClass( 'is-visible' ) ) {
                    window.requestAnimationFrame( resizeQuickView );
                }
            } );

            var setContent = function($el) {

                if (!$el.length) {
                    return;
                }

                if ($('.tomochain-team-member__twitter').length) {
                    $('.tomochain-team-member__twitter').remove();
                }

                if ($('.tomochain-team-member__linkedin').length) {
                    $('.tomochain-team-member__linkedin').remove();
                }

                if ($('.tomochain-team-member__github').length) {
                    $('.tomochain-team-member__github').remove();
                }

                var atts = JSON.parse($el.attr('atts'));

                $('.team-member-info__image img').attr('src', atts.image_url);
                $('.team-member-info__name').html(atts.name);
                $('.team-member-info__role').html(atts.role);
                $('.team-member-info__description').html(atts.description);

                if (atts.twitter) {
                    $('.team-member-info__social').append('<a href="' + atts.twitter + '" class="tomochain-team-member__twitter" target="_blank"><i class="fab fa-twitter"/></a>')
                }

                if (atts.linkedin) {
                    $('.team-member-info__social').append('<a href="' + atts.linkedin + '" class="tomochain-team-member__linkedin" target="_blank"><i class="fab fa-linkedin"/></a>')
                }

                if (atts.github) {
                    $('.team-member-info__social').append('<a href="' + atts.github + '" class="tomochain-team-member__github" target="_blank"><i class="fab fa-github"/></a>')
                }
            }

            var removeContent = function() {
                if ($('.tomochain-team-member__twitter').length) {
                    $('.tomochain-team-member__twitter').remove();
                }

                if ($('.tomochain-team-member__linkedin').length) {
                    $('.tomochain-team-member__linkedin').remove();
                }

                if ($('.tomochain-team-member__github').length) {
                    $('.tomochain-team-member__github').remove();
                }

                $('.team-member-info__image img').attr('src', '');
                $('.team-member-info__name').html('');
                $('.team-member-info__role').html('');
                $('.team-member-info__description').html('');
            }

            var closeQuickView = function(finalWidth, maxQuickWidth) {
                var selectedImage = $( '.tomochain-team-member.empty-box' ).find( '.tomochain-team-member__image img' );
                animateProfile( selectedImage, finalWidth, maxQuickWidth, 'close' );
            }

            var getFinalHeight = function() {
                var width       = $window.width(),
                    finalHeight = 332;

                if (width <= 425) {
                    finalHeight = 480;
                }

                if (width > 425 && width <= 576) {
                    finalHeight = 400;
                }

                if (width > 576) {
                    finalHeight = 332;
                }

                return finalHeight;
            }

            var getImagePos = function() {
                var width       = $window.width(),
                    pos = 0;

                if (width > 576) {
                    pos = 35;
                }

                return pos;
            }

            var resizeQuickView = function() {

                var infoLeft = ($window.width() - $info.width()) / 2,
                    infoTop  = ($window.height() - $info.height()) / 2;

                $info.css( {
                    'top' : infoTop,
                    'left': infoLeft,
                } );
            };

            var animateProfile = function( image, finalWidth, maxQuickWidth, animationType ) {
                var target         = '#team-member-info',
                    timeline       = anime.timeline(),
                    parentListItem = image.closest( '.tomochain-team-member' ),
                    topSelected    = image.offset().top - $window.scrollTop(),
                    leftSelected   = image.offset().left,
                    widthSelected  = image.width(),
                    heightSelected = image.height(),
                    windowWidth    = $window.width(),
                    windowHeight   = $window.height(),
                    finalLeft      = (windowWidth - finalWidth) / 2,
                    finalHeight    = getFinalHeight(),
                    finalTop       = (windowHeight - finalHeight) / 2,
                    infoWidth      = (windowWidth * .8 < maxQuickWidth) ? windowWidth * .8 : maxQuickWidth,
                    infoLeft       = (windowWidth - infoWidth) / 2;

                if (animationType === 'open') {
                    parentListItem.addClass('empty-box');

                    timeline.add({
                        targets   : target,
                        top       : [topSelected, finalTop + 'px'],
                        left      : [leftSelected, finalLeft + 'px'],
                        height    : [0, finalHeight + 'px'],
                        width     : [widthSelected, finalWidth + 'px'],
                        duration  : 1000,
                        elasticity: 5,
                        begin     : function( anim ) {
                            $info.addClass( 'is-visible' );
                            $body.addClass( 'info-opened' );
                        },
                    })
                    .add({
                        targets: target + ' .team-member-info__image img',
                        borderRadius: ['8px', '80px'],
                        height: [200, 80],
                        width: [200, 80],
                        marginTop: [0, getImagePos()],
                        marginLeft: [0, getImagePos()],
                        duration  : 500,
                        easing    : 'easeInSine',
                        offset    : '-=600'
                    })
                    .add({
                        targets   : target,
                        left    : infoLeft + 'px',
                        width   : infoWidth + 'px',
                        duration: 400,
                        easing  : 'easeInSine',
                        offset    : '-=400',
                        begin   : function( anim ) {
                            $info.addClass( 'animate-width' );
                        },
                        complete: function( anim ) {
                            $info.addClass( 'add-content' );
                        }
                    })
                } else {
                    timeline = anime.timeline();

                    timeline.add( {
                        targets : target,
                        left    : [infoLeft + 'px', finalLeft + 'px'],
                        width   : [infoWidth + 'px', finalWidth + 'px'],
                        height  : [finalHeight, 0],
                        duration: 400,
                        easing  : 'easeInSine',
                        begin   : function( anim ) {
                            $info.removeClass( 'add-content' );
                        }
                    } )
                    .add({
                        targets: target + ' .team-member-info__image img',
                        borderRadius: ['80px', '8px'],
                        height: heightSelected,
                        width: widthSelected,
                        marginTop: [getImagePos(), 0],
                        marginLeft: [getImagePos(), 0],
                        duration  : 400,
                        easing  : 'easeInSine',
                        offset    : '-=300'
                    })
                    .add( {
                        targets : target,
                        top     : [finalTop + 'px', topSelected],
                        left    : [finalLeft + 'px', leftSelected],
                        width   : [finalWidth + 'px', widthSelected],
                        height  : [finalHeight + 'px', heightSelected],
                        duration: 500,
                        easing  : 'easeInSine',
                        begin   : function( anim ) {
                            $info.removeClass( 'animate-width' );
                        },
                        complete: function( anim ) {
                            $info.removeClass( 'is-visible' );
                            $body.removeClass( 'info-opened' );
                            parentListItem.removeClass( 'empty-box' );
                            removeContent();
                        }
                    } )
                }
            }
        }
    }
)(jQuery);

(
    function ($) {
        tomochain.testnet = function () {
            var $testnet = $('.tomochain-testnet');

            if (!$testnet.length) {
                return;
            }

            $testnet.slick({
                accessibility : false,
                adaptiveHeight: true,
                arrows: false,
                centerMode: true,
                centerPadding: '2px',
                vertical: true,
                slidesToScroll: 1,
                slidesToShow: 3,
                autoplay: true,
                autoplaySpeed: 1000,
                focusOnSelect: true
            })
        }
    }
)(jQuery);

(
    function ($) {
        tomochain.tomo_lottie = function () {
            var $tomo_lottie = $('.tomochain-lottie');

            $tomo_lottie.each(function() {
                var $this         = $(this),
                    animationData = JSON.parse($this.attr('data-animation'));

                lottie.loadAnimation({
                    container    : $this[0],
                    renderer     : 'svg',
                    loop         : true,
                    autoplay     : true,
                    animationData: animationData
                })
            });
        }
    }
)(jQuery);

(function( $ ) {
    tomochain.video = function() {

        var $videos = $('.tomochain-videos');

        if (!$videos.length) {
            return;
        }

        $videos.flipster({
            style: 'flat',
            spacing: -0.45,
            keyboard: false,
            scrollwheel: false
        });

        $('.tomochain-video-item .video-link').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false
        });
    }
})(jQuery);

jQuery (document).ready(function() {
    tomochain.init()
})
