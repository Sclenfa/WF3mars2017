<?php

// 01-class-objet-instance-visibilite
    
    class Panier{
        public $nbProduit;  // Propriété (variable)
        public function ajouterProduit(){
            // Traitement de la methode
            return 'L\'article a bien été ajouter au panier !';
        }
        protected function retirerProduit(){
            return 'L\'article a été retirer du panier !';
        }
        private function affichagePanier(){
            return 'Voici les produits dans le panier !';
        }
    }

// ----------------------------------------
$panier = new Panier;  // Instanciation. $panier represente un objet de la classe Panier.
var_dump(get_class_methods($panier));

$panier -> nbProduit = 5;

echo 'Nombre de produit : ' . $panier -> nbProduit .' <br>';

echo '<pre>';
var_dump($panier);
echo '</pre>';

echo 'Panier : '. $panier -> ajouterProduit() .' <br>';
// echo 'Panier : '. $panier -> retirerProduit() .' <br>'; // Erreur : impossible d'acceder a un element protected a l'exterieur de la class.
// echo 'Panier : '. $panier -> affichagePanier() .' <br>';  // Erreur : impossible d'acceder a un element private à l'exterieur de la class.

$panier2 = new Panier;
echo '<pre>';
var_dump($panier2);
echo '</pre>';


/*
    Commentaires :
        New : Est un mot clé qui permet de créer un objet issu d'une classe (instanciation)

        On peut créer plusieurs objets d'une meme classe et lorsqu'on affecte une valeur a une propriété d'un objet cela n'a pas d'incidence sur les autres objets de la classe.

        Niveau de visibilité :
            -public  : Accessible partout
            -private  : Accessible uniquement depuis la class ou l'element a été déclarer.
            -protected : Accessible depuis la classe ou l'element a été déclarer ainsi que depuis les classes heritiere.
*/
?>
