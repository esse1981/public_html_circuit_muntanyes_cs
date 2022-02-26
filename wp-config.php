<?php

define('FS_METHOD', 'direct');
define('DISALLOW_FILE_EDIT', true);
define('WP_HOME', 'http://circuitbttmuntanyescs.com/');
define('WP_SITEURL', 'http://circuitbttmuntanyescs.com/');


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

// ** MySQL settings ** //
/** The name of the database for WordPress */



define( 'DB_NAME', 'db810000476' );
define( 'DB_USER', 'dbo810000476' );
define( 'DB_PASSWORD', 'EmgHDp62g7KjaO5@' );
define( 'DB_HOST', 'db810000476.hosting-data.io' );


define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );






/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Td)ADVjD|2[UTFR9[kkgpub=w:1^:hF{<fS}&#w+fF#&Lf=KX,;N(Be4U(c/XT6=');
define('SECURE_AUTH_KEY',  '@$n3naoygZ<4Q9,Su@_mx*N4;G!G]coKsV^lwup+S({~._%Tf52Y*DgjnFbW~p*:');
define('LOGGED_IN_KEY',    '@ru KH-Z3ddP*aSo]2&NyKR>~M]U)0Gw+FP[rWovsc!rn.r}jwdGT-*,odcfaZUr');
define('NONCE_KEY',        'F RWA4@|`>w6_ZkpG+,|[U=:fnl_Bpt0f-+u+8UZ?-+Z5%T1<+9v](nZEHKk5K,`');
define('AUTH_SALT',        'oD.g4/_;sr*CHpHed7}T}~AY#jqXva?-+P[eaH*&S|fBXTML)R{TM65|zR4155Mb');
define('SECURE_AUTH_SALT', '-D[$>7H0/56t=<B}}~4K9h$i> /rGpik>mGtv[{z~A6jE:w--:e+-P28Y3Ky|UKI');
define('LOGGED_IN_SALT',   '5:p&Pjh%EV.0>UQ.OcIGs}3P=AM/y92n=A Hcmt0hM0b(4NeMOJv8c~Xbhgjh=tq');
define('NONCE_SALT',       '!s4%l^c?I7l^CX,UKYa08yI(Y5MAe.]c9]=<TAuih#1[9g1Ne=u~Z]4fPp*{w~%K');

	
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', false);




/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */

$table_prefix = 'wp_';


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
