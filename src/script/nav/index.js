var Nav = {
    toggleOnLoad: toggleOnLoad
};

function toggleOnLoad() {

    setTimeout( function() {
        $('body').toggleClass('is-preload');
    }, 500 );
}

module.exports = Nav;