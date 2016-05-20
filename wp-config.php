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
define('DB_NAME', 'investinginnorway');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '|UpVh11u?A&m?*=}rj7M [y2.7acZ&5s(1Fnr{vsV[^blz?qe/I,*W4`l2?WIp_-');
define('SECURE_AUTH_KEY',  'sXs|kOBM;%|;Sv||-UNOaFZUF0%8j*]8&L-(dUOZ&e8Hv2.%mjVn[>vbq-%xRnbV');
define('LOGGED_IN_KEY',    'cE[L>:Wy|6vuEJu?RF1$.xB{R}W^RmGXCP-Z#:v{$]2:<386c/L}fhyC<1*hdnlg');
define('NONCE_KEY',        '=o0(BB:2^<2JQD,Qsy;]MYUM?AXm]&,^nK[Pvo7P19y5YwQ<MLP%D`J3[-6/E]8L');
define('AUTH_SALT',        'U{ixd8B$27ud4e{:4##Z8l i#cqF(7G-qLVLd+6v]*Q(`[^&lwfi1fVfg>Vd5jE=');
define('SECURE_AUTH_SALT', 'FSMppF`CMlPP1gDB_-83* $=I7*O*kg|.ood_e_bV*8J0#+ThkDfSm5i9fE!HqD/');
define('LOGGED_IN_SALT',   'W^41G5`LYF+O~Ce9&&fE(U|73hbV.fb9Aw0(EGQXwLI=Eb7VkVKH&V`oJo?O?WwI');
define('NONCE_SALT',       '0*%,RW&sz%wM_G&J?88xi@O2m9q1s~H8uuMX{vwx66kfMQxEH{O@G7+4H n!RKd%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_invest';

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
