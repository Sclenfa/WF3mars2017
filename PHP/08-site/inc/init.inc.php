<?php

    // Le fichier init.inc.php sera inclus dans tous les scripts (hors les fichiers inc eux-meme) pour initialiser les elements suivants:
        // Connexion à la BDD:
        // Création ou ouverture de session
        // Définir une constante pour le chemin du site
        // Inclusion du fichier fonction.inc.php systematiquement dans tous les scripts

    // Connexion a la BDD:
        $pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // Session:
        session_start();

    // Chemin du site:
        define('RACINE_SITE', '/PHP/08-site/');  // Ceci indique le dossier dans lequel ce situe le site dans 'localhost'.

    // Déclaration des variables d'affichage du site:
        $contenu = '';
        $contenu_gauche = '';
        $contenu_droite = '';

    // Autres inclusions:
        require_once('fonction.inc.php');