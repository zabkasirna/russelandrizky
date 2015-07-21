var Logo = {
    initMod: initMod
};

function initMod() {
    if ( !$('.logo-object').length ) return;

    var _data = $('body').data('color')
    ,   elObj = document.querySelector( '.logo-object' )
    ,   svgDoc
    ;

    elObj.addEventListener( 'load', function() {
        svgDoc = elObj.getSVGDocument();
        var _paths = svgDoc.querySelectorAll('path');

        for ( var i = 0; i < _paths.length; i ++ ) {
            _paths[ i ].setAttribute( 'fill', _data.fg );
        }

        var $navlinkBg = $('#nav-lists li a .fauxbg');
        var $borders = $('#header-brand .fauxborder, #nav-lists li, #nav-lists li a, #nav-lists li .fauxborder');

        $navlinkBg.css( 'background-color', _data.fg );
        $borders.css( 'border-color', _data.fg );

        $('#nav-lists li a').each(

            function(i) {

                $(this).parent().css( 'color', _data.fg );

                $(this).hover(

                    function(e) { $(this).css( 'color', _data.bg ); },
                    function(e) { $(this).css( 'color', _data.fg ); }
                );
            }
        );
    });
}

module.exports = Logo