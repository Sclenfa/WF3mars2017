<?php

	interface Mouvement{
		public function start(); // Dans une interface les méthodes n'ont pas de contenu.
		public function turnLeft();
		public function turnRight();
	}

// ----------------------------------------------------------

	class Bateau implements Mouvement{  // On utilise pas extends, mais implements.
		public function start(){}  // Obligation de redéfinir la méthode récupéré via l'implementation de l'interface.
		public function turnLeft(){}
		public function turnRight(){}
	}

// ----------------------------------------------------------

class Avion implements Mouvement{
	public function start(){}
	public function turnLeft(){}
	public function turnRight(){}
}

// ----------------------------------------------------------

//$mouvement = new Mouvement; // Erreur une interface ne s'instancie pas !

// ----------------------------------------------------------

/*

	Commentaires :

		- Une interface est une liste de méthodes (sans contenu) qui permet de garantir que toutes les classes qui implements l'interface contiendront les méthodes de l'interface avec les mémes noms. C'est une sorte de contrat passé entre le développeur maître et les autres développeurs. 

		- Une interface n'est pas instanciable

		- Il est possible d'implémenter plusieurs interfaces.

		- une classe peut hériter d'une autre et en même temps implémenter une interface.

		- les méthodes d'une interface sont forcément public sinon elles ne pourraient pas être redéfinies.

*/











