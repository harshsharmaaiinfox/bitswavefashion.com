<?php
define( 'WP_CACHE', true );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u469285490_gkW0J' );

/** Database username */
define( 'DB_USER', 'u469285490_w1UtR' );

/** Database password */
define( 'DB_PASSWORD', 'Uw3RjM01Zp' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'D7~X39rllk/@[I>`>u 3^8Yf9_,5uWOqv~1FYl.U&kFA)~]/F_x#n1r3G(:pPff.' );
define( 'SECURE_AUTH_KEY',   'X<%O6oZngs8x_bTuu^WE0)nM<D_ZS%{)9r]v}vE-B8FP{E?AE<As*(G(Q@>KS!C4' );
define( 'LOGGED_IN_KEY',     'p9D^QVs)kl~n]=!>(+L}N2opxXGVZbn0vosDe3B9[mI`*e|?2Hh2]f5jl`o)C;QR' );
define( 'NONCE_KEY',         '-Olu7u~7P]gxDQ.2ms:|P%}Huxm<^VH+q?yRPVJl*^z2Xl0=j )^9/lCWtQ7)CDm' );
define( 'AUTH_SALT',         'e=my+{=7u{m8VsmEC-+w6TG4MS@&ofMrO(KwJO/ne[gjAV1w$+FzCj8az!hDTQ?{' );
define( 'SECURE_AUTH_SALT',  '@3j&L4w)9%~sZ+8%`]-HF(X3|:?*m =CmZRrkA!:(4%Uq8; 1q%]P2( v(Q7<})q' );
define( 'LOGGED_IN_SALT',    '9svl30!En=L>E+Y,1}~R%mDh>sa)[qWW#0L#LHm[=._!<,^4^L%P(HDje$ru{A a' );
define( 'NONCE_SALT',        'P>&OVZs(,7>C#1Oro&ChP0!R EWq*={f[xkUJtv|BSX@%GePGaDPt7)WdJ1:h,>^' );
define( 'WP_CACHE_KEY_SALT', 'o`mF2JMsU{JA-%f#[2!PB1}|:f&=k-9yJtZap@%t]Y:NDP;,{.; ,K)<;m^cddfQ' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', 'e621a99a4282d8433e75b744e36f3d93' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
