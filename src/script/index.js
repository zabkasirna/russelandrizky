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
,   Project = require('./project')
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

        // Project
        Project.single.initCover();

    });

})(jQuery);
