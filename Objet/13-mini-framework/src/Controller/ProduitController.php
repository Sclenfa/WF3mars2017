<?php

    namespace Controller;
    use Controller\Controller;

    class ProduitController extends Controller{
        public function afficheAll(){
            $produits = $this -> getRepository() ->  getAllProduits();
            $categories  = $this -> getRepository() -> getAllCategories();

            $params = array('produits' => $produits, 'categories' => $categories, 'title' => 'Boutique de mon site');

            return $this -> render('layout.html', 'boutique.html', $params);
            // require(__DIR__ . '/../View/Produit/Boutique.php');
        }

        public function affiche($id){
            $produit = $this -> getRepository() -> getProduitById($id);
            $suggestion = $this -> getRepository() -> getAllSuggestions($produit['categorie'], $produit['id_produit']);

            $params = array('produit' => $produit, 'suggestion' => $suggestion);

            return $this -> render('layout.html', 'fiche_produit.html', $params);
            // require(__DIR__ . '/../View/Produit/fiche_produit.php');
        }

        public function categorie($categorie){
            $produits = $this -> getRepository() -> getAllProduitsByCategorie($categorie);
            $categories  = $this -> getRepository() -> getAllCategories();

            $params = array('produit' => $produit, 'categories' => $categories);

            return $this -> render('layout.html', 'categorie.html', $params);
            // require(__DIR__ . '/../View/Produit/categorie.php');
        }
    }