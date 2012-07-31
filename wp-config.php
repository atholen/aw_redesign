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
// define('DB_NAME', 'auralwes_wrd1');
define('DB_NAME', 'aw_duplicate'); //ONLY FOR LOCAL

// * MySQL database username 
// define('DB_USER', 'auralwes_wrd1');
define('DB_USER', 'root'); // ONLY FOR LOCAL

/** MySQL database password */
// define('DB_PASSWORD', 'y2ThNhrgMC');
define('DB_PASSWORD', 'starwars'); //ONLY FOR LOCAL

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
define('AUTH_KEY',         'khtMigK88nWy4YHQjW1Y4wCYl3qxNz80QYlkbtIQmERfMkeVKFYMU4dv4tocWEjQ');
define('SECURE_AUTH_KEY',  'NFQVkvaeubwLNptmAj74JwyHbVpkr3AST87V4jiecZ1ZwokayGiLkHlC8vCnYvD0');
define('LOGGED_IN_KEY',    'gLmuDTxPFRNLiHJbqJTw3y0CGGif93L6UvnhkClPSfD7cIQUqwEO2CCHeOKM8T0M');
define('NONCE_KEY',        'apXl6QbSyoZccPCkfAhPl1rHVuF61nJFCmZIhnAmeiAjHaNipLuwDGBbhF5BRohU');
define('AUTH_SALT',        'bp0kG4VW7CXdKFI0UE7kFscFi6dspC1iVLDqJ6BMItbpS31zxlhAsYYgRRQjCqR1');
define('SECURE_AUTH_SALT', 'ExKrzXXFs77hXYatyPe8tTFBnPcST6K80VZQnfr88CwDtU8dFeKzzFPHKdf8ZrEl');
define('LOGGED_IN_SALT',   'rLoIWsZFStIhBHDimzWTvPL8HbCd0SdRJbaTAtGElGT84LpGPcETmMNUoX7cJggI');
define('NONCE_SALT',       'f10hwuR3HmU9ArfLOj0ddzcnqeQB2iucWU7AZdOHLxYP5kSeGKmKh9wjM5ZqYV5g');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
