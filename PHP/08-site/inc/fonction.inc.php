<?php

//********************************* Fonctions membres ****************************************

    function internauteEstConnecte(){
        // Cette fonction indique  si l'internaute est connecté: Si la session 'membre est definie, c'est que l'internaute est passé par la page de connexion avec le bon mdp.
            if(isset($_SESSION['membre'])){
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

    function executeRequete($req, $param = array()){    // $param est un array() vide par defaut: il est donc optionnel.
        // htmlspecialchars:
            if(!empty($param)){
                // Si on a bien recu un array, on le traite:
                    foreach($param as $indice => $valeur){
                        $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES);   // Transforme en entité HTML chaque caractères speciaux dont les quotes.
                    }
            }

        // La requete preparé:
            global $pdo;   // $pdo est déclaré dans l'espace global (fichier init.inc.php). Il faut donc faire 'global $pdo' pour l'utilisé dans l'espace local de cette fonction.
            $r=$pdo->prepare($req);
            $succes = $r->execute($param);  // On execute la requete en lui passant l'array $param qui permet d'associer chaque marqueur à sa valeur.

        // Traitement erreur SQL eventuelle:
            if(!$succes){   // Si $succes vaut false, il y a une erreur sur la requete
                die('Erreur sur la requete SQL: ' .$r->errorInfo()[2]);  // die() arrete le script et affiche un message. Ici on affiche le message d'erreur SQL donné par errorInfo(). Cette methode retourne un array dans lequel le message se situe à l'indice [2].
            }
            return $r;  // Retourne un objet PDOStatement qui contient le resultat de la requete.

    }