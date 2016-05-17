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
define('DB_NAME', 'scotchbox');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '}F;LUJ>C34dHHd^M!sIne~4-M=WCO+F9Ro9I<WfRw30yEEP5<ReCMk1a.Mghw rC');
define('SECURE_AUTH_KEY',  'S4a}wV.e7(a@ZlplW/C)W3YvSY^0RtP.UWEZfvn:DrX}Igx?m%/,Pka=U3ff?Q0!');
define('LOGGED_IN_KEY',    '2f)sM N/_5h*-l$E;(^)MjYXouYPKR#U|eT$W~]Z%1GQXS>i&JxjKa <T0Cu$G8t');
define('NONCE_KEY',        'qw0v+E<HLKW!lf5+Yqe7C3v8gHS=j-4U#PD34]k_#qV`]@[vuTX]Z^ Ki?:~DJPO');
define('AUTH_SALT',        '2>&Rz-az7Mg.NEK&@fqee_s=s2*kmxt6AD+L$_$u:$s|z>wSfyr=1xrI@a|eJM@H');
define('SECURE_AUTH_SALT', 'Mcc]k~_O;v9eCp2BHk3aGm!U%k3`f{3+*joI!;>YhB+5]aO%;g]CISIo+h<9Iyzd');
define('LOGGED_IN_SALT',   ':F@^K$/d)sb^[qc^KR$sD5t_cHAuW=s~sy.,6w?Yf[=ML8Xa,9A:GXrF7La~Bw>L');
define('NONCE_SALT',       '%2p_84$Gp-!90{DW2b<tKw[y9P?TfblVm0d/M6IYl-7jq&$R~E`rw jIvyr)-jhY');

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
