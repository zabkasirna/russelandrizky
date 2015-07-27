var ProjectArchive = {
    initBackground: initBackground
};

function initBackground() {
    if ( !$('.post').length || !$('.post-bg').length ) return;

    var $posts = $('.post')
    ,   _bgiCounter = 0
    ;

    $posts.each( function( i ) {

        var $self = $(this)
        ,   $bgi = $self.find('.post-bg')

        var srcLandscape = $bgi.data('src-landscape') || ''
        ,   srcPortrait = $bgi.data('src-portrait') || ''
        ;

        var waypointView = new Waypoint.Inview({
            element: $self[0],
            entered: function( dir ) {
                // console.log( dir, $self );

                setTimeout( function() {
                    $bgi.background({
                        "source": {
                            "0px": srcPortrait,
                            "980px": srcLandscape
                        }
                    });
                }, 1000 );

                setTimeout( function() {
                    $self.find('.post-fg')
                        .animate({
                            top: 0
                        }, 500 );
                }, 100 );

                this.destroy();
            }
        });

        $bgi.on('loaded.background', function(e) {

            // console.log( 'finish loading bg on post', $(this) );

            setTimeout( function() {
                $bgi.animate({
                    opacity: 1
                }, 300,
                    function() {
                        $('.post-preloader').remove();
                    }
                );
            }, 500 );
        });
    });
}

module.exports = ProjectArchive;