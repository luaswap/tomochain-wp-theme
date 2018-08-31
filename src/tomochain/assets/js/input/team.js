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
                    $('.tomochain-team--hide .tomochain-team__wrapper').show(300).css('display', 'grid');
                } else {
                    $(this).removeClass('tomochain-team__see-all--collapse');
                    $('.tomochain-team--hide .tomochain-team__wrapper').hide(300);
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
                $('.team-member-info__name').text(atts.name);
                $('.team-member-info__role').text(atts.role);
                $('.team-member-info__description').text(atts.description);

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
                $('.team-member-info__name').text('');
                $('.team-member-info__role').text('');
                $('.team-member-info__description').text('');
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
