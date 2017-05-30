<?php


namespace General;

require('espace1.php');
require('espace2.php');

use Espace1;
use Espace2;
use PDO;  // Lorsqu'on est dans un espace définie (General) et que l'on souhaite utiliser une classe existante dans l'espace global de PHP (ex: PDO ou MySQLi), alors on doit importer la classe avec l'instruction USE.

	// De maniere general, on doit toujours importer (use) les namesspaces dont on a besoin.

// use Espace1, Espace2;  // Fonctionne egalement

	$c = new Espace1\A; 
	echo $c -> test1(); 

	$d = new Espace2\A;
	echo $d -> test2();

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '');