<?php

namespace Entity;

    class Membre{
        private $id_membre;
        private $pseudo;
        private $mdp;
        private $nom;
        private $prenom;
        private $email;
        private $civilite;
        private $ville;
        private $code_postal;
        private $adresse;
        private $statut;

    // Getter :

        public function getId_membre(){
            return  $this ->  id_membre;
        }

        public function getPseudo(){
            return $this -> pseudo;
        }

        public function getMdp(){
            return $this -> mdp;
        }

        public function getNom(){
            return  $this -> nom;
        }

        public function getPrenom(){
            return $this -> prenom;
        }

        public function getEmail(){
            return $this -> email;
        }

        public function getCivilite(){
            return $this -> civilite;
        }

        public function getVille(){
            return $this -> ville;
        }

        public function getCode_postal(){
            return $this -> code_postal;
        }

        public function getAdresse(){
            return $this -> adresse;
        }

        public function getStatut(){
            return $this -> statut;
        }

    // Setter :

        public function setId_membre($id){
            return  $this ->  id_membre = $id;
        }

        public function setPseudo($pseudo){
            return $this -> pseudo = $pseudo;
        }

        public function setMdp($mdp){
            return $this -> mdp = $mdp;
        }

        public function setNom($nom){
            return  $this -> nom = $nom;
        }

        public function setPrenom($prenom){
            return $this -> prenom = $prenom;
        }

        public function setEmail($email){
            return $this -> email = $email;
        }

        public function setCivilite($civ){
            return $this -> civilite = $civ;
        }

        public function setVille($ville){
            return $this -> ville = $ville;
        }

        public function setCode_postal($cp){
            return $this -> code_postal = $cp;
        }

        public function setAdresse($adresse){
            return $this -> adresse = $adresse;
        }

        public function setStatut($statut){
            return $this -> statut = $statut;
        }
    }