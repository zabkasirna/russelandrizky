var SingleProject = {
    initCover: initCover,
    initMeta: initMeta
};

function initCover() {

    if ( !$('.project-cover-outer').length ) return;

    var $coverOuter = $('.project-cover-outer')
    ,   $pci = $coverOuter.find('.pci')
    ,   _pciCounter = 0;
    ;


    $pci.each( function( i ) {
        var srcLandscape = $(this).data('src-landscape') || ''
        ,   srcPortrait = $(this).data('src-portrait') || ''
        ;

        $(this).background({
            "source": {
                "0px": srcPortrait,
                "980px": srcLandscape
            }
        });

        $(this).on('loaded.background', function(e) {
            _pciCounter ++;

            if ( _pciCounter === $pci.length ) {
                // console.log( 'finish loading cover\'s assets' );
                $('#preloader').addClass('has-loaded');
            }

        });
    });

    if ( $pci.length > 1 ) {

        flexsliderOptions = {
            animation: "slide",
            controlNav: true,
            directionNav: false,
            selector: '.project-cover > .project-cover-lists'
        };

        $coverOuter.flexslider( flexsliderOptions );
    }
}

function initMeta() {
    if ( document.documentElement.clientWidth > 1200 ) metaSetW();

    var resizeTimer;

    $.mediaquery("bind", "mq-key", "(max-width: 1119px)", {

        enter: function() { metaSetN(); },
        leave: function() { metaSetW(); }
    });
}

function metaSetW() {

    if ( !$('.project-meta').length || !$('.pd-section').length ) return;

    var $meta = $('.project-meta')
    ,   $target = $('.pd-section').first()
    ,   _h = $meta.height()
    ;

    $meta
        .prependTo( $target )
        .addClass('is-wide')
        .parent()
            .css( 'height', ( _h + 48 ) + 'px' )
    ;
}

function metaSetN() {

    if ( !$('.project-meta').length || !$('.project-outer').length ) return;

    var $meta = $('.project-meta')
    ,   $target = $('.project-outer')
    ,   _h = $meta.height()
    ;

    $meta
        .parent()
            .css( 'height', 'auto' )
            .end()
        .removeClass('is-wide')
        .appendTo( $target )
        ;
    ;
}

module.exports = SingleProject;