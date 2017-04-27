

<?php

//**********************************
// Exercice
//**********************************
    // Créer un formulaire qui permet d'enregistré un nouvel employé dans la base entreprise.
        // Les étapes:
            // Création du formulaire HTML
            // Connexion à la BDD
            // Lorsque le formulaire est posté, insertion des informations du formulaire en BDD. Faites le avec une requete préparé.
            // Affichez à la fin un message "L'employer a bien été ajouter".

    $message='';
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    if(!empty($_POST)){  // Si le formulaire est posté, il y a donc des indices dans $_POST, il n'est donc pas vide.

    // Controle du formulaire:
        if(strlen($_POST['prenom'])< 3 || strlen($_POST['prenom']) > 20) $message .= '<br>Le prenom doit comporter au moins 3 caractères <br>';  // strlen indique le nombre de caractères

        if(strlen($_POST['nom'])< 3 || strlen($_POST['nom']) > 20) $message .= '<br>Le nom doit comporter au moins 3 caractères <br>';

        if($_POST['gender'] != 'm' && $_POST['gender'] != 'f') $message .= '<br>Le sexe n\'est pas correct <br>';

        if(strlen($_POST['service'])< 3 || strlen($_POST['service']) > 20) $message .= '<br>Le service doit comporter au moins 3 caractères <br>';

        $tab_date = explode ('-', $_POST['date_embauche']);  // Met le jour, le mois et l'année dans un array pour pouvoir les passer à la fonction checkdate($mois, $jour, $annee).

        if(!(isset($tab_date[0]) && isset($tab_date[1]) && isset($tab_date[2]) && checkdate($tab_date[1], $tab_date[2], $tab_date[0]))) $message .= '<br>La date n\'est pas valide <br>';   // checkdate ($mois, $jour, $annee).

        if(!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) $message .= '<br> Le salaire doit etre superieur à 0 <br>';    // is_numeric() teste si c'est un nombre.

        if(empty($message)){    // Si les messages sont vides, c'est qu'il n'y a pas d'erreur.
            $result=$pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)");

            $result->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
            $result->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $result->bindParam(':sexe', $_POST['gender'], PDO::PARAM_STR);
            $result->bindParam(':service', $_POST['service'], PDO::PARAM_STR);
            $result->bindParam(':date_embauche', $_POST['date_embauche'], PDO::PARAM_STR);
            $result->bindParam(':salaire', $_POST['salaire'], PDO::PARAM_INT);

            $req = $result->execute();

            if($req){   // Execute() ci-dessus renvoie soit TRUE en cas de succes de la requete sinon FALSE.
                echo 'L\'employer a bien été ajouté';
            }else{
                echo 'Une erreur est survenue lors de l\'enregistrement';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Exerice</title>
    </head>
    <body>

        <main>
        <?php echo $message; ?>
            <form method="post" action="">

                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom">
                <br>
                <br>

                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom">
                <br>
                <br>

                <label for="sexe">Sexe</label>
                <input type="radio" name="gender" id="homme" value="m"checked><label for="homme">Homme</label>
                <input type="radio" name="gender" id="femme" value="f"><label for="femme">Femme</label>
                <br>
                <br>

                <label for="service">Service</label>
                <input type="text" name="service" id="service">
                <br>
                <br>

                <label for="date_embauche">Date d'embauche</label>
                <input type="text" name="date_embauche" id="date_embauche" placeholder="AAAA-MM-JJ">
                <br>
                <br>

                <label for="salaire">Salaire</label>
                <input type="text" name="salaire" id="salaire">
                <br>
                <br>

                <input type="submit" name="validation" value="Valider">

            </form>
        </main>
        
    </body>
</html>


