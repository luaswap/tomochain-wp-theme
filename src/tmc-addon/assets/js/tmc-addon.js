( function( $ ) {
    "use strict";
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */ 
    var TmcCarousel = function( $scope, $ ) {
        $scope.find('.owl-carousel').each(function () {
            var slide = $(this).attr('data-slide');
            slide = JSON.parse(slide);
            $(this).owlCarousel({
                margin: typeof slide.margin !== "undefined" ? parseInt(slide.margin) : 0,
                loop: typeof slide.loop !== "undefined" ? slide.loop : false,
                center:typeof slide.center !== "undefined" ? slide.center : false,
                autoplay: typeof slide.autoplay !== "undefined" ? slide.autoplay : false,
                autoHeight : typeof slide.auto_height !== "undefined" ? slide.auto_height : false,
                autoplaySpeed:typeof slide.speed !== "undefined" ? slide.speed : false,
                nav: typeof slide.show_nav !== "undefined" ? slide.show_nav : false,
                dots: typeof slide.dot !== "undefined" ? slide.dot : false,
                navText: typeof slide.prev !== "undefined" && typeof slide.next !== "undefined" ? [slide.prev,slide.next] : ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                responsive:{
                    0: {
                        items: 1
                    },
                    500: {
                        items: typeof slide.mobilecol !== "undefined" ? parseInt(slide.mobilecol) : 2,
                    },
                    991: {
                        items: typeof slide.tabletcol !== "undefined" ? parseInt(slide.tabletcol) : 3,
                    },
                    1300: {
                        items: typeof slide.items !== "undefined" ? parseInt(slide.items) : 4,
                    }
                }
            });
        });
    };
    var NewTestimonial = function($scope,$){
        if($scope.find('.content-slide').length >0){
            var sync1 = $(".content-slide");
            var sync2 = $(".avatar-slide");
            var slide = sync1.attr('data-slide');

            slide = JSON.parse(slide);
            var flag = false;
            var duration = 500;

            sync1
                .owlCarousel({
                    items: 1,
                    margin: 0,
                    rtl: true,
                    nav: typeof slide.show_nav !== "undefined" ? slide.show_nav : true,
                    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                    dots:typeof slide.dot !== "undefined" ? slide.dot : false,
                    autoPlay:typeof slide.auto_play !== "undefined" ? slide.auto_play : 800,
                    responsiveClass: true,
                }).on('changed.owl.carousel', function (e) {
                if (!flag) {
                    flag = true;
                    sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
                    flag = false;
                }

                // Add class synced to current slide
                var current = e.item.index;
                $(".avatar-slide")
                    .find(".owl-item")
                    .removeClass("center")
                    .removeClass("synced")
                    .eq(current)
                    .addClass("synced")
                    .addClass("center");
            });
            sync2
                .owlCarousel({
                    margin: 0,
                    rtl: true,
                    nav: false,
                    dots: false,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        991: {
                            items: 3
                        },
                    },
                    onInitialized: function () {
                        sync2.find(".owl-item").eq(0).addClass("synced");
                        sync2.find(".owl-item").eq(1).addClass("center");
                    }
                })
                .on('click', '.owl-item', function () {
                    sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
                    sync2.find('.center').removeClass("center");
                    $(this).addClass("center");
                })
                .on('changed.owl.carousel', function (e) {
                    if (!flag) {
                        flag = true;
                        sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
                        flag = false;
                    }
                });

        }

        if($scope.find('.tmc-testimonial-style2').length >0){
            $scope.find('.tmc-testimonial-style2').each(function () {
                var slide = $(this).attr('data-slide');
                slide = JSON.parse(slide);
                $(this).owlCarousel({
                    loop:true,
                    autoplay: typeof slide.auto_play !== "undefined" ? slide.auto_play : false,
                    center:typeof slide.center !== "undefined" ? slide.center : false,
                    nav: typeof slide.show_nav !== "undefined" ? slide.show_nav : false,
                    dots: typeof slide.dot !== "undefined" ? slide.dot : false,
                    autoHeight : typeof slide.auto_height !== "undefined" ? slide.auto_height : false,
                    autoplaySpeed: typeof  slide.slide_speed !=="undefined" ? slide.slide_speed : false,
                    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                    responsive:{
                        0: {
                            items: 1
                        },
                        500: {
                            items: typeof slide.mobilecol !== "undefined" ? parseInt(slide.mobilecol) : 2,
                        },
                        991: {
                            items: typeof slide.tabletcol !== "undefined" ? parseInt(slide.tabletcol) : 3,
                        },
                        1300: {
                            items: typeof slide.items !== "undefined" ? parseInt(slide.items) : 4,
                        }
                    }
                });

            });
        }

    };

    var ImagesSlider = function($scope,$){
            $scope.find('.tmc-job-search-wrapper .sliders').each(function(){
                var slide = $(this).attr('data-slide');
                slide = JSON.parse(slide);
                var _this = $(this);
                imagesLoaded(_this,function(){
                    _this.owlCarousel({
                        items:1,
                        loop:true,
                        autoplay:true,
                        autoplayTimeout:typeof slide.time !== "undefined" ? slide.time : 5000,
                        autoplayHoverPause:true,
                        autoplaySpeed:typeof slide.speed !== "undefined" ? slide.speed : false,
                    });
                });
            });
    }
    var TMCCountdown = function($scope,$){
        if($('.countdown').length > 0){
            $('.tmc-event-item').each(function(){
                var countdown = $($(this).find('.countdown'));
                var check = $(this).find('.countdown').data('check');
                var time = $(this).find('.countdown').data('time');
                var option = $(this).find('.countdown').data('option');
                var day = 'Day', hr = 'Hour', min = 'Min', sec = 'Sec';
                if(check){
                    if(option !== ''){
                        day = option.day;
                        hr = option.hr;
                        min = option.min;
                        sec = option.sec;
                    }
                    if(time){
                        countdown.countdown(time, function(event) {
                            var $this = $(this).html(event.strftime(''
                            + '<ul>'
                            + '<li class="day"><span class="count">%D</span><span class="text">' + day + '</span></li>'
                            + '<li class="hr"><span class="count">%H<span><span class="text">' + hr + '</span></li>'
                            + '<li class="min"><span class="count">%M</span><span class="text">' + min + '</span></li>'
                            + '<li class="sec"><span class="count">%S</span><span class="text">' + sec + '</span></li>'
                            + '</ul>'
                            ));
                        });
                    }
                }
            });
        }
    }
    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {

        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc-post-layout.default', TMCCarousel );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc_company.default', TMCCarousel );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc_resume.default', TMCCarousel );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc_job.default', TMCCarousel );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc-client.default', TMCCarousel );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc-team-member.default', TMCCarousel );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc_testimonial.default', NewTestimonial );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc_advanced_search.default', ImagesSlider );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/job_category.default', TMCCarousel );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc-job-location.default', TMCCarousel );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc-event-countdown.default', TMCCountdown );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tmc-event-countdown.default', TMCCarousel );

    } );
})( jQuery );