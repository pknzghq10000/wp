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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password!3');

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
define('AUTH_KEY',         'emcyAtn=}bpl[IDbnx$]96(=cja{YDMnx&:~Vrv=huD=^ah`;|-xh3ln~N{+?FPK');
define('SECURE_AUTH_KEY',  '[#7Ulg1swsKm$ZW2Pn|[MZ{v#Yr52+lUP.B2wnX+)IY|R&_^}X<P]-d0Q4`Gzbu&');
define('LOGGED_IN_KEY',    'lvKu4-o&[|N!Htby*V{l*V@CX`cDFeil?y-JWr+[`yA>l9]NqhO&sLU/Gv|(ND]n');
define('NONCE_KEY',        ':Xg%Q`nEY`{|UD=uB<Ww?E#%^s4n`H?ZjCQ7W(e$1PaFS?Db/wh-]xU.p-fY0mes');
define('AUTH_SALT',        ']G|cHK}@f-p/x#Q#2E)Vm _.@W1zY`fzjo_TQ(Y|BGskV#*ld*9PltWP}< j B*E');
define('SECURE_AUTH_SALT', '1VP56B_3U)J$i9fG&U[W-:k`w-moZ$E]Fh|rc[r||j+&peczs^Ow9_Fk^j77e?w[');
define('LOGGED_IN_SALT',   ']8 *dT+E/+U?(aM}[$9KXJjKxo;gj,r]]*S6;%/|k4[nJO=ovCJt/_=x9vO|9pn,');
define('NONCE_SALT',       'hR?a<?lLP4*ni5D|2>P8M52see5+6>,rj?=yKUed&&s.fCdwu]]6!i/L&.2r,kY2');

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
