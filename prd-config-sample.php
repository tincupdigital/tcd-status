<?php
/*
Define variables for production setup
*/

/**
 * Development variable
 */
define( 'WP_LOCAL_DEV', false );

/**
 * MySQL configuration
 */
define( 'DB_NAME', 'database_name_here' );
define( 'DB_USER', 'username_here' );
define( 'DB_PASSWORD', 'password_here' );
define( 'DB_HOST', 'localhost' );

/**
 * Content directories
 */
// add subdirectory before /content in WP_CONTENT_URL if
// site is installed to a subdirectory of the domain.
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

/**
 * Database table prefix
 */
$table_prefix  = 'xyz_';

/**
 * Authentication keys and salts
 *
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**
 * Load WordPress
 */
if ( !defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', dirname(__FILE__) . '/wp/' );
}
require_once( ABSPATH . 'wp-settings.php' );
