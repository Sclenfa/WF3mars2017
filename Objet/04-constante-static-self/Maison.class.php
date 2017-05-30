<?php

    class Maison{
        public $couleur = 'blanc';
        public static $espaceTerrain = '500m²';
        private $nbPorte = 10;
        private static $nbPiece = 7;
        const HAUTEUR = '10m';

        public function getNbPorte(){
            return $this -> nbPorte;
        }
        public static function getNbPiece(){
            return self::$nbPiece;
        }
    }

// --------------------------------------------------------

$maison = new Maison;
echo $maison -> couleur .'<br>';  // Je fait appel a un element de l'objet par l'objet.

// echo $maison -> espaceTerrain;  // Erreur : Je tente d'appeler un element appartenant à la classe par l'objet.

echo 'Terrain : ' . Maison::$espaceTerrain. '<br>';  // OK je fait appel a un element appartenant à la classe depuis la classe.

// echo 'Porte : ' .$maison -> nbPorte .' <br>';  // Erreur : Je tente d'appeler une propriété private en dehors de la classe.

echo 'Portes : '. $maison -> getNbPorte() .'<br>';  // Je fait appel a une propriété private via son getteur qui lui est public et donc accessible a l'exterieur de la classe.

echo 'Pieces : ' . Maison::getNbPiece() . '<br>';

echo 'Hauteur : ' . Maison::HAUTEUR . '<br>';  // Je fait appel a une propriété constante appartenant a la classe.


/*
    Commentaires :
        Opérateur :
            - $objet ->     : Element d'un objet à l'exterieur de la classe.
            - $this ->     : Element appartenant a un objet a l'interieur de la classe.
            - Class::     : Element d'une classe à l'exterieur de la classe.
            - self::     : Element d'une classe à l'interieur de la classe.

        2 Questions à se poser:
            -Est ce que l'element est static?
                -Si oui :
                    Suis-je a l'interieur de la classe?
                        -Si oui: self::
                        -Si non: Class::

                -Si non :
                    Suis-je a l'interieur de la classe?
                        -Si oui: $this::
                        -Si non: $objet::

        static, signifie qu'un element appartient à la classe. Pour y acceder il faut l'appeler par la classe (Class:: ou self::)

        const signifie qu'un element appartient à la classe et ne sera jamais modifiable.
*/

?>