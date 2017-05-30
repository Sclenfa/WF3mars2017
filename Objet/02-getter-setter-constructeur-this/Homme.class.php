<?php

    class Homme{
        private $prenom;  // Propriété private
        private  $nom;  // Propriété private

        public function setPrenom($arg){
            if(!empty($arg) && is_string($arg) && strlen($arg) >3 && strlen($arg) < 20 ){
                $this ->prenom = $arg;
            }
        }

        public function getPrenom(){
            return  $this -> prenom;
        }

        public function setNom($arg){
            if(!empty($arg) && is_string($arg) && strlen($arg) >3 && strlen($arg) < 20 ){
                $this -> nom = $arg;
            }
        }

        public function getNom(){
            return  $this -> nom;
        }
    }

// ------------------------------------
$homme = new Homme;
// $homme -> prenom = "Sephiroth";  // Erreur : Propriété private donc innaccessible à l'exterieur de la classe.
// echo $homme -> prenom;

$homme -> setPrenom('Cloud');
echo 'Prénom : '. $homme -> getPrenom().' <br>';

$homme -> setNom('Strife');
echo 'Nom : '. $homme -> getNom();

/*
    Commentaires :
        Pourquoi faire des getter et des setter ?
            - Le PHP est un langage qui ne type pas ses variables. Il faut systematiquement controler l'integriter des données renseignées.
            - Donc utiliser la visibilité PRIVATE est une très bonne contrainte. Tout dev' devra OBLIGATOIREMENT passer par le setter pour affecter une valeur et donc par les controles !

        Setter : Affecter une valeur
        Getter : Recuperer une valeur
        On aura autant de getter et setter que de propriété private.

        $this represente à l'interieur de la classe l'objet en cours de manipulation.
*/


?>