var PHPDebugger = {
    init: init
};

function init() {

    if ( !$('.debugger-item').length ) return;

    var $container;

    if ( !$('#debugger-container').length )
        $('body').prepend("<div id='debugger-container'></div>");
    
    $container = $('#debugger-container');

    var $items = $('.debugger-item');

    $items.each( function(i) {

            var $item = $(this).detach();
            $item.appendTo($container);

            $(this).on('click', function(e) {
                $(this).animate(
                    {
                        'margin-left': '-100%'
                    },

                    function() {
                        $(this).remove();

                        if (!$('.debugger-item').length)
                            $('#debugger-container').remove();
                    }
                );
            });
        }
    );

}

module.exports = PHPDebugger;