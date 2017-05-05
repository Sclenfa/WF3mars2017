<?php


	$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


	function executeRequete($req, $param = array()){
            if(!empty($param)){

                    foreach($param as $indice => $valeur){
                        $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
                    }
            }

            global $pdo;
            $r=$pdo->prepare($req);
            $succes = $r->execute($param);

            if(!$succes){
                die('Erreur sur la requete SQL: ' .$r->errorInfo()[2]);
            }
            return $r;

    }

$contenu = '';

	if(!empty($_POST)){

		if(strlen($_POST['nom'])<2 || strlen($_POST['nom'])>20){
					$contenu .= '<p>Le nom doit contenir entre 2 et 20 caractères<p>';
		}

		if(strlen($_POST['prenom'])<2 || strlen($_POST['prenom'])>20){
					$contenu .= '<p>Le prénom doit contenir entre 2 et 20 caractères<p>';
		}

		if(!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){  // preg_match retourne true si le string en deuxième argument correspond à l'expression réguliere
					$contenu .= '<p>Le numero de téléphone n\'est pas valide<p>';
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
					$contenu .= '<p>L\'email est invalide<p>';
		}

		// if (!in_array($_POST['type_contact'], $type_contact)){
		// 	$contenu .= '<div>Le type de contact n\'est pas valide</div>';
		// }

		if($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'autre'){
			$contenu .= '<p>Selectionnez un type de contact valide</p>';
		}


		if(empty($contenu)){
			$contact = executeRequete("SELECT id_contact, nom, prenom FROM contact WHERE nom = :nom AND prenom = :prenom", array(':nom' => $_POST['nom'], ':prenom' => $_POST['prenom']));
			if($contact->rowCount() > 0){
				$contenu .= '<p>Contact déjà existant<p>';
			}else{
				executeRequete("INSERT INTO contact (nom, prenom, email, telephone, annee_rencontre, type_contact) VALUES (:nom, :prenom, :email, :telephone, :annee_rencontre, :type_contact)", array(':nom' => $_POST['nom'], ':prenom' => $_POST['prenom'], ':email' => $_POST['email'], ':telephone' => $_POST['telephone'], ':annee_rencontre' => $_POST['annee_rencontre'], ':type_contact' => $_POST['type_contact']));

				$contenu .= '<p>Votre contact a bien été enregistrer</p>';
			}
		}
	}


		$annee = date("Y");
		$date = 2017;
				while ($annee >= date("Y")- 100){
				$date .= '<option value="'. $annee .'">'. $annee .'</option>';
				$annee--;
				}




/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone INT(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Formulaire d'ajout de contact</title>
	</head>
	<body>
		<main>
			<?php echo $contenu; ?>
			<form method="post" action="">
				
				<label for="nom">Nom</label>
				<input type="text" name="nom" id="nom">

				<label for="prenom">Prénom</label>
				<input type="text" name="prenom" id="prenom">

				<label for="telephone">Téléphone</label>
				<input type="text" name="telephone" id="telephone">

				<label for="annee_rencontre">Année</label>
				<select id="annee_rencontre" name="annee_rencontre">
					<?php echo  $date; ?>
				</select>

				<label for="type_contact">Contact</label>
				<select id="type_contact" name="type_contact">
					<option value="ami">Amis</option>
					<option value="famille">Famille</option>
					<option value="Professionnel">Professionnel</option>
					<option value="autre">Autre</option>
				</select>

				<input type="email" name="email" id="email" placeholder="Votre email">

				<input type="submit" name="submit" value="Ajoutez votre contact">

			</form>
		</main>
	</body>
</html>

