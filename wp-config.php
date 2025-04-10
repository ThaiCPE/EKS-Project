<?php
/**
 * The base configuration for WordPress.
 *
 * This file has the following configuration settings: MySQL settings,
 * Table Prefix, Secret Keys, and ABSPATH. You can get more information
 * by visiting {@link https://codex.wordpress.org/Editing_wp-config.php} or
 * {@link https://wordpress.org/support/article/editing-wp-config-php/}.
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', '%%DB_NAME%%');
define('DB_USER', '%%DB_USER%%');
define('DB_PASSWORD', '%%DB_PASSWORD%%');
define('DB_HOST', '%%DB_HOST%%');
// ** Database Charset and Collate Type ** //
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
// ** Authentication Unique Keys and Salts. ** //
define('AUTH_KEY',         'random_string_here');
define('SECURE_AUTH_KEY',  'random_string_here');
define('LOGGED_IN_KEY',    'random_string_here');
define('NONCE_KEY',        'random_string_here');
define('AUTH_SALT',        'random_string_here');
define('SECURE_AUTH_SALT', 'random_string_here');
define('LOGGED_IN_SALT',   'random_string_here');
define('NONCE_SALT',       'random_string_here');
// ** WordPress Database Table prefix. ** //
$table_prefix  = 'wp_';
// ** For developers: WordPress debugging mode. ** //
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);  // This enables the debug log
define('WP_DEBUG_DISPLAY', false);  // This hides debug messages from displaying on the frontend

// ** URLS ** //
define('WP_HOME', 'https://basiltalias.site');
define('WP_SITEURL', 'https://basiltalias.site');
define('FORCE_SSL_ADMIN', true);

// ** Cookie Settings ** //
define('COOKIE_DOMAIN', $_SERVER['HTTP_HOST']);
define('ADMIN_COOKIE_PATH', '/');
define('COOKIEPATH', '/');
define('SITECOOKIEPATH', '/');
define('COOKIE_SECURE', true);

// Handle SSL from Load Balancer
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
      $_SERVER['HTTPS'] = 'on';
  } elseif (strpos($_SERVER['REQUEST_URI'], '/health') === false) {
      $_SERVER['HTTPS'] = 'on';
  }

// ** Absolute path to the WordPress directory. ** //
if ( !defined('ABSPATH') )
      define('ABSPATH', dirname(__FILE__) . '/');
// ** Sets up WordPress vars and included files. ** //
require_once(ABSPATH . 'wp-settings.php');

