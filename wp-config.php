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
define('DB_NAME', 'shimpu_tokkotai');

/** MySQL database username */
define('DB_USER', 'shimpu_tokkotai');

/** MySQL database password */
define('DB_PASSWORD', '_15airplan');

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
define('AUTH_KEY',         'zxypooiqssglt0bypxhabkwmwimtqowiaaexjsxxhinkdmwtf93w4abpri1z7ohk');
define('SECURE_AUTH_KEY',  'keb8e6lejv0rp63z3zt72ledqsacilnr471yemzihryxsuz1dw2wlwsfo4nrvnsi');
define('LOGGED_IN_KEY',    'hqk4eclynf5sw6ojs1ckfk0klwcxiya8v4lout4ibpe47p07izxtgcnx4ohivbuo');
define('NONCE_KEY',        'xjh6m3trnaqutgsfkeal64lx1noxhn0ylvjbtnnhdfwu5cko4jzqhwjyaoie0frl');
define('AUTH_SALT',        '0yqu5wepun5i1cby45k2bunv6o0acbfcggetixx6myvfdgu9qfqwh6blghs9jq0s');
define('SECURE_AUTH_SALT', 'ginivffm65xq8mfwizdsp3ykaotaw0kz5dpynyu1jm8limjihryuma9xnysuwacx');
define('LOGGED_IN_SALT',   'f2mypkxnoqnhj8qr7fzkbzgrxqddpdsemi4sg2uv8rqksxjas7uz42j35sugdruv');
define('NONCE_SALT',       'cwligzxgeno1u5ezh3kiggxlvaa7lypn9ykhb4ct9jv8bmopyawtvlifhiicxhns');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'test0_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'nl_NL');

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
