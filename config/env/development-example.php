<?php

define('WP_HOME', 'http://myproject.dev'); // Modify according your local environment
define('WP_SITEURL', WP_HOME . '/site/');

define('WP_CONTENT_DIR', APP_ROOT . '/content');
define('WP_CONTENT_URL', WP_HOME . '/content');

//define('ABSPATH', APP_ROOT . '/site/');

/**
 * Debugging in WP
 * http://www.charlestonsw.com/intro-to-debug-bar-debugging-wordpress-with-a-plugin/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors',0);
define('SCRIPT_DEBUG',true);
define('SAVEQUERIES', true);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'my_db');

/** MySQL database username */
define('DB_USER', 'my_adm');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 */
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');
/**#@-*/