var gulp = require( 'gulp' )
,   changed = require( 'gulp-changed' )
,   sequence = require('run-sequence')
,   config = require( '../configs/config' )

gulp.task( 'markup:template', function() {
    return gulp.src( config.markup.template.src )
        .pipe( changed( config.markup.template.dest ) )
        .pipe( gulp.dest( config.markup.template.dest ) );
});

gulp.task( 'markup:plugin', function() {
    return gulp.src( config.markup.plugin.src )
        .pipe( changed( config.markup.plugin.dest ) )
        .pipe( gulp.dest( config.markup.plugin.dest ) );
});

gulp.task( 'markups', function( done ) {
    sequence(
        [ 'markup:template', 'markup:plugin' ],
        done
    );
});