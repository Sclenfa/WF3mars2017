<?php

	class Animal{

		protected function deplacement(){
			return 'je me déplace';
		}
		
		public function manger(){
			return 'Je mange';
		}
	}
// ---------------------------------------------------------------------

	class Elephant extends Animal{ // Extends signifie l'héritage

		// Tout le code de la classe Animal (parente) est disponible/importé ici ! 

		public function quiSuisJe(){
			return 'Je suis un éléphant et ' . $this -> deplacement() . ' !'; // Je peux appeler la méthode deplacement avec $this, car elle est héritée. (virtuellement présente dans la classe actuelle). Impossible avec une visiblilité private (accessible uniquement dans sa propre classe).
		}
	}
// ---------------------------------------------------------------------

	class Chat extends Animal{

		public function quiSuisJe(){
			return 'Je suis un chat et je m\'appelle Réglisse!';
		}

		public function manger(){ // Redéfinie la fonction uniquement pour la classe Chat! 
			return 'Je mange peu'; 
		}
	}
// ---------------------------------------------------------------------

	$eleph = new Elephant; 
	echo $eleph -> quiSuisJe() . '<br/>';
	echo $eleph -> manger() . '<br/><br>';

	$chat = new Chat; 
	echo $chat -> quiSuisJe() . '<br/>';
	echo $chat -> manger() . '<br/>';

/*
	Commentaires:

		L'héritage est l'un des fondements de la programmation objet.

		Lorqu'une classe hérite d'une autre classe, elle importe tout le code. Les éléments (non private) sont donc appelés avec $this (à l'interieur de la classe).

		Redéfinition : Une classe enfant (héritière) modifie ENTIEREMENT le comportement d'une méthode dont elle a hérité.

		Surcharge : Une classe enfant (heritiere) peut modifier en partie le comportement d'une methode heritée (voir chapitre 6, fichier surcharge.php)

		L'interprêteur va d'abord regarder si la méthode existe dans la classe qui l'exécute, puis dans la classe mère. 
*/



