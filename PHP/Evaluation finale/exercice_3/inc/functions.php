<?php

	/**
	 * Récupère en base de données l'ensemble des films, triés par titre
	 * @param  PDO $pdo Objet PDO, connexion à la base de données
	 * @return mixed Les films (tableau associatif)
	 */
	function getAllMovies($pdo) {
		$sql = 'SELECT movies.id, movies.title, genres.name AS genre_name FROM movies INNER JOIN genres ON movies.id_genre = genres.id ORDER BY movies.title';
		$stmt = $pdo->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function getMostViewed($pdo){
	    $req = 'SELECT title, release_date, nb_viewers FROM movies ORDER BY nb_viewers DESC';
	    $result = $pdo->query($req);
	    return $result->fetchAll(PDO::FETCH_ASSOC);
    }