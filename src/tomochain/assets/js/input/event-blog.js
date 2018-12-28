
// common for event & blog
// jQuery(window).load(function(){
// 	// Category all
// 	jQuery('.tab-wrapper .tab-content:first').show();
// 	jQuery('.tab-action li:first').addClass('selected');
// 	jQuery('.tab-action li a').click(function(){
// 	jQuery('.tab-action li').removeClass('selected');
// 	jQuery(this).parent().addClass('selected');
// 	var currentTab = jQuery(this).attr('href');
// 	jQuery('.tab-wrapper .tab-content').hide();
// 	jQuery(currentTab).show();
// 		return false;
// 	});
// 	// Popup article of Event
// 	jQuery('.event-content-tomo article .inner .box-content').click(function() {
// 		jQuery(jQuery(this).parent()).parent().addClass('active');
// 		jQuery('body').addClass('body_event');
// 	});
// 	jQuery('.event-content-tomo article .inner .btn_close').click(function() {
// 		jQuery(jQuery(this).parent()).parent().removeClass('active');
// 		jQuery('body').removeClass('body_event');
// 	});
// });
(
    function ($) {
        tomochain.tab_active = function () {
            $('.tab-filter li:first').addClass('selected');
            $('.tab-filter li a').on('click', function(e){
                e.preventDefault();
                $('.tab-filter li').removeClass('selected');
                $(this).parent().addClass('selected');
            });
        }
    }
)(jQuery);
// (
//     function ($) {
//         tomochain.event_popup = function () {
//             $('.event-content-tomo article .inner .box-content').click(function() {
//                 $(this).parent().parent().addClass('active');
//                 $('body').addClass('body_event');
//             });
//             $('.event-content-tomo article .inner .btn_close').click(function() {
//                 $(this).parent().parent().removeClass('active');
//                 $('body').removeClass('body_event');
//             });
//         }
//     }
// )(jQuery);
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
            })
        }
    }
)(jQuery);
(
    function ($) {
        tomochain.event_filter = function () {
            var $event_filter = $('.event-cat-filter');
            if (!$event_filter.length) {
                return;
            }
            $event_filter.on('click','a',function(e){
                e.preventDefault();
                var $_this = $(this);
                // window.history.pushState({},'',$(this).attr('href'));
                // e.preventDefault();
                var url = $(this).attr('href');
                url = url.replace(/\/?(\?|#|$)/, "/$1");

                $.ajax({
                    url: url,
                    dataType: 'html',
                    beforeSend: function() {
                        $('.spinner').fadeIn('slow');
                        $('.archive-posts').fadeOut('slow');
                    },
                    success: function(data){
                        $('.spinner').fadeOut('slow');
                        $('.archive-posts').fadeIn('slow');
                        var new_Obj = $($(data).find('.archive-posts').html());
                        $_this.parents('.container').find('.archive-posts').html(new_Obj);
                        // tomochain.event_popup();
                    }
                });
            })
        }
    }
)(jQuery);
