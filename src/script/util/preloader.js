var Preloader = {
    remove: remove
};

function remove() {
    if ( !$('#preloader').hasClass( 'has-loaded' ) )
        $('#preloader').addClass('has-loaded');
}

module.exports = Preloader;