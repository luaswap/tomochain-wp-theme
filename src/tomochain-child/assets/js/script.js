jQuery(document).ready(function($) {

    var $image = $('#train-image');

    $( '#station-1' ).waypoint(function(direction) {
        $image.css('margin-top', direction == 'down' ? -850 : -1160);
    }, {
        offset: '80%'
    });

    $( '#station-2' ).waypoint(function(direction) {
        $image.css('margin-top', direction == 'down' ? -606 : -850);
    }, {
        offset: '80%'
    });

    $( '#station-3' ).waypoint(function(direction) {
        $image.css('margin-top', direction == 'down' ? -362 : -606);
    }, {
        offset: '80%'
    });

    $( '#station-4' ).waypoint(function(direction) {
        $image.css('margin-top', direction == 'down' ? -80 : -362);
    }, {
        offset: '80%'
    });
});
