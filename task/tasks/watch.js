/** ------------------------------------------------------------------------- *\
 *  WATCHERS
 ** ------------------------------------------------------------------------- */

var gulp = require('gulp')
,   config = require('../configs/config')


gulp.task( 'watch', ['setWatch', 'script'], function() {

    gulp.watch(config.markup.template.src, ['markups']);
    gulp.watch(config.markup.plugin.src, ['markups']);
    gulp.watch(config.style.src + '**/*.scss', ['styles']);
    gulp.watch(config.styleSirnaHotspot.src + '**/*.scss', ['style:sirnaHotspot']);
    gulp.watch(config.image.src, ['image']);
});
