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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'specialolympicsbangladesh' );

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
define( 'AUTH_KEY',         '#$F~8`ME{ib0rsF FiJD5a)Y}t0;pi+GEy>T2RMMMD}+n!W,Dcf#xc}Jw$capq>c' );
define( 'SECURE_AUTH_KEY',  ']4Hl&O|ing(t7Vudv~+78$%}9SG^Te}C!_5jGDD!;!dK.pz:;~>|%HK<hiz+6enZ' );
define( 'LOGGED_IN_KEY',    'Oa>uMU9Banm_xa*Wlt!Jd(IE.5,27vXHpo`B?ca3fb1|D7)aUe_B{|2I0u+r>$|C' );
define( 'NONCE_KEY',        'wzLS$5sfzXnb*~OB){wS+3W.uxvyDIjTiAu>c4Q3%H[Gy[pV0vi*3&oYgJF=/h-6' );
define( 'AUTH_SALT',        '75cQj>6T>du&d?k~^L[0>;0d1g;9<u 7nFMm;k)y_11HBUi}dE,/VGkM=ip])X2D' );
define( 'SECURE_AUTH_SALT', 'Y]PAQzyz@<gspbC|.z=O~BUTE-L@}:tlYho4w8~5%I^iXSMIo:>]k3X1OAI#n7-9' );
define( 'LOGGED_IN_SALT',   'C/WPTQ.?9gNcsmj+|i!Hgrwg?APge4`y~y5}~I:*<BX.F&@o!Kfhxkg8.PR3S5Pi' );
define( 'NONCE_SALT',       'lqU4mr{g@!F-Zk>lK||}d)EGuTp%0o%K3UXPt<reR5roQN3~wG=qm*9, h$F}-Sb' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
