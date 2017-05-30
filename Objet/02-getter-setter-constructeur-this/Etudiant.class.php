<?php

    class Etudiant{
        private $prenom;
        public function __construct($prenom){  // Methode magique qui s'execute au moment de l'instanciation.
            $this -> setPrenom($prenom);
        }
        public function setPrenom($prenom){
            $this -> prenom  = $prenom;
        }
        public function getPrenom(){
            return $this -> prenom;
        }
    }

// -----------------------------------------
$etudiant = new Etudiant('Dante');

echo 'Prénom : '. $etudiant -> getPrenom();

// Exercice : Essayez d'affecter une valeur à prenom en modifiant UNIQUEMENT l'interieur de la classe.

?>