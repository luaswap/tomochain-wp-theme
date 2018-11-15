jQuery(document).ready(function($) {
    var controller  = new ScrollMagic.Controller(),
        animateElem = $('#train-image');

    new ScrollMagic.Scene({
        triggerElement: '#station-1',
        duration      : 50
    })
    .on( 'enter', function() {
        let marginTop = parseInt(animateElem.css('margin-top'));
        animateElem.css('margin-top', marginTop + 244);
    })
    .on( 'leave', function() {
        // let marginTop = parseInt(animateElem.css('margin-top'));
        animateElem.css('margin-top', -850);
    })
    .addTo(controller);
});
