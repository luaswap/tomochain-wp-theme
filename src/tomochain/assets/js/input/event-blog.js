
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
