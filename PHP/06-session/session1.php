<?php
//***********************************
// LEs sessions
//***********************************
    // Le terme de SESSION désigne la periode de temps correspondant à la navigation continue de l'internaute sur un site: continue car si l'internaute ferme le navigateur, la session s'interrompt.

    // Principe: un fichier temporaire appelé SESSION est créer sur le serveur avec un identifiant unique. Cette session est lié a un internaute car dans le même temps, un cookie est déposé sur le poste de l'internaute avec l'identifiant. Ce cookie ce détruit lorsqu'on quitte le navigateur.

    // On stock entre autre dans une SESSION, les panier d'achat ou les informations de connexion. Ces informations sont accesible dans tous les script du site grace à la session.

    // Création ou ouverture d'une session:
        session_start();    //Permet de créer un fichier de session sur le serveur OU de l'ouvrir s'il existe deja.

    // Remplissage de la session:
        $_SESSION['pseudo'] = 'John';
        $_SESSION['mdp'] = '1234';  // $_SESSION est une superglobale donc un array.
        echo '1- La session apres remplissage';
        echo '<pre>'; print_r($_SESSION); echo '<pre>';

    // Vider une partie de la session en cours:
        unset($_SESSION['mdp']);    // Nous pouvons supprimer une partie de la session avec unset().
        echo '<br> 2- La session apres suppression du mdp: ';
        echo '<pre>'; print_r($_SESSION); echo '<pre>';

    // Supprimé entièrement la session:
        // session_destroy();  // Suppression de la session MAIS il faut savoir que le session_destroy est d'abord vu par l'interpreteur qui ne l'execute qu'a la fin du script.
        echo '<br> 2- La session apres suppression totale: ';
        echo '<pre>'; print_r($_SESSION); echo '<pre>';  // En effet, on voit encore le contenu de la session car la suppression n'intervient qu'a la fin du script. Pour s'en convaincre, verifier que le fichier est supprimé dans le dossier xampp/tmp.
