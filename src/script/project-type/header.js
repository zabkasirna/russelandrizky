var ProjectTypeHeader = {
    initBackground: initBackground
};

function initBackground() {

    if ( !$('.pt-header-bg').length ) return;

    var $bgOuter = $('.pt-header-bg')
    ;

    $bgOuter.background({
        source: {
            "0px": $bgOuter.data('src'),
            "980px": $bgOuter.data('src')
        }
    });
}

module.exports = ProjectTypeHeader;