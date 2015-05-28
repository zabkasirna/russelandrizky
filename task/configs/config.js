/** Original: https://github.com/whatwedo/gulp-wp-theme */
/**
 * Checks for different configs and merges them in correct order.
 *   - config-development.js: The default config parameters
 *   - config-production.js: Parameters of going live. Minifies and removes debug informations like source maps
 *   - config-user.js: Parameters override the default config-development.js and are for your development
 *                     environment. Don't add this to the repository. It's for you, not your team!
 *
 *  Config overrides: config-production > config-user > config-development
 */

var fs = require('fs')
,   gutil = require('gulp-util')
,   args = require('yargs').argv
,   gulpif = require('gulp-if')
,   extend = require('node.extend');

var config = require('./config-development.js');

var hasUserConfig = fs.existsSync('./task/config/config-user.js')
,   hasProductionConfig = fs.existsSync('./task/config/config-production.js')
,   isProductionEnv = args.env === 'production';

if (hasUserConfig) {
  var userConfig = require('./config-user.js');
  var mergedUserConfig = extend(true, {}, config, userConfig);
  config = extend(true, {}, mergedUserConfig);
}

if (hasProductionConfig && isProductionEnv) {
  var prodConfig = require('./config-production.js');
  var mergedProdConfig = extend(true, {}, config, prodConfig);
  config = extend(true, {}, mergedProdConfig);
}

module.exports = config;
