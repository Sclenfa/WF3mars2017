<?php

// Contexte: souvent sur les sites bancaire, vous etes déconnecté automatiquement au bout de 10mn d'inactivité.
    session_start();    // On crée une session.
        echo '<pre>'; print_r($_SESSION); echo '<pre>';
        if(isset($_SESSION['temps']) && isset($_SESSION['limite'])){
            // On verifie si les 10s d'inactivité sont écoulées.
            if(time() > ($_SESSION['temps'] + $_SESSION['limite'])){
                session_destroy();  // Si les 10 secondes sont écoulés, on supprime la session.
                echo '<hr> Votre session a expiré, vous etes déconnecté <hr>';
            }else{
                $_SESSION['temps'] = time();   // Sinon on remet à jour le temps pour relancer les 10secs.
                echo '<hr> Connexion mise à jour <hr>';
            }
        }else{
            $_SESSION['temps'] = time();    // On remplit la session avec un indice 'temps' qui contient le timestamp de l'instant présent.
            $_SESSION['limite'] = 10;   // On fixe la durée limite de session à 10 secondes.
            echo '<hr> Vous etes connecté <hr>';
        }