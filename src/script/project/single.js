var SingleProject = {
    initCover: initCover
};

function initCover() {

    if ( !$('.project-cover-outer').length ) return;

    var $coverOuter = $('.project-cover-outer')
    ,   $pci = $coverOuter.find('.pci')
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

module.exports = SingleProject;