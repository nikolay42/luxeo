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
define('DB_NAME', 'luxeo');

/** MySQL database username */
define('DB_USER', 'mysql');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

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
define('AUTH_KEY',         'LPIukYn@aFonwix5>YK1dIMb}HU&b@FP,ii2{p]z@/uCe?!|;X4TF9(8]P+RR5{{');
define('SECURE_AUTH_KEY',  '{^bZ:.1w1CcFp ma.RInI7+>)Oq|7YW/XW<VoL*}60`&LeH5&R4oh:F3)={ujsKA');
define('LOGGED_IN_KEY',    'mveKGnC{w1QvhBaY/RdI/>$$kl0*M|&$qb`d+8$0k<yneFaSr[R#tqv4n%|m4=?m');
define('NONCE_KEY',        'G0[>RaLo,Fy|5FIY!af`k5vzYAl+vrGLZcFMo]}ybEg|t*pW]vY,naE[<a#i:w`J');
define('AUTH_SALT',        '5rgW]~R5sEKNb[Qs#TH)3+3``ijZ3.4oC;w726f*<z9uJ;)Qi bvxgF=iB}bPhRg');
define('SECURE_AUTH_SALT', 'O~~0OS{mL~}XYR8Tuf`C}zHua={:Gc2zEv]6S^4#]IH_tE8DWK(,2RF=4MUK(#as');
define('LOGGED_IN_SALT',   '#kc)u#1@xIT:PJ&OvA#X#`doEJPz.;{c::J$F,EUPYXn]o~~#ZeCWw,q1kY}ZbA0');
define('NONCE_SALT',       'Nh-IBwl[}@aIZ!;VRd{_, -Q]a_dOg{>2$<L1E+3g%aAg`CJ~px%?)sIewo6;]p_');

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
