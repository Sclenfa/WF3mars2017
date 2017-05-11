<?php
/*
    1- Afficher dans une table HTML la liste des restaurants avec les champs nom et telephone et un champs supplementaire "autre infos" avec un lien qui permet d'afficher le detail de chaque contact.
    
    2- Afficher sous la table HTML le detail d'un contact quand on clique sur le lien "autres info".

*/

$contenu = '';

$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$query = $pdo->prepare('SELECT id_restaurant, nom, telephone FROM restaurant');
$query->execute();
$contenu .= '<h1>Liste des restaurants</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Nom</th>
						<th>Téléphone</th>
						<th>Autres infos</th>
					</tr>';

while ($restos = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $restos['nom'] .'</td>
						<td>'. $restos['telephone'] .'</td>
						<td>
							<a href="?id_restaurant='. $restos['id_restaurant'] .'">Plus d\'infos</a>
						</td>
					</tr>';

$contenu .= '</table>';
}

if(isset($_GET['id_restaurant'])){

	$query = $pdo->prepare('SELECT * FROM restaurant WHERE id_restaurant = :id_restaurant');
	$query->bindParam(':id_restaurant', $_GET['id_restaurant'], PDO::PARAM_INT);
	$query->execute();
	$resto = $query->fetch(PDO::FETCH_ASSOC);

	$contenu .= '<h1>Détails d\'un restaurant</h1>';
	if (!empty($resto)) {
		$contenu .= '<p>Nom : '. $resto['nom'] .'</p>';
		$contenu .= '<p>Adresse : '. $resto['adresse'] .'</p>';
		$contenu .= '<p>Téléphone : '. $resto['telephone'] .'</p>';
		$contenu .= '<p>Type de restaurant : '. $resto['type'] .'</p>';
		$contenu .= '<p>Note du restaurant : '. $resto['note'] .'</p>';
		$contenu .= '<p>Avis : '. $resto['avis'] .'</p>';


	}else {
		$contenu .= '<div>Ce restaurant n\'existe pas</div>';
	}

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