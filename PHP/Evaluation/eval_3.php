<?php

	$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));  // Connexion a la BDD

$contenu = '';

$category = array('Comedie', 'Horreur', 'Porn', 'Autres');
$language = array('Francais', 'Anglais', 'Japonnais', 'Autres');

if(!empty($_POST)){

	if(strlen($_POST['title'])<=5){  // inferieur ou égal a 5
		$contenu .= '<p>Le titre doit contenir minimum 5 caractères<p>';
	}

	if(strlen($_POST['actors']) <= 5){  // inferieur ou égal a 5
		$contenu .= '<p>Le nom de l\'acteur / actrice doit contenir minimum 5 caractères<p>';
	}

    if(strlen($_POST['director']) <= 5){  // inferieur ou égal a 5
		$contenu .= '<p>Le nom du réalisateur doit contenir minimum 5 caractères<p>';
	}

	if(strlen($_POST['producer']) <= 5){  // inferieur ou égal a 5
		$contenu .= '<p>Le nom du producteur doit contenir minimum 5 caractères<p>';
	}

	if(!preg_match('#^[0-9]{4}$#', $_POST['year_of_prod'])){  // Verification que l'année comporte seulement 4 caractères, uniquement des chiffres entre 0 et 9
		$contenu .= '<p>Veuillez choisir une année de production<p>';
	}

    if($_POST['language'] != 'Francais' && $_POST['language'] != 'Anglais' && $_POST['language'] != 'Japonnais' && $_POST['language'] != 'Autres'){  // Si $_POST['language'] est different des indices de l'array
			$contenu .= '<p>Selectionnez une langue</p>';
    }

    if($_POST['category'] != 'Comedie' && $_POST['category'] != 'Horreur' && $_POST['category'] != 'Porn' && $_POST['category'] != 'Autres'){  // Si $_POST['category'] est different des indices de l'array
			$contenu .= '<p>Selectionnez une catégorie</p>';
	}

	if(strlen($_POST['storyline']) <= 5){  // inferieur ou égal a 5
		$contenu .= '<p>Le synopsis doit contenir minimum 5 caractères<p>';
	}

	if (!filter_var($_POST['video'], FILTER_VALIDATE_URL)){  // Verification si le lien est une URL valide
		$contenu .= '<p>L\'URL n\'est pas valide</p>';
	}

	if(empty($contenu)){

		foreach($_POST as $indice => $valeur){
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}

		$film = $pdo->prepare('INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES(:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)');
		$film->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
		$film->bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
		$film->bindParam(':director', $_POST['director'], PDO::PARAM_STR);
		$film->bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
		$film->bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_INT);
		$film->bindParam(':language', $_POST['language'], PDO::PARAM_STR);
		$film->bindParam(':category', $_POST['category'], PDO::PARAM_STR);
		$film->bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
		$film->bindParam(':video', $_POST['video'], PDO::PARAM_STR);

		$succes = $film->execute();

		if($succes){
			$contenu .= '<div>Le film a été enregistré avec succés</div>';
		}else{
			$contenu .= '<p>Erreur lors de l\'ajout de votre film</p>';
		}
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
		<style>
			input, select, textarea{
				display:block;
				margin-bottom: 10px;
			}
			p{
				color:red;
			}
		</style>
    </head>

    <body>
        <h1>Et si on regardait un film ?</h1>
        <h2>Ajout de film</h2>

        <form method="post" action="">

        <?php echo $contenu; ?>

            <label for="title">Titre du film</label>
            <input type="text" name="title" id="title">

            <label for="actors">Acteur / Actrice principal(e)</label>
            <input type="text" name="actors" id="actors">

            <label for="director">Réalisateur / Réalisatrice</label>
            <input type="text" name="director" id="director">

            <label for="producer">Producteur / Productrice</label>
            <input type="text" name="producer" id="producer">

            <select name="year_of_prod" id="year_of_prod">
                <option value="year_of_prod">- Année de production -</option>
				<?php for($i=date('Y'); $i>=date('Y')-100; $i--) {
					echo "<option value=$i>$i</option>";
				} ?>
            </select>

            <select name="language" id="language">
                <option value="language">- Langue -</option>
                <?php foreach($language as $indice => $valeur){
					echo '<option value="'. $valeur .'">'. $valeur .'</option>';
				} ?>
            </select>

            <select name="category" id="category">
                <option value="category">- Catégorie -</option>
                <?php foreach($category as $indice => $valeur){
					echo '<option value="'. $valeur .'">'. $valeur .'</option>';
				} ?>
            </select>

            <label for="storyline">Synopsis</label>
            <textarea id="storyline" name="storyline"></textarea>

            <label for="video">Lien vers la bande annonce du film</label>
            <input type="text" name="video" id="video">

            <input type="submit" name="validation" value="Valider">
        </form>
        
    </body>
</html>