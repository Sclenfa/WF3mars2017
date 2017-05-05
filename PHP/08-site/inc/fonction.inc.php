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

//********************************* Fonctions du panier ****************************************
    function creationDuPanier(){
        if(!isset($_SESSION['panier'])){
            // Si il n'existe pas le panier dans $_SESSION on le cree:
            $_SESSION['panier'] = array();  // Le panier est un array vide.
            $_SESSION['panier']['titre'] = array();
            $_SESSION['panier']['id_produit'] = array();
            $_SESSION['panier']['quantite'] = array();
            $_SESSION['panier']['prix'] = array();
        }
    }

    function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix){   // Ces arguments sont en provenance de panier.php.
        creationDuPanier();  //Pour créer la structure si elle n'existe pas.
        $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);   // array_search() retourne un chiffre si l'id_produit est présent dans l'array $_SESSION['panier'], qui correspond a l'indice auquel se situe l'element. (Rappel : dans un array, le premier indice vaut 0). Sinon retourne FALSE.
        if($position_produit === false){
            // Si le produit n'est pas dans le panier, on l'y ajoute.
            $_SESSION['panier']['titre'][] = $titre;    // Les crochet vides pour ajouter l'element à la fin de l'array.
            $_SESSION['panier']['id_produit'][] = $id_produit;
            $_SESSION['panier']['quantite'][] = $quantite;
            $_SESSION['panier']['prix'][] = $prix;
        }else{
            // Si le produit existe, on ajoute la quantité nouvelle, à la quantité deja presente dans le panier.
            $_SESSION['panier']['quantite'][$position_produit] += $quantite;
        }
    }

    function montantTotal(){
        $total=0;   // Contient le total de la commande

        for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++){  // Tant que $i est inferieur au nombre de produit present dans le panier, on additionne le prix X la quantité.
            $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];  // Le symbole += pour ajouter la nouvelle valeur à l'ancienne sans l'écraser.
        }
        return round($total, 2);  // On retourne le total arrondi a 2 décimales.
    }

    function retirerProduitDuPanier($id_produit_a_supprimer){
        // On cherche la position du produit dans le panier:
        $position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']);  // array_search renvoie la position du produit(integer) sinon false si il n'y est pas.
        if($position_produit !== false){
            // Si le produit est bien dans le panier, on coupe sa ligne:
            array_splice($_SESSION['panier']['titre'], $position_produit, 1);  // Efface la portion du tableau à partir de l'indice indiqué par $position_produit et sur une ligne.
            array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
            array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
            array_splice($_SESSION['panier']['prix'], $position_produit, 1);
        }
    }


// Exercice: Créer une fonction qui retourne le nombre de produits differents dans le panier et afficher le résultat a coté du lien "panier" dans le menu de navigation, exemple: panier(3). Si le panier est vide, vous affichez (0).

    function nombre_achat(){
        if(isset($_SESSION['panier'])){
            // return count($_SESSION['panier']['quantite']);
            return array_sum($_SESSION['panier']['quantite']);  // array_sum additionne les valeurs situées à un indice.
        }else{
            return (0);
            echo 'toto';  // après un return les instructions ne sont pas executées.
        }
    }