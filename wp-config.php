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
define( 'DB_NAME', 'test' );

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
define( 'AUTH_KEY',         '||l/LIn[%*x*WNo)<Gi+j,6G|O_k<3,h6nG?pHZFQ]g]J]J2YTrh2t2]m0Ev=Z=x' );
define( 'SECURE_AUTH_KEY',  'k 7/<gsmes.`,aF38ik03B(e&`2_[F;,PlBg`CYI[+,7sXi.j9xoo2u@g6]e~tw5' );
define( 'LOGGED_IN_KEY',    'F++SCA!xA&XK]@8nMbb@Q/A0#hLU0N!BhLpP4%evZPLQf|@`/5{Rfv{n1{|6bwkC' );
define( 'NONCE_KEY',        'f.-#0Lmc(YHnsRsEy~J/3M$zbkRS&WRQ+cBdt:gZF+ #M=FWGy)FT-xqVC2Kr6(k' );
define( 'AUTH_SALT',        '.?:y26>?C hFFtO2KR)aMN(VgXr$ayd3[ZA*[.u3Aknd`tNS$*gm2-uuIxF4Z y+' );
define( 'SECURE_AUTH_SALT', '35Z!Zg5&VSb7|rX?a!iDIaqzCgg+W4Q&!^SEa3R+){TP`?>TyO;X6joH~ tU_JHv' );
define( 'LOGGED_IN_SALT',   ',V~yb4ahEIu i{G2gZS7daAJh|_F#S4TD=Ti_!Xgz|:X6Y|K=>}w<1u([nsriH9&' );
define( 'NONCE_SALT',       '{YD4,2DgYMhWX{ty<1klF92O@NY%~y@HkyuuP)0P=oVw5=J,.5lUhovu,hly#Xm#' );

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
