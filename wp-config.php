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
define('DB_NAME', 'fabia');

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
define('AUTH_KEY',         '8`A^KbO=r4,>@tTbPfQw?|bQBl4L64NaK|1i2kkROEX7NmSU0)fSx=4naK|tTn<}');
define('SECURE_AUTH_KEY',  'T/2} `)uI#tRhP<U{$2c6i6O{:10G)TE:Q_:7c$cOsHsb2w`T>Pg#eO0L{S}WB6k');
define('LOGGED_IN_KEY',    '3U!)hlgsehB@8y=A9 Ybd-64pp^LS`bgD6G=,jO%zxxCwOhp0oM{`>i9$vXd^ig!');
define('NONCE_KEY',        'HTlDD)=E)9YvgUub]!B=w#c&/2`:n:`(mN#s3G>hXdRguMsCHTPj)P|xg,55xXu2');
define('AUTH_SALT',        'b^XD{b8leY$I}464h|Gx{pD+,0HB8gn$9`#Bsve]zz&uuo Q*jFjrO[McA#$&j<*');
define('SECURE_AUTH_SALT', 'L*u>bqp^Vb+o,Z_B5#~p(0LY2KCFV=*Iol`Sy<f&f$Io{IW`ce_HuQ1;,gAz(O1:');
define('LOGGED_IN_SALT',   'iW^xnn3u{SznPmh~cz.T3r3(.49@*.B(p@Ln83r)RSUDOhOfMLGs#Tpan{TDye^j');
define('NONCE_SALT',       '~VTwx[0>{E!p++[w%=d)fnA9Z$aT)?ItP}=W9E2aSry$14r9cHC|BdkR?UT4yOjP');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fabia_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
