<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'U8Qdie07aG3RkDQngW3BzWftpQCHCZ349wQuqhQtaW+HUBkmkqbfwhmSHd9ajVSZyorwVGGlQ3pdnczXhFTOoA==');
define('SECURE_AUTH_KEY',  'ILBHOIX74tcOOWQwFPumCeUgKyxzk4/whXv10E023iJ5vOvnL8XDIHazWJ5B3D18ETZzxgtzTJCaJuuUEQF+CA==');
define('LOGGED_IN_KEY',    'RpGsPI5pVzviQ4KaGTXED1vS52qeqgwcbalDp00/g7uDxuFmJDdIJKOVVwk7Ck1nEDlmZv51tsmGW9kxJChbKw==');
define('NONCE_KEY',        'q6b44P9EN9wDuwO7Lu+YKYepJRPK44u4FxgUwbOAfYoGZcMNksiKA5WgUR36f6nPLQuiz8uRyYvMfEV97eLgQw==');
define('AUTH_SALT',        'k8Wugm3k4WmOP9DgNvlvwc9ZOdv5r/fdKr/iMS1HCReyWv+1Ckn3X10msQfnRLxqQhL5zGNA4rLrjQ5gfszEZQ==');
define('SECURE_AUTH_SALT', 'OEfLtigfjdcUa9sil5XuqQLLhPLp4bajlo6KiWuz6O/8lgET8FFVkGTTGrmvZIaEicovzWY6eJjueARF2fXP9w==');
define('LOGGED_IN_SALT',   'Z7V+MkmyLzxP8dh8alMRYFV1BfrKdLdrpx02ZqBJ98PWFO3PSejsKy+4+VT/cayXRv8VWsJVzsdJCGOPQ6kwTA==');
define('NONCE_SALT',       'DCZx0ElVIEoYVbyuPnPqUrckVxJ2EWdBGQY3xChMTtuaaeg1Z7TkYAVmVybnqBE9NyaxM9yY8m34mX4jZ9G3qA==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
