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
@ini_set( 'upload_max_filesize' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'memory_limit', '256M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );
define('DB_NAME', 'krypton');

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
define('AUTH_KEY',         'y;zi7}#QH#.Tfcf$&d=]p}p`l#MXen&sHLQ~DoK~ FZG4@f1ApfrzG7Wrr-^:uiv');
define('SECURE_AUTH_KEY',  'UVd+WQ.`p?D;b%ZmJL-[4zb tH^{:aSkvt5bKyk;PlX:1MrRetbrqj= a${$K#. ');
define('LOGGED_IN_KEY',    'gVf[nVu% gz8e*Jd_ i~t6~0kwdbTuT4,rvPs|m1,X<eWA]nr]*>?kKy=XIK8#^k');
define('NONCE_KEY',        'M*-;#yh&*5&E},T^Li8b/W?<b }}5;-*/i5lc~CHWLWDPs57O_i!h=SW)Iq),`6<');
define('AUTH_SALT',        'v?iNa:[^M)d^=D06KX;Y,sXGa53DyZaRszY1[$C0@Dp>WXAOX!+lT&mhHxvRz-w^');
define('SECURE_AUTH_SALT', 'Abh8e/+5;:;y27pYT%r/usJLrb6!A^MYL)ECui>]:^]<papIgMWR5gxF)G9fZbpb');
define('LOGGED_IN_SALT',   'Tt+W^vZ:*D /jh}|00_nDS(KNj?lo!d4-@hykf!HUBs2K5*04*#xb]|MOxPWkDA_');
define('NONCE_SALT',       '1#N4F$4;V$o^]hB#`DoT`wfU!ivHe-X{J&ni-7sK,<60qsC1%dm?vZldN]xY(m.Z');

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
