<?php

namespace Repository;
use Manager\EntityRepository;  // Trés important car l'heritage ne permet pas de charger le fichier.
use PDO;

    class ProduitRepository extends EntityRepository{
        // Tout le code de EntityRepository est ici !!

        public function getAllProduits(){
            return $this -> findAll();
        }

        public function getProduitById($id){
            return $this -> find($id);
        }

        public function deleteProduitById($id){
            return $this -> delete($id);
        }

        public function registerProduit($infos){
            return $this -> register($infos);
        }

        public function getAllCategories(){
            $req = "SELECT DISTINCT categorie FROM produit";
            $result = $this -> getDb() -> query($req);

            $categories = $result -> fetchAll(PDO::FETCH_ASSOC);
            if(!$categories){
                return false;
            }else{
                return $categories;
            }
        }

        public function getAllProduitsByCategorie($categorie){
            $req = "SELECT * FROM produit WHERE categorie = :categorie";
            $result = $this -> getDb() -> prepare($req);
            $result -> bindParam(':categorie', $categorie, PDO::PARAM_STR);
            $result -> execute();

            $categories = $result -> fetchAll(PDO::FETCH_ASSOC);
            if(!$categories){
                return false;
            }else{
                return  $categories;
            }
        }

        public function getAllSuggestions($categorie, $id){
            $req = "SELECT id_produit, photo, titre FROM produit WHERE id_produit != $id AND categorie = '$categorie' ORDER BY RAND()";
            $result = $this -> getDb() ->  query($req);

            $cat = $result -> fetchAll(PDO::FETCH_ASSOC);
            if(!$cat){
                return false;
            }else{
                return $cat;
            }
        }
    }