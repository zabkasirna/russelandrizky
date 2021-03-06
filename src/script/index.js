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
,   ProjectType = require('./project-type')
;

(function( $ ) {
    
    $(function() {

        // Setup
        Signature.init();
        PHPDebugger.init();

        // Navigation
        Nav.toggleOnLoad();

        // Logo
        // setTimeout( Logo.initMod(), 300 );
        Logo.initMod();

        // Project
        Project.single.initCover();
        Project.single.initMeta();
        Project.single.setActiveMainNav();
        Project.archive.initBackground();

        // Project-Type
        ProjectType.header.initBackground();

    });

})(jQuery);
