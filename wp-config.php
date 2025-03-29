<?php
// ** Load database settings from environment variables **
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') ?: 'wordpress' );
define( 'DB_USER', getenv('WORDPRESS_DB_USER') ?: 'root' );
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') ?: '' );
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') ?: 'localhost' );

// Database Charset and Collate
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// Authentication Unique Keys and Salts (You can generate fresh ones from: https://api.wordpress.org/secret-key/1.1/salt/)
define('AUTH_KEY',         'your-auth-key');
define('SECURE_AUTH_KEY',  'your-secure-auth-key');
define('LOGGED_IN_KEY',    'your-logged-in-key');
define('NONCE_KEY',        'your-nonce-key');
define('AUTH_SALT',        'your-auth-salt');
define('SECURE_AUTH_SALT', 'your-secure-auth-salt');
define('LOGGED_IN_SALT',   'your-logged-in-salt');
define('NONCE_SALT',       'your-nonce-salt');

// WordPress Table Prefix
$table_prefix = 'wp_';

// Debugging Mode
define( 'WP_DEBUG', false );

// Absolute Path
if ( !defined('ABSPATH') ) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

// Load WordPress Settings
require_once ABSPATH . 'wp-settings.php';
