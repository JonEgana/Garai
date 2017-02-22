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
define('DB_NAME', 'garai');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ',R20j^0&lYa?Vjiy1+l4Av=,j.qQ9&ZUHVVJctz`W>es?!y+a=(9ZHlJ_[IG8 p,');
define('SECURE_AUTH_KEY',  'G#lU9F]p>CH;Oz~CTxTr?zR-MHI[:jT|c+=1B:.gdZ1;-3Z9YK,IJMgX^O~%,:m0');
define('LOGGED_IN_KEY',    '1O]{JQLTCoG1WbR?(?;Q<c<R}vv{#7n=/&yzp.TvS>;wMY*W6{]]0`sKS9u<X/Ed');
define('NONCE_KEY',        'L`f[{:bADsp<u(<*.O>CGXvFklTHbk4<|[WcUgSg<YtpD&&E V5&-4j#3B-@krDo');
define('AUTH_SALT',        '`#[ Li|q;Ane55WRAQKz+S6SjJBCJ. +37}/Wtl-zhCXr]hvkLTIf!i=;>?9s[-`');
define('SECURE_AUTH_SALT', '1DA05g5O].)#T_kL)?0lQ+e}XrnP9kZ6RjSsHuJ>SrmHb~B]@]sBc_kPjoTE<-CC');
define('LOGGED_IN_SALT',   '*UxG1Dc,mO3--j;e@IX$xG:X?X7&nt{k(.-Wu?/+4y2i>:)/ab,Dk eiIgx=&RA9');
define('NONCE_SALT',       '1Ta}jua|cLf)R:Qmsk_{Ff?E3Y8RHjFp3J h<G}uzGPlw8j%:F<fRXh@fn8f@A&)');

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
