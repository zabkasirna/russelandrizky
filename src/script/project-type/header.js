var Img = require( '../util' ).img
,   Preloader = require( '../util' ).preloader
;

var ProjectTypeHeader = {
    initBackground: initBackground
};

function initBackground() {

    if ( !$('.pt-header-bg').length ) return;

    var $bgOuter = $('.pt-header-bg')
    ,   $bgi = $bgOuter.find('.ptbg-lists')
    ,   _bgiCounter = 0
    ,   _bgcCounter = 0
    ;

    $bgi.each( function( i ) {
        var $el = $(this).find('.ptbgi')
        ,   srcLandscape = $el.data('src-landscape') || ''
        ,   srcPortrait = $el.data('src-portrait') || ''
        ;

        $el.background({
            "source": {
                "0px": srcPortrait,
                "980px": srcLandscape
            }
        });

        // ON IMAGE CACHE
        var _testImg = $el.find('img')[0];
        if ( Img.cached( _testImg.src ) ) _bgcCounter ++;
        if ( _bgcCounter >= $bgi.length ) Preloader.remove();

        // ON LOADED ALL IMAGES
        $el.on('loaded.background', function(e) {
            _bgiCounter ++;
            if ( _bgiCounter === $bgi.length ) Preloader.remove();
        });
    });

    if ( $bgi.length > 1 ) {
        $bgOuter.carousel({
            autoAdvance: true,
            autoTime: 4000,
            controls: false,
            infinite: true
        });
    }
}

module.exports = ProjectTypeHeader;