<?php

	final class Application{  // final indique que la classe ne pourra être heritee

		public function run(){
			return 'L\'application se lance';
		}
	}
// ---------------------------------------------------------------------

//class Extension extends Application{} // Erreur : On ne peut pas hériter d'une class final.

// ---------------------------------------------------------------------

	$app = new Application;
	$app -> run();
// ---------------------------------------------------------------------

	class Application2{
		final public function run2(){
			return 'L\'application se lance';
		}
	}

	class Extension extends Application2{
		//public function run2(){} // Erreur ! On ne peut pas redéfinir (surcharger) une méthode final
	}

/*

	Commentaires :

		- Une class final ne pas être héritée.

		- Une class final aura forcément des méthodes final... puisque par définition elle ne sera pas héritée ;)

		- Une class final peut être instanciée.

		- Une méthode final peut être présente dans une class normale.

		- Une méthode final ne peut pas être surchargée ou redéfinie.

*/



