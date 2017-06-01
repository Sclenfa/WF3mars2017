<?php

    class Societe{
        public $adresse;
        public $ville;
        public $cp;

        public function __construct(){}

        public function __set($nom, $valeur){  // S'execute au moment ou on essaie d'affecter une valeur a une propriété qui n'existe pas.
            echo '<p>Fail de '. $nom .' et de sa valeur '. $valeur .'</p>';
        }
        public function __get($nom){  // S'execute au moment ou on essaie d'affecter une valeur a une propriété qui n'existe pas.
            echo '<p>Fail de '. $nom .'</p>';
        }

        // __call() = Quand j'appelle une methode qui n'existe pas.
        // __callstatic = Quand j'appelle une methode static qui n'existe pas.
        // __isset() = Quand on fait une condition isset ou empty sur une propriété de mon objet.
        // __destruct() = S'execute quand le script est terminé (pratique pour fermé une connexion a la BDD).
        // __toString() = Se lance quand on essaie de faire un echo sur un objet.
        // __wakeup(), __sleep(), __invoke(), __clone()...
    }

// -----------------------------------------------------

    $societe = new Societe;
    $societe -> pays = "France";

    echo $societe -> titre;