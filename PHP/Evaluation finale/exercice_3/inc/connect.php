<?php

	/* Création de l'objet PDO */
	$dsn = 'mysql:host=localhost;dbname=exo3_movie;charset=utf8';
	$pdo = new PDO($dsn, 'root', '');

	/* Afficher les erreurs */
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);