<?php

    // Design Pattern: Litteralement "Patron de conception", Est une réponse donné a un probleme que rencontre la plupart des developpeurs.

    // Le singleton est la réponse a la question : Comment créer une classe qui ne sera instanciable qu'une seule et unique fois.

    class Singleton{
        private static $instance = NULL;
        private function __construct(){}  // Fonction private donc notre classe n'est plus instanciable.
        private function __clone(){}  // Fonction private donc la classe n'est pas clonable.

        public static function getInstance(){
            if(is_null(self::$instance)){
                self::$instance = new Singleton;  // Je met danns la propriété $instance un objet de la classe self/Singleton.
            }
            return self::$instance;
        }
    }

    // $singleton = new  Singleton; // IMPOSSIBLE d'instancier notre classe.
    $objet = Singleton::getInstance();  // $objet est le seul et unique objet de cette classe Singleton !!!
    $objet2 = Singleton::getInstance();

    echo '<pre>';
    var_dump($objet);
    var_dump($objet2);
    echo '</pre>';

// Le singleton est notamment utilisé pour la connexiion a la BDD! C'est plus sùr!

?>