<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'eu/D7typq)Ay)q4p]C` j:mF8kI~*Bh#}WcO[(W?kiSDc*m]^wu)Zw*)?w$q!3&Z' );
define( 'SECURE_AUTH_KEY',  'By&Jnn#kJV?}#.6BnX0iMDHb.,r3%<}9B3b2!3Fj@mllqa:ni~JOLVi?OLTIFK.0' );
define( 'LOGGED_IN_KEY',    ';:<A.gKw,Yg>1^l!(Nd8[j;^qVl}SauF~fnZVT-m_ _v3P1lNn@ob]T(=&I_D{^8' );
define( 'NONCE_KEY',        ',7r EPr}KB2%i1{D+,U*G]h-[^x?<c_nARx`Gc_6a5l!!SL>=1cZTy8vc}wRw,P}' );
define( 'AUTH_SALT',        'Ompr7T`2e3{$_~>6a7<Xv^6e~M+d_aGjGILe$.GRC,@2pc=3Bh(cm<(bQwLe9)L>' );
define( 'SECURE_AUTH_SALT', 'bN9wIhZ[m>iA`^<q>?fB@`<%yB@5#*:-&G<n&hhW`]FYMcX5~1+$j}J{ 0/PxGb.' );
define( 'LOGGED_IN_SALT',   '}4AM*TQK{xT76E1RCUoxFhId[?D/!cQO&/Kl}{&,>RLw.*DCgx87{;>`W)f+2{C4' );
define( 'NONCE_SALT',       '9MHG@gQMS)00^KMf88mc#^]VR7<!PR}9Ifc//~J-=.cfZ~{A86y$G.0a(qWz^Tch' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_prueba';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
