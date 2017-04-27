<?php

//********************************* Fonctions membres ****************************************

    function internauteEstConnecte(){
        // Cette fonction indique  si l'internaute est connecté: Si la session 'membre est definie, c'est que l'internaute est passé par la page de connexion avec le bon mdp.
            if(isset($_SESSION['member'])){
                return true;
            }else{
                return false;
            }
            // On pourrait ecrire: return isset($_SESSION['membre']); car isset retourne déja true false.
    }

    function internauteEstConnecteEtEstAdmin(){  // Cette foncction indique si le membre connecté est admin
        if(internauteEstConnecte() && $_SESSION['membre']['statut']==1){
            return true;
        }else{
            return false;
        }
    }