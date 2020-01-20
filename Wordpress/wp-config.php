<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'chocolat' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'wf3' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '1234' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'D@((nTy@G#)43,{O+TK.]HK[baeR<^)t~<Dsk8thV~_XPnfmhe4#ACvER{&UzE-8' );
define( 'SECURE_AUTH_KEY',  '[*%rVWvwT5^%njEoTDb*6i9?DBM(6rz`@Af7[uPK+vH!}_.CM}r3X|xD2pxlW`Q0' );
define( 'LOGGED_IN_KEY',    'sF:+.Zlh|a=awSz:KODr8ZP31WP8oZ]0*Hy&=x#6Ra<s}zmy[gWlo>QPX,S *P+2' );
define( 'NONCE_KEY',        'VwCn$?L|o.6RKKNlYD2KExd7#c]]!d&A@E5=5RL&op:lLPyXew<4XJ3/v#044NB}' );
define( 'AUTH_SALT',        'gqmqqz0$oZtn,c~%|cs_+@S(3[H@`dQaL8f%;]Re8V,V(b:m?)k*<M>XQ:@8(]x$' );
define( 'SECURE_AUTH_SALT', 'I&v=],*NwpYW@JuM=#2&[c*GGihIK*sIY9Ed</:][ n:CA1Q[zvRI$&KjR&{7@Ld' );
define( 'LOGGED_IN_SALT',   'KUdJgY}o4ef]ep7=7  {Bz%}M!%q|}8Kg#/QK-*?4dR-LHc#d_/yYn?&m4Zd3`w%' );
define( 'NONCE_SALT',       'TBsc+DW-r<H{?#~S7t62z5>53j&Ua<HIV)`g#S92Zv%3NV?JG3h@z~~|=O&@21*#' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
