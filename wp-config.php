<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/Users/marybaum/Sites/servpressinstalls/rp.dev/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'rpDBnps6s');

/** MySQL database username */
define('DB_USER', 'rpDBnps6s');

/** MySQL database password */
define('DB_PASSWORD', 'Elx2Xdg1GM');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'R/AC^#q73|R!I4L2`j07u1IZmpqlWDgUF%^3|nA!!Sa%^7b53nPPTr_+:w&YMcDb');
define('SECURE_AUTH_KEY',  'K36pr#B0CC~r#/a7(GU$tZcRDlg;shTOf&#m*X4n~|P+`sL)_kIb81lQp;n/l/dX');
define('LOGGED_IN_KEY',    '6F74rVay5^|AnW"%V?:ULdT:ug::C&%+vJkp`zWO:$FdR|BDT9S6LjI|yBvrm(l4');
define('NONCE_KEY',        'Zj$C!o!7Qf)Pu8PbX_pQK`k2^@lYqg$Nd9%~Wd&XgbWmk"Dkl?Ii6ru6JF^3GU~V');
define('AUTH_SALT',        'BWJsb~L|#w|`?CmK?xmxE69XZk%TT)#LG5fb8h_&#$^j:7?yvH1(&FoaDQZvPwa@');
define('SECURE_AUTH_SALT', '$u!Iu7"0Ip+y9/64x9$h1Qu)bcRY*m@QRhL4dT5p;o%d#bF`y"?FAsypiMPITs4_');
define('LOGGED_IN_SALT',   'Hv+zNr3iV2^v&K2nmNF5eaQxxt?_k~?K@rnWo!&kz!1lF$|&f(RNW!5JtXj&&(#9');
define('NONCE_SALT',       '%aNKu@k#2RnJW0n#S@ag@u;cQ+l$/c$3hH~JOWvvD1E!I/0y&6K|z24|PDeA00bk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_qdwp2q_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

