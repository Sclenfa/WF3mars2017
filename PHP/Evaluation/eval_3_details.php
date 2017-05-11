<?php

$contenu ='';

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));  // Connexion a la BDD

if(isset($_GET['id_film'])){

	$query = $pdo->prepare('SELECT * FROM movies WHERE id_film = :id_film');
	$query->bindParam(':id_film', $_GET['id_film'], PDO::PARAM_INT);
	$query->execute();  // Execution du pdo->prepare
	$films = $query->fetch(PDO::FETCH_ASSOC);  // Transformation en array associatif

	$contenu .= '<h1>Détails d\'un film</h1>';
	if (!empty($films)) {  // Si $films n'est pas vide
		$contenu .= '<p>Titre : '. $films['title'] .'</p>';
		$contenu .= '<p>Acteur / Actrice principal : '. $films['actors'] .'</p>';
		$contenu .= '<p>Réalisateur : '. $films['director'] .'</p>';
		$contenu .= '<p>Producteur : '. $films['producer'] .'</p>';
		$contenu .= '<p>Année de production : '. $films['year_of_prod'] .'</p>';
		$contenu .= '<p>Langue : '. $films['language'] .'</p>';
		$contenu .= '<p>Catégorie : '. $films['category'] .'</p>';
		$contenu .= '<p>Synopsis : '. $films['storyline'] .'</p>';
		$contenu .= '<p>Bande Annonce : <a href="'. $films['video'] .'">'. $films['video'] .'</a></p>';
        $contenu .= '<h2>Merci beaucoup pour les cours de PHP pas evident du tout à intégrer mais malgrès tout très interessant.</h2>';

	}else {
		$contenu .= '<p>Ce film n\'existe pas</p>';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <?php echo $contenu; ?>
    </body>
</html>