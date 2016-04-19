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
define('DB_NAME', 'mccann');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123@cms');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*; cL p*2kd2H>Lu1]_}yXA>wJ}a-!&7}cjB+RC/C WM( Ha.CY_xlR%NM[J+AM^');
define('SECURE_AUTH_KEY',  '>Hz8Ph@z+C5,-rx<!O#uus^YM./zUvpFA^z3M8$Qkq+Pb)O&KDHaNyD&}-N{z :|');
define('LOGGED_IN_KEY',    ' 1}h+bOtTiHCz9&|@[hZ?|EBnt~Z^ou-RZ=PtqLKZr+hbc]gsHvSVZXxpVBZhVEg');
define('NONCE_KEY',        'ZG:d`9.`UM@o;{-[hSP=(-zu*)+OQo(l=M$nTR3Wd -vDg?@HymE/36!hy+HaRQ#');
define('AUTH_SALT',        '{dA[8`zmf/,=yG>->*HyfByUp,Eqrure@a1^j5b+1>i-u%F3+GtWZ9&-xY,e9| X');
define('SECURE_AUTH_SALT', ']i)<Y(1`<d~8Y ODQSQhl+|:E$jS!+Iek9JK7I&qmU/uRI/8i|xKGg|(khRq=Hd ');
define('LOGGED_IN_SALT',   'R.H<6-vEE(?jm]c)T%4 ;%OkVVI-hjuol+q9Y%~%+_|KUbAW:{9;)h+p>}B^hPLF');
define('NONCE_SALT',       'L92XMuRKmIlttlFF[J>e>V&3!5:*XF-Hu 2wPt[ * 0B1D&F?zvcvrI<NzM(aD5h');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
