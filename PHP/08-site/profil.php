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

    // Exercice:
        // 1- Afficher le suivi des commandes du membre (si il y en a) dans une <ul> <li>:  id_commande, date et etat de la commande. Si il n'y en as pas, vous affichez aucune commande en cours.

        $id_membre = $_SESSION['membre']['id_membre'];

        $suivi = executeRequete("SELECT id_commande, date_enregistrement, etat FROM commande WHERE id_membre = '$id_membre'");  // Dans une requete SQL; on met les variables entre quotes. Pour memoire si on y met un array, celui-ci perd ses quotes autour de l'indice. A savoir, on ne peut pas le faire avec un array multidimensionnel.

        if($suivi-> rowCount() > 0){
            while($result = $suivi->fetch(PDO::FETCH_ASSOC)){
                $contenu .= '<ul>
                                <li>'. $result['id_commande'] .'</li>
                                <li>'. $result['date_enregistrement'] .'</li>
                                <li>'. $result['etat'] .'</li>
                            </ul>';
            }
        }else{
            $contenu .= '<p>Aucune commande en cours</p>';
        }



        // 2- 

//******************************************* Affichage ****************************************
    require_once('inc/haut.inc.php');
    echo $contenu;
    require_once('inc/bas.inc.php');