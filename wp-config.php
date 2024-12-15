<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'crNC8GN^ wgut9z/iM9>##TvT?twj4RpC]rAfA/,3?2w`^3yN$%m:E1DiE EK4.|' );
define( 'SECURE_AUTH_KEY',  'NFD^(w5-uQ9Z9F>4J-_KLG iz{IW~k}Q0YM]$~f,AF|[&C}9-TYWWB139nEx6^.E' );
define( 'LOGGED_IN_KEY',    'W$EXEqBJ68(L%Lo/c)$<>uaG{N#0c+jKI#c%SmYX)0Wf^38WzHjnc)QH[V8]%rR.' );
define( 'NONCE_KEY',        ';i)zj%|nB&[Vz%:050B[iVV,ka]z,.jE,h1tFGI[Zai(pnj;-`U!`BOCeNmJAv0I' );
define( 'AUTH_SALT',        'uSLb=|k <ZcRx&2gbP7r/tU]BzBr+T}q K.+X8QqnCQ[$2K>t0jZG^SJ+>3VZz^x' );
define( 'SECURE_AUTH_SALT', 'OC}-%&-t/2M6w)2C1wh4}Vos#]F+jy5p#A~7y8[5!n}LYRvdQp-AJIo/*Ff7+]XL' );
define( 'LOGGED_IN_SALT',   'lrw%[V$9ifeH[gKe3f&><iSTfPdpsV5qr({dYA/+t;o&l{^c(N.[D$&Z}VDKv*@m' );
define( 'NONCE_SALT',       'f9uN~ve$ fa:&c~h|; v8z4&1N=6|V^.e:U__pI}XjdAxJ_!+y!qNvpm VpiK`xM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
