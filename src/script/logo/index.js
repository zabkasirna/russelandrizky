var Logo = {
    initMod: initMod
};

function initMod() {
    if ( !$('.logo').length ) return;

    var _data = $('body').data('color')
    ,   $wrapperEl = $( '.logo' )
    ,   $svgInjectorEl = $wrapperEl.find('img.js-svg-injector')
    ;

    if ( typeof SVGInjector === 'function' && $svgInjectorEl.length ) {
        SVGInjector( $svgInjectorEl[0] );
    }
}

module.exports = Logo