<?php

	class A {
		public function direBonjour(){
			return 'Bonjour !'; 
		}
	}

	class B extends C { //La classe B n'hérite pas de la classe A. 

		public $maVariable; // Objet de la classe A

		public function __construct(){
			$this -> maVariable = new A;
			// Au moment de l'instanciation de B, on met dans $maVariable un objet de la classe A.
		}
	}

	class C {

	}
// -------------------------------------------------------------------------

	$b = new B; // Instance de B. Donc la fonction construct() est lancée... donc dans $mavariable j'ai un objet de la classe A.

    echo $b -> maVariable -> direBonjour();

	// Ca revient à faire :
	// $maVariable = new A;
	// $maVariable -> direBonjour();
	// $b -> maVariable -> direBonjour();
	// ($a) -> direBonjour()

/*

	Commentaires :

		Nous avons un objet dans un objet.

		L'intérèt d'avoir une instance sans héritage (récupérer un objet dans la propriété d'une classe) est de pouvoir hériter d'une classe mère d'un coté tout en ayant la possibilité de récupérer les éléments d'une autre classe en même temps.

*/

