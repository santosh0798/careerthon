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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i8877590_wp9' );

/** Database username */
define( 'DB_USER', 'i8877590_wp9' );

/** Database password */
define( 'DB_PASSWORD', 'M.oPMka0ORoHGz8IaIl56' );

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
define('AUTH_KEY',         'gksvClHD81NlKtOQGhPe1hRkvZjSrj9jAddaHyqJPXO1gcFWKpmA8Jewc0J4JkuA');
define('SECURE_AUTH_KEY',  '1xwEWMA4ApC2VKmjGLGJx1MbmiSoWijo7hdBQHPOMJfdjU80FaD4goXrxz6kMZDP');
define('LOGGED_IN_KEY',    'PLAy8hQxB4ZYtxd7jG7KDyAp0pPlZghb6r5jSzJRfAvJPgz51fGYc8oc04paBhWk');
define('NONCE_KEY',        'E3ZX1lIXXGF3hEZPbVMTBVG7R0DxeCEL9zN3vJFw89AUbhaYyWj3q0yhe2SVpCFP');
define('AUTH_SALT',        'Hrk2qOhMa1cmh70JWDQu52yhzzRrIpNrTLh17ei8ap6liQWF2KNz4xWYMrwODmp9');
define('SECURE_AUTH_SALT', 'dNSbK6yvKSC8ZlFkcmmCGNe8IUwyZLNbNj6kUXMf4Mal7zfQkAfEcnPHtRv0S4fi');
define('LOGGED_IN_SALT',   'mmSAQxpUB5drNrT12fkTliHw3Hn52FhO696nukSXjni2WvvCRwSAhzYljJQrzc0K');
define('NONCE_SALT',       'qv2ovbvelohpTTcmc3FAAVuCSILaentFricGlPCTNVVsYeejllEQG2jAoGvYVxhx');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
