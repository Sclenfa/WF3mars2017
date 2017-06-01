<?php

    class Config{
        protected $parameters;

        public function __construct(){
            require __DIR__ . '/Config/parameters.php';
            $this -> parameters = $parameters;
            // A l'instanciation de Config, on recupere les parametres déclarés dans parameters.php et on les stock dans notre propriété $parameters.
        }
        public function getParametersConnect(){
            return  $this -> parameters['connect'];
            // Cette methode va retourner seulement la partie 'connect' de mes parametres
        }
    }

// -----------------------------------------------------
// $config =  new Config;