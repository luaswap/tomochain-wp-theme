
// common for event & blog
jQuery(window).load(function(){
	// Category all
	jQuery('.tab-wrapper .tab-content:first').show();
	jQuery('.tab-action li:first').addClass('selected');
	jQuery('.tab-action li a').click(function(){
	jQuery('.tab-action li').removeClass('selected');
	jQuery(this).parent().addClass('selected');
	var currentTab = jQuery(this).attr('href');
	jQuery('.tab-wrapper .tab-content').hide();
	jQuery(currentTab).show();
		return false;
	});
	// Popup article of Event
	jQuery('.event-content-tomo article .inner .box-content').click(function() {
		jQuery(jQuery(this).parent()).parent().addClass('active');
		jQuery('body').addClass('body_event');
	});
	jQuery('.event-content-tomo article .inner .btn_close').click(function() {
		jQuery(jQuery(this).parent()).parent().removeClass('active');
		jQuery('body').removeClass('body_event');
	});
});
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
                var $_this = $(this);
                window.history.pushState({},'',$(this).attr('href'));
                e.preventDefault();
                var url = $(this).attr('href');
                url = url.replace(/\/?(\?|#|$)/, "/$1");

                $.ajax({
                    url: url,
                    dataType: 'html',
                    // beforeSend: function() {
                    //     $_this.parents('.container')
                    //     .find('.archive-posts')
                    //     .html('<div class="lds-css ng-scope"><div class="lds-ripple"><div></div><div></div></div></div>');
                    // },
                    success: function(data){
                        var new_Obj = $($(data).find('.archive-posts').html());
                        $_this.parents('.container').find('.archive-posts').html(new_Obj);
                    }
                });
            })
        }
    }
)(jQuery);

(
    function ($) {
        tomochain.event_view = function () {
            var $event_item = $('.archive-posts article');
            $event_item.on('click',function(e){
                e.preventDefault();
                var $_this = $(this);
                var $id = $_this.attr('data-id');
                $.ajax({
                    url: tomochainConfigs.ajax_url,
                    type: 'POST',
                    dataType: 'html',
                    data: ({
                        action: 'tomochain_event_view',
                        id:     $id,
                        security: tomochainConfigs.security
                    }),
                    beforeSend: function(){
                        // $_this.parents('.archive-posts').find('article.col-md-6').remove();
                    },
                    success: function(data){
                        var selector = $_this.parents('.archive-posts').find('article:nth-last-child(1)');
                        $(data).insertBefore(selector);
                    }
                });
            })
        }
    }
)(jQuery);
