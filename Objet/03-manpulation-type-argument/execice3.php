<?php

    class Vehicule{
        private $litreEssence;  // Nombre de litres d'essence dans le vehicule
        private $reservoir;  // Capacité max du reservoir

        public function getLitreEssence(){
            return $this -> litreEssence;
        }

        public function setLitreEssence($litre){
            $this -> litreEssence = $litre;
        }

        public function getReservoir(){
            return $this -> reservoir;
        }

        public function setReservoir($res){
            $this -> reservoir = $res;
        }
    }


// -----------------------------------------------------
    class Pompe{
        private $litreEssence;

        public function getLitreEssence(){
            return $this -> litreEssence;
        }

        public function setLitreEssence($litre){
            $this -> litreEssence = $litre;
        }

        public function plein(Vehicule $v){
            $essence = $v -> getReservoir() - $v -> getLitreEssence();  // 45 = 50 - 5
            $v -> setLitreEssence($v -> getLitreEssence() + $essence);  // Affecte 50 au vehicule
            $this -> setLitreEssence($this -> getLitreEssence() - $essence);
        }
    }


$vehicule = new Vehicule;

$vehicule -> setLitreEssence(5);
echo 'Nombre de litres d\'essence du vehicule : '. $vehicule -> getLitreEssence() .' L <br>';
$vehicule -> setReservoir(50);
echo 'Capacité maximum du reservoir : '. $vehicule -> getReservoir() .' L <br>';


$pompe = new Pompe;

$pompe -> setLitreEssence(800);
echo 'Nombre de litres d\'essence de la pompe : '. $pompe -> getLitreEssence() .' L <br>';

$pompe -> plein($vehicule);
echo '<br>';
echo 'Nombre de litres d\'essence du vehicule : '. $vehicule -> getLitreEssence() .' L <br>';
echo 'Nombre de litres d\'essence de la pompe : '. $pompe -> getLitreEssence() .' L <br>';



// -----------------------------------------------------
?>