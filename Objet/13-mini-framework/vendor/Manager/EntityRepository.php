<?php

    namespace Manager;

    use PDO;

    class EntityRepository{
        private $db;  //Contiendra la connexion a la BDD (objet PDO, récuperer grace à PDOManager)
        public function getDb(){
            $this -> db = PDOManager::getInstance() -> getPdo();
            return $this -> db;
        }
        public function getTableName(){
            // Objectif : Récuperer le nom de la table à interroger selon l'entité dans laquelle je suis...
            
            // get_called_class() : Retourne le nom de la classe dans laquelle je suis. Exemple (Repository\ProduitRepository).
            return strtolower(str_replace(array('Repository\\', 'Repository'), '', get_called_class()));
            // return 'produit';
        }

    // REQUETES GENERIQUES !!

        public function findAll(){
            $req = "SELECT * FROM " . $this -> getTableName();
            $result = $this -> getDb() -> query($req);

            $donnees = $result -> fetchAll(PDO::FETCH_ASSOC);

            if(!$donnees){
                return false;
            }else{
                return $donnees;
            }
        }

        public function find($id){
            $req = "SELECT * FROM " . $this -> getTableName(). " WHERE id_" . $this -> getTableName() . "= :id";

            $result = $this -> getDb() -> prepare($req);
            $result -> bindParam(':id', $id, PDO::PARAM_INT);
            $result -> execute();

            $donnee = $result -> fetch(PDO::FETCH_ASSOC);

            if(!$donnee){
                return false;
            }else{
                return $donnee;
            }
        }

        public function delete($id){
            $req = "DELETE FROM " . $this -> getTableName() . " WHERE id_" . $this -> getTableName(). "= :id";

            $result = $this -> getDb() -> prepare($req);
            $result -> bindParam(':id', $id, PDO::PARAM_INT);
            $result -> execute();

            return $result;
        }

        public function register($infos){
            $req = 'INSERT INTO ' . $this -> getTableName() . ' (' . implode(', ', array_keys($infos)) . ') VALUES (' . ":" . implode(", :", array_keys($infos)) . ')';


            $result = $this -> getDb() -> prepare($req);
            $result ->  execute($infos);

            if(!$result){
                return false;
            }else{
                return $this -> getDb() -> lastInsertId();
            }
        }
    }