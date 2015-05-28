var gulp       = require('gulp')
,   changed    = require('gulp-changed')
,   imagemin   = require('gulp-imagemin')
,   config     = require( '../configs/config' );

gulp.task('image', function() {
  return gulp.src(config.image.src)
    .pipe(changed(config.image.dest)) // Ignore unchanged files
    // .pipe(imagemin()) // Optimize
    .pipe(gulp.dest(config.image.dest));
});