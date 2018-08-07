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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'fG;F)`y=MI3by<oW0yRo*+?WHln[yE(/)rEHQSf/0+xHQa@d1j8rRNJC/b:_BKj%');
define('SECURE_AUTH_KEY',  'b$,U6k^vs.Z]{td<m<+3`/Kb64]%<SVT:i+G9z mhtV:B;tA_2WEp5_!7=$6Jflk');
define('LOGGED_IN_KEY',    '.~Ux~@-.C<6#44?T5EWqf?FKR]|U$qd;qF-#{7_IO`PW4:+;FeV2t:VKWRpK5(wO');
define('NONCE_KEY',        'fne>f5-[o9A{l:SSDHy^5@b^Yc42.v-Cn`!SE)#Z[L]`ZLwLp((<= 4*j$~e~g*B');
define('AUTH_SALT',        'b~fV7SKG!ds*Tc>3t_1#*1m(k5NOiA)j$p_*Ysa$8kp3[mfR<[|6D^YBdpl3t#X-');
define('SECURE_AUTH_SALT', ';%g_Z7Cz3.M]T@oK5A[g8dn>pW=#eZf0-#FL,R8Tgo-)mB9jG%_Vo`hZ`$C$67F.');
define('LOGGED_IN_SALT',   'UK&zBa[hIz+B{FAux0adQ [iN5j.y9Kpkr/5`G+_Y8*o.cURb,#DjRQZORUGbC_r');
define('NONCE_SALT',       '&yK&?Y9f6]CP@3{8.C.>2#=T+% laE0[:3s~=*_)L48QmCyYT+_QL1;C[pJ77BXU');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'SAVEQUERIES', true );