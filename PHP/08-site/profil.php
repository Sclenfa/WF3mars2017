<?php
require_once('inc/init.inc.php');

//******************************************* Traitement ***************************************
    // Si visiteur est connecté, on l'envoie vers connexion.php:
        if(!internauteEstConnecte()){
            header('location:connexion.php');  // Nous l'invitons à ce connecter.
            exit();
        }
        $contenu .= '<div><h2>Bonjour ' . $_SESSION['membre']['pseudo'] . ' !</h2>';
        // On affiche le statut du membre:
        if($_SESSION['membre']['statut']==1){
            $contenu .= '<p>Vous êtes un administrateur</p>';
        }else{
            $contenu .= '<p>Vous etes un membre</p>';
        }
        $contenu .= '<h3>Voici vos informations de profil:</h3>';
            $contenu .= '<p>Votre email: '. $_SESSION['membre']['email'] . '</p>';
            $contenu .= '<p>Votre adresse: '. $_SESSION['membre']['adresse'] . '</p>';
            $contenu .= '<p>Votre code postal: '. $_SESSION['membre']['code_postal'] . '</p>';
            $contenu .= '<p>Votre ville: '. $_SESSION['membre']['ville'] . '</p>';
        $contenu .= '</div>';


//******************************************* Affichage ****************************************
    require_once('inc/haut.inc.php');
    echo $contenu;
    require_once('inc/bas.inc.php');