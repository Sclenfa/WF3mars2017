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
define('DB_NAME', 'Cinema');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'uC@9^cq4=2`5;T%NZUeV7&j%U3?i}+cg/r3nkv^4,W}<a7_NlP$Y>o>Z4fDJXCdA');
define('SECURE_AUTH_KEY',  'XX[M{.*<&u$8T=a7fVpQZplT~lce&s-Y_9cMq$p^ON#k/*-~f89!t]H`4H2]U2{w');
define('LOGGED_IN_KEY',    '~q-e!+)ZN?C?jcSV^O.A(`]C6J$pbgxU@o{%J~`5sr@PQO%.%S*$TOejAmqL_.HR');
define('NONCE_KEY',        'a[0I(V_,9/VUo7Kxd:szi=IxT@/V7JM;6@#v6*t# 9[]C<2ax7kPHl~m=uTS!g5)');
define('AUTH_SALT',        'LoK3>Aa}]+-^%ltcJDhBs,}+*f}Tv,:I0YGD|^s[^%sDqA(0m_rEyqu=aB6 t<.+');
define('SECURE_AUTH_SALT', ';eq^IE})A)VS++|Q?z0t=8e`nId2fmupB$E*dPk`CJ5uG?R%_YarmDCgWlxyGo1F');
define('LOGGED_IN_SALT',   'pnr]:u}QGcXEtW[+qg5^@N-gd#sIAt&6xxNh$?#}x._&w_7F_1virO{Kd:_r.[Lg');
define('NONCE_SALT',       '1#2EYo^ueh8UAv#.&?bJ{,XIMEJy UEe8P 5KthP2)$i6oSu(rJ &*=Arz/cZoBd');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

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

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');