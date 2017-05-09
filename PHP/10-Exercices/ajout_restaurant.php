<?php

/* 1- Créer une base de données "restaurants" avec une table "restaurant" :
	    id_restaurant PK AI INT(3)
	    nom VARCHAR(100)
	    adresse VARCHAR(255)
	    telephone VARCHAR(10)
	    type ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre')
	    note INT(1)
	    avis TEXT

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un restaurant dans la bdd. Les champs type et note sont des menus déroulants que vous créez avec des boucles.
	
	3- Effectuer les vérifications nécessaires :
	    Le champ nom contient 2 caractères minimum
	    Le champ adresse ne doit pas être vide
	    Le téléphone doit contenir 10 chiffres
	    Le type doit être conforme à la liste des types de la bdd
	    La note est un nombre entre 0 et 5
	    L'avis ne doit être vide
	    En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter le restaurant à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/

	$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$contenu = '';
$type = array('gastronomie', 'brasserie', 'pizzeria', 'autre');

if(!empty($_POST)){

	if(strlen($_POST['nom'])<=2){
		$contenu .= '<p>Le nom doit contenir minimum 2 caractères<p>';
	}

	if(strlen($_POST['adresse']) <= 0){
		$contenu .= '<p>Le champ adresse ne doit pas etre vide<p>';
	}

	if(!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
		$contenu .= '<p>Le numero de téléphone n\'est pas valide<p>';
	}

    if($_POST['type'] != 'gastronomie' && $_POST['type'] != 'brasserie' && $_POST['type'] != 'pizzeria' && $_POST['type'] != 'autres'){
			$contenu .= '<p>Selectionnez un restaurant</p>';
	}

	if(!preg_match('#^[0-5]{1}$#', $_POST['note'])){
		$contenu .= '<p>Veuillez noter le restaurant<p>';
	}

	if(strlen($_POST['avis']) <= 0){
		$contenu .= '<p>Le champ avis ne doit pas etre vide<p>';
	}

	if(empty($contenu)){

		foreach($_POST as $indice => $valeur){
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}

		$resto = $pdo->prepare("INSERT INTO restaurant (nom, adresse, telephone, type, note, avis) VALUES (:nom, :adresse, :telephone, :type, :note, :avis)");

			$resto->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
			$resto->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
			$resto->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
			$resto->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
			$resto->bindParam(':note', $_POST['note'], PDO::PARAM_INT);
			$resto->bindParam(':avis', $_POST['avis'], PDO::PARAM_STR);

		$result = $resto->execute();

		if(!$result){
			$contenu .= '<p>Erreur sur l\'ajout du restaurant</p>';
		}else{
			$contenu .= '<p>Le restaurant a bien été ajouter</p>';
		}
	}
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Restaurant</title>
	</head>
	<body>

		<?php echo $contenu; ?>

		<form method="post" action="">

			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom"><br><br>

			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" id="adresse"><br><br>

			<label for="telephone">Telephone</label>
			<input type="text" name="telephone" id="telephone"><br><br>

			<label for="type">Type</label>
			<select id="type" name="type">
				<option value="">- Type de restaurant -</option>
				<?php foreach($type as $indice => $valeur){
					echo '<option value="'. $valeur .'">'. $valeur .'</option>';
				} ?>
			</select><br><br>

			<label for="note">Note</label>
			<select id="note" name="note">
				<option value="">Entre 0 et 5</option>
				<?php for($i = 0; $i <= 5; $i++){
					echo '<option value="'. $i .'">'. $i .'</option>';
				} ?>
			</select><br><br>

			<label for="avis">Avis</label>
			<textarea id="avis" name="avis"></textarea><br><br>

			<input type="submit" name="validation" value="Valider">
		</form>


	</body>
</html>
