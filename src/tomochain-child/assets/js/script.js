jQuery(document).ready(function($) {

    var $image = $('#train-image');

    $( '#station-1' ).waypoint(function(direction) {
        $image.css('margin-top', direction == 'down' ? -862 : -1160);
    }, {
        offset: '80%'
    });

    $( '#station-2' ).waypoint(function(direction) {
        $image.css('margin-top', direction == 'down' ? -618 : -862);
    }, {
        offset: '80%'
    });

    $( '#station-3' ).waypoint(function(direction) {
        $image.css('margin-top', direction == 'down' ? -362 : -618);
    }, {
        offset: '80%'
    });

    $( '#station-4' ).waypoint(function(direction) {
        $image.css('margin-top', direction == 'down' ? -80 : -362);
    }, {
        offset: '80%'
    });
});
