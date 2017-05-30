<?php

    class Membre{
        private $pseudo;
        private $mdp;

        public function setPseudo($pseudo){
            if(!empty($pseudo) && is_string($pseudo) && strlen($pseudo) >3 && strlen($pseudo) < 20 ){
                $this -> pseudo = $pseudo;
            }
        }

        public function getPseudo(){
            return  $this -> pseudo;
        }

        public function setMdp($mdp){
            if(!empty($mdp) && is_string($mdp) && strlen($mdp) >3 && strlen($mdp) < 20 ){
                $salt = "crypte" . time();
                $salt = md5($salt);
                // On enregistre le salt dans la BDD par membre
                $mdp_a_crypte = $salt . $mdp;
                $mdp_crypte = md5($mdp_a_crypte);
                $this -> mdp = $mdp_crypte;
            }
        }

        public function getMdp(){
            return  $this -> mdp;
        }
    }

$Membre = new Membre;

$Membre -> setPseudo('test');
echo 'Pseudo : '. $Membre -> getPseudo() .' <br>';
$Membre -> setMdp('test2');
echo 'Mot de passe : '. $Membre -> getMdp();
// ------------------------------------------
// Exercice : Au regard de cette classe, veuillez créer un membre, affecter des valeurs à pseudo et mdp et les afficher:

?>