<?php
// Création ou ouverture de la session:
    session_start();    // Lorsque j'effectue un session_start(), la session n'est pas recréée car elle existe deja grace au session_start() lancé dans le fichier session1.php.
    echo 'La session est accessible dans tous les scripts du site: ';
    echo '<pre>'; print_r($_SESSION); echo '<pre>';  // Affiche le contenu de la session.

    // Ce fichier session2.php n'a rien a voir avec l'autre. Il n'y a pas d'inclusion et pourtant il accede a la session en cours créer dans session1.php. Notez que c'est l'identifiant de la session envoyé dans un cookie dans le poste de l'internaute par session1.php qui indique quelle session ouvrir dans session2.php.
