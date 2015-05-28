/** Original: https://github.com/whatwedo/gulp-wp-theme */

var fs   = require('fs')
,   gutil = require('gulp-util')
,   packageConfig = require('../../package.json');

var root = '.'
,   src = root + '/src'
,   dest = root + '/content/themes/' + packageConfig.name
,   dest_plugin = root + '/content/plugins';

module.exports = {
    browserSync: {
        server: {
            baseDir: [dest]
        },
        open: false,
        files: [
            dest + "/**",
            // Exclude Map files
            "!" + dest + "/**.map"
        ]
    },

    image: {
        src: src + '/image/**/*.{png,jpg,svg,gif}',
        dest: dest + '/uploads/images'
    },

    substituter: {
        enabled: true,
        cdn: '',
        js: '<script src="{cdn}/{file}"></script>',
        css: '<link rel="stylesheet" href="{cdn}/{file}">'
    },

    markup: {
        template: {
            src: [src + '/template/**/*.php', src + '/under-construction.html'],
            dest: dest
        },
        plugin: {
            src: src + '/plugin/**/*.php',
            dest: dest_plugin            
        }
    },

    copy: {
        // Meta files e.g. Screenshot for WordPress Theme Selector
        meta: {
            src: src + '/*.*',
            dest: dest
        }
    },

    bower: {
        src: root + '/bower_components',
        dest: dest + '/script/vendor'
    },

    browserify: {
        // Enable source maps
        debug: true,
    
        // Additional file extentions to make optional
        extensions: ['.coffee', '.hbs'],

        // A separate bundle will be generated for each
        // bundle config in the list below
        bundleConfigs: [
            {
                entries: src + '/script/index.js',
                dest: dest + '/script',
                outputName: 'main.js'
            }
        ]
    },

    style: {
        src: src + '/style/',
        dest: dest + '/',
        font: 'fonts/**/*.{ttf,woff,eot,svg}'
    },

    font: {
        src: src + '/style/font/**/*.{ttf,woff,eot,svg,woff2}',
        dest: dest + '/font'
    }
};
