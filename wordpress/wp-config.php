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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'meyzjcmc_vonproyb' );

/** MySQL database username */
define( 'DB_USER', 'meyzjcmc_vonproyu' );

/** MySQL database password */
define( 'DB_PASSWORD', 'vonproy2019cl' );

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
define( 'AUTH_KEY',         'KCRe&BkF3N%EcxzUYdA~q@ELYy.H!CxETqvN&R!o{zSQyl^V0!|S92|pSQ9e({bp' );
define( 'SECURE_AUTH_KEY',  'rAdXk/3`NSCsOa/+v7|]:k<G|9-gt3yjT >>WbV3d(@.P&=2C7W;<GPCzO-t,hV}' );
define( 'LOGGED_IN_KEY',    'Z+aj2gAF^nH%oR*]+5R&:.R,Af9lvbEdSm6V]0}]I1%b&S&BX2qNdKoPuTOnE,Fc' );
define( 'NONCE_KEY',        '_aq]6 RoD|OLE9L^5REOIW$=Z*1!qiC,iEc^>OhIdsn-a.fudGr3Y4AvjXZor+Bg' );
define( 'AUTH_SALT',        ']e{Y/T^=b)X~6nnzD%]XL|a{?jKf |s,{!XWwQ0cK&5f6u~npRZ5QS>s(XO]0^IK' );
define( 'SECURE_AUTH_SALT', 'f)n8(C0HEr0`g9NsD}vk?aF]SkwJbjpAlRpp!9tt}.W rj)S6r3C4*z0C G7}$Cp' );
define( 'LOGGED_IN_SALT',   '-HCPl!>JXGr*X5{Ep+!p79BY>9CHB$)nCvZ8&Oaked.NH(8:HAj:m%^hX%zf^As-' );
define( 'NONCE_SALT',       'c7yF_gpn+iu`sw-@mz F7;nb:Ut<>!Ts:b<yVFJ^?@.Z*oY?aox.lk<z{#U`!dt{' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
