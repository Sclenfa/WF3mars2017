<?php


	function inclusion_automatique($arg){
		//require('A.class.php');
		require($arg . '.class.php');

		echo 'On passe dans l\'autoload<br/>';
		echo 'On fait un require ('. $arg .'.class.php) <br>';
	}

// -------------------------------------------------------------

	spl_autoload_register('inclusion_automatique');

// -------------------------------------------------------------

/*

	Commentaires : 

		spl_autoload_register :

			- C'est une fonction super pratique, qui va s'exécuter lorqu'elle voit passer un mot clé 'new'.

			- Elle va exécuter une fonction dont on lui fournit le nom en argument.

			- Elle va apporter à cette fonction le mot qui vient après le mot clé 'new' c'est a dire le nom de la classe a instancier.

*/