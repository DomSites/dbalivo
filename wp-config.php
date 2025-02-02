<?php
define( 'WP_CACHE', true );




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

define('DB_NAME', 'dbalivo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Ty2eajywdErRJJCW2X1wYxDW0oG6BkMFe4QEqAGDSfT5TiMnhYf7ddWAsDz6JTgR');
define('SECURE_AUTH_KEY',  'ErvxYJsHbcW2QQ1D9az4pKTvR5vEhoXETL8F7m02w22sMHmmjQGZAnCI4u6jUyoe');
define('LOGGED_IN_KEY',    '15Z8iVv5mjKxAHkX7ruZCGqgu6oWwS8OImBr4yVNHB11ARQgmxwlWNjjXN3zSAwm');
define('NONCE_KEY',        '4KvfvUO0XeJx96QdwF6FhGxfmQKtLuJgaNYwgpHYUyBkLP1p3FzHWJ8v3t104QTh');
define('AUTH_SALT',        'Uu9f25EjvA1ePfe9GnDF3iHtca54zlT2Dwxa9lu6XcA9wztermcRdwzwu7xew8bO');
define('SECURE_AUTH_SALT', '1ugzmMx1ijjEs2DlY3SapozD16fMBexKKpzi2J8O5qvIv4UjB7Hh8Ve0i5DO8ozz');
define('LOGGED_IN_SALT',   '2budBczDLZ1JMtSMFIqOjHtWpphYoxCcLWV4KkYUtYLylfzxZ2jjdMZO2ekROcGl');
define('NONCE_SALT',       'dXljwjntcAmFfcg4yU6NgdlATrgkIqZfjh7Wy48c3bSlWTMqEAhvgoryp12tR1kW');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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