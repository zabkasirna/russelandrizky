var PHPDebugger = {
    init: init
};

function init() {

    if ( !$('.debugger-item').length ) return;

    var $container, $items;

    $items = $('.debugger-item');

    // Check if Debugger toggler is enabled on the body class
    if ( $('body').hasClass('is-debugged') ) {

        if ( !$('#debugger-container').length )
            $('body').prepend("<div id='debugger-container'></div>");
        
        $container = $('#debugger-container');

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
    } else {

        if ( $('#debugger-container').length ) $('#debugger-container').remove();
        if ( $items.length ) $items.remove();
    }

}

module.exports = PHPDebugger;