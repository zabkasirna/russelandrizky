var ProjectArchive = {
    initBackground: initBackground
};

function initBackground() {
    if ( !$('.post').length || !$('.post-bg').length ) return;

    var $posts = $('.post');

    $posts.each( function( i ) {

        var $bgi = $(this).find('.post-bg')

        var srcLandscape = $bgi.data('src-landscape') || ''
        ,   srcPortrait = $bgi.data('src-portrait') || ''
        ;

        $bgi.background({
            "source": {
                "0px": srcPortrait,
                "980px": srcLandscape
            }
        });

        // $(this).on('loaded.background', function(e) {
        //     _pciCounter ++;

        //     if ( _pciCounter === $pci.length ) {
        //         // console.log( 'finish loading cover\'s assets' );
        //         $('#preloader').addClass('has-loaded');
        //     }

        // });
    });
}

module.exports = ProjectArchive;