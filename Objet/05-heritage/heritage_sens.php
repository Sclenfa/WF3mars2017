<?php

//Transitivité : Si B hérite de A et que C hérite de B, alors C hérite de A.

	class A{
		public function test(){
			return 'test';
		}

		protected function test4(){
			return ' + test4'; 
		}
	}

	class B extends A{
		public function test2(){
			return 'test2';
		}
	}

	class C extends B{
		public	function test3(){
			return 'test3' . $this -> test4();
		}
	}

// ----------------------------------------------------------------------

	$c = new C;
	echo $c -> test()  . '<br/>'; 	// Méthode de A accessible par C (héritage)
	echo $c -> test2() . '<br/>';   // Méthode de B accessible par C (héritage)
	echo $c -> test3() . '<br/>'; 	// Méthode de C accessible par C + A (protected)

	var_dump(get_class_methods($c)); // Affiche les méthodes test, test2 et test 3 qui sont publiques. Elles appartiennent donc bien à C. 

/*

	Commentaires :

		Transitivité :

			Si B hérite de A
				Et si C hérite de B
					Alors... C hérite de A (indirectement)
			Les méthodes protected de A sont accessibles dans C (pourtant l'héritage est indirect).

		L'héritage est :

			- Non reflexif : Class D extends D : Une classe ne peut hériter d'elle-même.
			- Non symétrique : Ce n'est parce que Class E extends F, que F extends E automatiquement.
			- Sans cycle : Si X extends F, il est impossible que F extends X.
			- pas multiple : Class N extends M, P : En PHP ce n'est pas possible. Pas d'héritage multiple en PHP.

		Une classe peut avoir un nombre infini d'héritiers.

*/



