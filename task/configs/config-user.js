var projectDomain = 'patrickowen'

var packageConfig = require('../package.json')
,   dest = './content/themes/' + packageConfig.name
,   src = './src';

module.exports = {
    browserSync: {
        server: false,
        files: [
            dest + "/**",
            "!" + dest + "/**.map"
        ],
        proxy: projectDomain + ".dev",
        open: false
    }
};