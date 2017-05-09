<?php
/*
    1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

    2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

    3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

    4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/


$contenu = '';

    if(!empty($_POST)){
        if($_POST['location'] != 'A' && $_POST['location'] != 'B' && $_POST['location'] != 'C' && $_POST['location'] != 'D'){
			$contenu .= '<p>Selectionnez un véhicule valide</p>';
		}

        if (!ctype_digit($_POST['jours']) || $_POST['jours'] <= 0){
		$contenu .= '<div>Le nombre de jours de location n\'est pas valide</div>';
	    }

        function prixLoc($cars, $temps){
            switch($cars){
                case 'A': $prixCat = 30; break;
                case 'B': $prixCat = 50; break;
                case 'C': $prixCat = 70; break;
                case 'D': $prixCat = 90; break;
                default : return 'Categorie inexistante';
            }

            $resultat = $temps * $prixCat;

            if($resultat < 150){
                return $resultat;
            }else{
                $remise = 0.9 * $resultat;
                return '<p>Le prix de votre voiture categorie '. $_POST['location'] .' est de '. $remise .'€ pour '. $_POST['jours'] .' jours.</p>';
            }

        }

        if(empty($contenu)){

            foreach($_POST as $indice => $valeur){
                        $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
            }

            $contenu .= prixLoc($_POST['location'], $_POST['jours']);
        }


    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Location voiture</title>
    </head>
    <body>
        <main>
            <form method="post" action="">

                <select id="location" name="location">
                    <option value="location">- Choisissez un vehicule de location -</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>

                <label for="jours" id="jours">Nombre de jours de location :</label>
                <input type="text" name="jours" id="jours">

                <input type="submit" name="validation" value="Valider">

            </form>
            <?php echo $contenu; ?>

        </main>
    </body>
</html>