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

// ** Database settings - These can be set dynamically by entrypoint.sh ** //
define('DB_NAME', 'database_name_here');
define('DB_USER', 'username_here');
define('DB_PASSWORD', 'password_here');
define('DB_HOST', 'localhost');

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
define('WP_DEBUG', false);

// ** Absolute path to the WordPress directory. ** //
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

// ** Sets up WordPress vars and included files. ** //
require_once(ABSPATH . 'wp-settings.php');
