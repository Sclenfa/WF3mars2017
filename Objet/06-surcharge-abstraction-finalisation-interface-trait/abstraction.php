<?php

	abstract class Joueur{
		public function seConnecter(){
			return $this -> etreMajeur();
		}

		abstract public function etreMajeur(); // /!\ une fonction abstraite n'a pas de contenu !!!
		abstract public function devise();
	}
// --------------------------------------------------------------------

	class JoueurFr extends Joueur{
		public function etreMajeur(){ // Je suis obligé de redéfinir la méthode, car elle est abstraite (abstract) dans le parent. Sinon il y a une erreur !
			return 18;
		}

		public function devise(){
			return '€';
		}
	}

// --------------------------------------------------------------------

	class JoueurUs extends Joueur{
		public function etreMajeur(){
			return 21;
		}

		public function devise(){
			return '$';
		}
	}

// ----------------------------------------------------------------------

//$joueur = new Joueur; // Une classe classe abstraite ne peut pas être instanciée.

$joueurFr = new JoueurFr;
echo $joueurFr -> seConnecter() . '<br/>';

$joueurUs = new JoueurUs;
echo $joueurUs -> seConnecter() . '<br/>';

/*

	Commentaires :

		- Une classe abstraite ne peut pas être instanciée.

		- Les méthodes abstraites n'ont pas de contenu.

		- Pour déclarer une méthode abstraite, il faut OBLIGATOIREMENT que la classe soit abstraite.

		- Lorsqu'on hérite d'une méthode abstraite, on doit OBLIGATOIREMENT la redéfinir.

		- Une classe abstraite peut contenir des méthodes "normales".

		Le développeur qui écrit la classe abstraite est au coeur de l'application. Il va obliger les autres dev' à redéfinir des méthodes. Ceci est bonne contrainte !!

*/

