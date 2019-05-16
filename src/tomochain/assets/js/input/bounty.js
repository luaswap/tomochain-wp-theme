(
    function ($) {
        tomochain.bounty = function () {
            if($('.list-bounty').length > 0){
                if ($(window).width() > 991){
                    var perpage = $('.list-bounty').attr('data-page');
                    var table = $('.list-bounty').DataTable({
                        // searching: false,
                        lengthChange: false,
                        pageLength: parseInt(perpage),
                        //paging: false, 
                        info: false});
                    var search_status = $('.status');
                    search_status.on( 'click','li', function (e) {
                        e.preventDefault();
                        search_status.find('li').removeClass('active');
                        $(this).addClass('active');
                        if ( table.columns('.title-sort').search() !== $(this).attr('data-value') ) {
                            table
                                .columns('.title-sort')
                                .search( $(this).attr('data-value') )
                                .draw();
                        }
                    } );
                    var search_project = $('.project');
                    search_project.on( 'click','li', function (e) {
                        e.preventDefault();
                        search_project.find('li').removeClass('active');
                        $(this).addClass('active');
                        if ( table.columns('.project-sort').search() !== $(this).attr('data-value') ) {
                            table
                                .columns('.project-sort')
                                .search( $(this).attr('data-value') )
                                .draw();
                        }
                    } );
                }else{
                    var perpage = $('.list-bounty').attr('data-page');
                    var table = $('.list-bounty').DataTable({
                        // searching: false,
                        lengthChange: false,
                        pageLength: parseInt(perpage),
                        //paging: false, 
                        info: false});
                    var search_status = $('.select-status');
                    search_status.on( 'change', function () {
                        if ( table.columns('.title-sort').search() !==  $(this).val() ) {
                            table
                                .columns('.title-sort')
                                .search(  $(this).val() )
                                .draw();
                        }
                    } );
                    var search_project = $('.select-project');
                    search_project.on( 'change', function () {
                        if ( table.columns('.project-sort').search() !==  $(this).val() ) {
                            table
                                .columns('.project-sort')
                                .search(  $(this).val() )
                                .draw();
                        }
                    } );
                }
            }
        }
    }
)(jQuery);

(
    function ($) {
        tomochain.thank_you = function () {
            if($('.box-form-detail').length > 0){
                var wpcf7Elm = document.querySelector( '.box-form-detail' );
                var id = $('.box-form').attr('data-id');
                wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
                    var $this = $(this);
                    $.ajax({
                        url: tomochainConfigs.ajax_url,
                        type: 'POST',
                        data: ({
                            action: 'tomochain_bounty_thank_you',
                            id: id
                        }),
                        dataType: 'html',

                        success: function ( data ) {
                        }
                    });
                }, false );
            }
        }
    }
)(jQuery);
(
    function ($) {
        tomochain.form_popup = function () {
            if($('.tomo_btn_grad').length > 0){
                $('.tomo_btn_grad a').on('click',function(e){
                    e.preventDefault();
                    $(this).parents('.container-detail-bounty').find('.box-form-wrap').show(500);
                });
            }
            $('.close').on('click',function(e){
                e.preventDefault();
                $(this).parent().hide(500);
            })
        }
    }
)(jQuery);