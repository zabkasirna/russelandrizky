var gulp = require( 'gulp' )
,   bower = require( 'main-bower-files' )
,   config = require( '../configs/config.js' );

gulp.task( 'vendor', function() {
    return gulp.src(
            bower(),
            { base: config.bower.src }
        )
        .pipe( gulp.dest( config.bower.dest ) );
});