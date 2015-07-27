var SingleProject = {
    initCover: initCover,
    initMeta: initMeta,
    setActiveMainNav: setActiveMainNav
};

function initCover() {

    if ( !$('.project-cover-outer').length ) return;

    var $coverOuter = $('.project-cover-outer')
    ,   $pci = $coverOuter.find('.pci')
    ,   _pciCounter = 0
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

            if (
                _pciCounter === $pci.length &&
                !$('#preloader').hasClass('has-loaded')
            ) {
                // console.log( 'finish loading cover\'s assets' );
                $('#preloader').addClass('has-loaded');
                bgiRecheckStop();
            }

        });
    });
    
    var bgiRecheckId;

    function bgiRecheck() {
        var $imagesToValidate = $pci.parent().find('img');
        if (
            $imagesToValidate.length === $pci.length ||
            !$('#preloader').hasClass('has-loaded') ) {

                $('#preloader').addClass('has-loaded');
                bgiRecheckStop();
        }
    }

    function bgiRecheckStop() {
        clearInterval( bgiRecheckId );
        bgiRecheckId = null;
    }

    function bgiRecheckStart() {
        if ( bgiRecheckId ) return;
        bgiRecheckId = setInterval( bgiRecheck, 2000 );
        bgiRecheck();
    }

    bgiRecheckStart();

    if ( $pci.length > 1 ) {

        var flexsliderOptions = {
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

function setActiveMainNav() {
    if ( !$('body').hasClass('single-project') ||
         !$('.project-link').length
    ) return;

    var $el = $('#header-nav .menu-item.project-link');

    $el.addClass('active');
}

module.exports = SingleProject;