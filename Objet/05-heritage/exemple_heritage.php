<?php

	class Membre{
		public $id_membre;
		public $pseudo;
		public $email;

		public function inscription(){
			return 'Je m\'inscris !';
		}

		public function connexion(){
			return 'je me connecte';
		}
	}
// -----------------------------------------------------------------

	class Admin extends Membre{
		// Tout le code de membre est ici!!

		public function accesBackOffice(){
			return 'J\'ai accès au BackOffice !';
		}
	}
// -----------------------------------------------------------------

	$admin = new Admin;
	echo $admin -> inscription() . '<br/>';
	echo $admin -> connexion() . '<br/>';
	echo $admin -> accesBackOffice() . '<br/>';

/* 
	Commentaires :

		Dans notre site, un Admin est un membre avec une fonctionnalité supplémentaire : Acces au back office !

		Il est donc naturel que la classe Admin extends (herite de) la classe Membre, et qu'on ne ré-écrive pas tout le code deux fois.
*/



