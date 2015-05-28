/** ------------------------------------------------------------------------- *\
 * START HERE!
 ** ------------------------------------------------------------------------- */

var gulp     = require('gulp')
,   sequence = require('run-sequence')
,   tasks    = require('./task')
,   util     = require('gulp-util')
;

gulp.task('default', function(done) {
    sequence(
        ['markups'],
        ['styles'],
        ['watch'],
        done
    );
});