<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wordpresspruebas');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'wordpresspruebas');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'wordpresspruebas');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'Irsb$3zY3fw/~5yXl!lROTtQ{|T1;6e1nu;ZLkD|y*yl[Yb0SmsVl9MO2$QYC38.'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', '!BXr<ImU9b3rnNnP)b|6|Pb2YuKRHa@Kdgj>+K7~DrDZUl|Aw+[/6L$~,&a>2CsW'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', '&<Ihj(|qPBNcVFuQ{ER(!:*Y#X8,iHil;XpbvW&D/x9[[zpJk=tVLF9UsM>m[7#?'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', '(.+{3KbipN7vf-g|elIXz/+HU-$Vk*2o2g}6HTB?X|z)B;3j^H$V|13jf,MYo*kw'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'S(%?Z_Fi_N1ai]X=Gl+}NQxmI57X{]`)({7n?m*4D)5ef,cMzWiPN>rGxo1L=-*%'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'iT%l#qW6GbG*b1Q@_H=~~j]mB(S;|@+*j*$d:+S!P+>Hv#M,We{c@nnba.L|/f+k'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '<de3AQ/ VwCG0uT)N}w+dtu.|6;Yjlk^Ef<cFr`{G>v&n)+V/&<w)=a$xT1/>4Zk'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'pFo.Qr|_parDpkIn9YxKxUEN.ULp*7uQaRFHF|d+H-=;kGy5Zti_XAJ$Z)l};|cc'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

