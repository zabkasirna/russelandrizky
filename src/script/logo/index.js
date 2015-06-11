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
        var _paths = svgDoc.querySelectorAll('path')
        ,   _path;

        for ( var i = 0; i < _paths.length; i ++ ) {
            _paths[ i ].setAttribute( 'fill', _data.bg );
        }

        var $bg = $('.logo-anchor');

        $bg.css( 'background-color', _data.fg );
    });
}

module.exports = Logo