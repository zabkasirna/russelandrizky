var Img = require( '../util' ).img
,   Preloader = require( '../util' ).preloader
;

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
    ,   _pccCounter = 0
    ;

    $pci.each( function( i ) {
        var $self = $(this)
        ,   srcLandscape = $(this).data('src-landscape') || ''
        ,   srcPortrait = $(this).data('src-portrait') || ''
        ;

        $self.background({
            "source": {
                "0px": srcPortrait,
                "980px": srcLandscape
            }
        });

        // ON IMAGE CACHE
        var _testImg = $self.find('img')[0];
        if ( Img.cached( _testImg.src ) ) _pccCounter ++;
        if ( _pccCounter >= $pci.length ) Preloader.remove();

        // ON LOADED ALL IMAGES
        $self.on('loaded.background', function(e) {
            _pciCounter ++;
            if ( _pciCounter >= $pci.length ) Preloader.remove();
        });
    });

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
    if ( !$('.project-meta').length || !$('.pd-section').length ) return;

    var oldColor;

    $.mediaquery("bind", "mq-key", "(max-width: 1119px)", {
        enter: function() { metaSetN(); },
        leave: function() { metaSetW(); }
    });

    function metaSetW() {

        if ( !$('.project-meta').length || !$('.pd-section').length ) return;

        var $meta = $('.project-meta')
        ,   $target = $('.pd-section').first()
        ,   $targetChildren = $target.find('.pd-copy')
        ,   _targetChildrenH = 0
        ,   _newTargetH = $target.height()
        ;

        oldColor = $meta.css('color');

        console.log( oldColor );

        $targetChildren.each( function(){
            _targetChildrenH += $(this).height();
        });

        if ( $meta.height() > $target.height() )
            _targetChildrenH = $meta.height() +
                (parseInt( $target.css('padding-top'), 10 )) +
                (parseInt( $target.css('padding-top'), 10 ))
        ;

        // Move and set parent height
        $meta
            .prependTo( $target )
            .addClass('is-wide')
                .closest('.pd-section')
                .css( 'height', _targetChildrenH + 'px' )
        ;

        // Set color same as to first sibling color
        $meta.find('.project-meta-list')
            .css( 'color', $targetChildren.first().css('color') )
        ;
    }

    function metaSetN() {

        if ( !$('.project-meta').length || !$('.project-outer').length ) return;

        var $meta = $('.project-meta')
        ,   $firstSection = $('.pd-section').first()
        ,   $target = $('.project-outer')
        ,   _h = $meta.height()
        ;

        console.log( oldColor );

        // Reset height & color
        $firstSection[0].style.height = null;
        if ( oldColor ) $meta.find('.project-meta-list')
            .css( 'color', oldColor );

        $meta
            .removeClass('is-wide')
            .appendTo( $target );
        ;
    }
}

function setActiveMainNav() {
    if ( !$('body').hasClass('single-project') ||
         !$('.project-link').length
    ) return;

    var $el = $('#header-nav .menu-item.project-link');

    $el.addClass('active');
}

module.exports = SingleProject;