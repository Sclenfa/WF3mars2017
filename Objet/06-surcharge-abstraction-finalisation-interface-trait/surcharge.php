<?php

// Surcharge ou Override : permet de modifier le comportement d'une méthode héritée et d'y apporter des traitements supplémentaires

// surcharge != redéfinition

	class A{
		public function calcul(){
			return 10;
		}
	}

	class B extends A{
		public function calcul(){
			// return 15, soit 10 + 5
			return parent::calcul() + 5;

			// $this -> calcul() ne fonctionnerait pas car ferait quelque chose de récursif (s'appelle soit-même).

			// self:: ne fonctionnerait pas car il s'agit pas de quelque chose de static.

			// La solution c'est parent:: J'appelle le traitement de la fonction telle que définie dans la classe parente.
		}
	}




