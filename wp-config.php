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
define('DB_NAME', 'primmeWp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '12345678');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_ALLOW_MULTISITE', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eo/e:kBc%01Hao>jA9wXp]39Wq/wNWTB{5FOZH Id,E&sizx}Z?sWXojnW|y^{|y');
define('SECURE_AUTH_KEY',  'AX~[&i=#w1M<Xx7B`jg5Hm>:w8Z]MjJBHsyL%O{(JC:B(3IF=4CdB8|%WJ>],p]^');
define('LOGGED_IN_KEY',    '?4$CtU]@6#Rui86MhLLOBGOfBX5|nkM@wK~EF(:|.1m9:h^AdeCvvu,n>66]Sl#`');
define('NONCE_KEY',        'U),tUP]?`9EIS(MQ4&>jy;O5(l$3NI?I $];u5y%-eVNa1xgo,sd.qSW!|;d|en<');
define('AUTH_SALT',        '4^^ylm%f7<6>/=4MqvL^+6)x9^b$.p2m{`Vcb7EY}4Frz}i7MgweIPV?R?FUUcBh');
define('SECURE_AUTH_SALT', 'c[v!u(E3kf2%tXc}2+]g01OAz^)yPN;?c+Yxv+M,@#LDx7+L@>+vyLa4LF.>f8ox');
define('LOGGED_IN_SALT',   'sPHadG#9Cl*a*HxZaULKP`xlPO8txAol0/^i7vl4ikz]&nJ}yoYhn5sBS<AuBX2[');
define('NONCE_SALT',       'M,QD%i~ 1]F6(5LGx;.JzE,g;im^)`3#iQ8i).-|>(7y)<dmXTd,3SH%-swof6A/');

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

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/pimmeWP/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define('ADMIN_COOKIE_PATH', '/');
define('COOKIE_DOMAIN', '');
define('COOKIEPATH', '');
define('SITECOOKIEPATH', '');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
