<?php

$contenu = '';

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));  // Connexion a la BDD

$query = $pdo->prepare('SELECT id_film, title, director, year_of_prod FROM movies');
$query->execute();
$contenu .= '<h1>Liste des films</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Titre</th>
						<th>Producteur</th>
						<th>Année de production</th>
						<th>Autres infos</th>
					</tr>';

while ($films = $query->fetch(PDO::FETCH_ASSOC)){  // Transformation en array associatif
		$contenu .= '<tr>
						<td>'. $films['title'] .'</td>
						<td>'. $films['director'] .'</td>
						<td>'. $films['year_of_prod'] .'</td>
						<td>
							<a href="eval_3_details.php?id_film='. $films['id_film'] .'">Plus d\'infos</a>
						</td>
					</tr>';

$contenu .= '</table>';
}



?>


<!DOCTYPE html>
<html lang="fr">
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