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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '[p|YE=.rE27G)rP(K^_X%h`1ov?B1$Ff|iOigDsU?e>Q63XV/SSf| Lq8[A6?UxH');
define('SECURE_AUTH_KEY',  '4 >h]/YbEY3#|[1X^ x7n+)9>_I67Ii$k&{n}m]s8$O}p.71i>=qGM$SfZxIL,+N');
define('LOGGED_IN_KEY',    '-ak*@2XAfem+4S(F3{zF7_j5 :=M-/)LPXR7kZ`5HSnvlJvSp&[k0UPbv[K)e9xK');
define('NONCE_KEY',        'hnD5&u+0h;c9TrGQV)A;LoMe F&*Pa./!.5}CZy}J|Vw` u4 HADl=!sD;/;3lQL');
define('AUTH_SALT',        '#L/;W0y^B@iD<?zNt6{M?cSQSupc9HW>-zHxJ)0e^Rr`~ng7]wteo]cb*QpHvAF=');
define('SECURE_AUTH_SALT', '<-PQ^q<M#c]u.T|E^g:$Aw2m&M^.@<X/<nvbj]IYgGh:&&BvjP)x(lq.3WjByY}Q');
define('LOGGED_IN_SALT',   '9pijFn_n5:ah+KtT}`6Y+30S8F;4a_(7u6PDQ~3$D7TG=&!_hUdM2W] 5J*BWxFv');
define('NONCE_SALT',       'U0aK~=9b*9z)F)YT@~1jW$AvP%3~c.wv}J.;As%8H<UD&wz0aM7{EYhUrtn<P<23');
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