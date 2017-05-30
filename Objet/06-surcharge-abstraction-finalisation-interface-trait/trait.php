<?php

// Attention, les traits ne fonctionnent que depuis PHP 5.4

	trait TPanier{
		public $nbProduit = 1;
		
		public function affichageProduits(){
			return 'Affichage des produits'. '<br>';
		}
	}

// --------------------------------------------------------------

	trait TMembre{
		public function affichageMembres(){
			return 'Affichage des membres !';
		}
	}

// --------------------------------------------------------------

	class Site{
		use TPanier, TMembre; 
		// On importe tout le code contenu dans le trait TPanier et TMembre.
	}
// ---------------------------------------------------------------

	$s = new Site;
	echo $s -> affichageProduits();
	echo $s -> affichageMembres();

/*

	Commentaires :

		- Les traits ont été inventés pour repousser l'héritage (non multiple).

		- Une classe peut hérité d'une seule classe, mais elle peut importer plusieurs traits.

		- Un trait peut importer un trait.

*/








