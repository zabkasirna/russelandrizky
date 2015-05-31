var Nav = {
    toggleOnLoad: toggleOnLoad
};

function toggleOnLoad() {

    setTimeout( function() {
        $('body').toggleClass('is-preload');
    }, 100);
}

module.exports = Nav;