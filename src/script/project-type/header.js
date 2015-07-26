var ProjectTypeHeader = {
    initBackground: initBackground
};

function initBackground() {

    if ( !$('.pt-header-bg').length ) return;

    var $bgOuter = $('.pt-header-bg')
    ,   $bgi = $bgOuter.find('.ptbg-lists')
    ,   _bgiCounter = 0
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

        $(this).find('.ptbgi').on('loaded.background', function(e) {
            _bgiCounter ++;

            if ( _bgiCounter === $bgi.length ) {
                // console.log( 'finish loading cover\'s assets' );
                $('#preloader').addClass('has-loaded');
            }

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