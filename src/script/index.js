/***
 *           __    __       ___       __   __               
 *          |  |  |  |     /   \     |  | |  |              
 *          |  |__|  |    /  ^  \    |  | |  |              
 *          |   __   |   /  /_\  \   |  | |  |              
 *          |  |  |  |  /  _____  \  |  | |  `----.         
 *          |__|  |__| /__/     \__\ |__| |_______|         
 *         _______. __  .______     .__   __.      ___      
 *        /       ||  | |   _  \    |  \ |  |     /   \     
 *       |   (----`|  | |  |_)  |   |   \|  |    /  ^  \    
 *        \   \    |  | |      /    |  . `  |   /  /_\  \   
 *    .----)   |   |  | |  |\  \----|  |\   |  /  _____  \  
 *    |_______/    |__| | _| `._____|__| \__| /__/     \__\ 
 *                                              
 */

var Signature = require('./signature')
,   PHPDebugger = require('./php-debugger')
,   Nav = require('./nav')
,   Logo = require('./logo')
;

(function( $ ) {
    
    $(function() {

        // Setup
        Signature.init();
        PHPDebugger.init();

        // Navigation
        Nav.toggleOnLoad();

        // Logo
        setTimeout( Logo.initMod(), 300 );


        $('.project-cover-outer').flexslider({
            animation: "slide",
            controlNav: true,
            directionNav: true,
            selector: '.project-cover > .project-cover-lists',
            itemWidth: 850
        });


    });

})(jQuery);
