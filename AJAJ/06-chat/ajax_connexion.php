<?php

require_once("inc/init.inc.php");

$tab = array();
$tab['resultat'] = "";
$tab['pseudo'] = 'disponible';
$time = time();  // On recupere le timestamp


$erreur = false;  // Variable de contre de fin de script. Si sa valeur est passée à true alors il y a eu une erreur (exemple le pseudo indisponible).

// action = condition ? condition vrai(if) : condition fausse(else)
$mode = isset($_POST['mode']) ? addslashes($_POST['mode']) : '';
$pseudo = isset($_POST['pseudo']) ? addslashes($_POST['pseudo']) : '';
$civilite = isset($_POST['civilite']) ? addslashes($_POST['civilite']) : '';
$ville = isset($_POST['ville']) ? addslashes($_POST['ville']) : '';
$date_de_naissance = isset($_POST['date_de_naissance']) ? addslashes($_POST['date_de_naissance']) : '';

if($mode == "connexion"){
    $resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
    $membre = $resultat->fetch(PDO::FETCH_ASSOC);
    if($resultat->rowCount() == 0){  // Si il n'y a pas de ligne alors le pseudo est libre car inexistant

        $pdo->query("INSERT INTO membre (pseudo, civilite, ville, date_de_naissance, ip, date_connexion) VALUES ('$pseudo', '$civilite', '$ville', '$date_de_naissance', '$_SERVER[REMOTE_ADDR]', $time)");

        $id_membre = $pdo->lastInsertId();  // On recupere le dernier id inséré.

        $tab['resultat'] = "Membre enregistré";
    }elseif($resultat->rowCount() > 0 && $_SERVER['REMOTE_ADDR'] == $membre['ip']){
        // Si le pseudo existe et que l'adresse ip est la même que celle enregistré, c'est donc le même utilisateur.
        // On met a jour uniquement  sa date_connexion
        $pdo->query("UPDATE membre SET date_connexion=$time WHERE id_membre = $membre[id_membre]");
        $id_membre = $membre['id_membre'];
    }else{
        // Le pseudo est deja pris et l'adresse ip ne correspond pas a ce pseudo
        $tab['resultat'] = "Pseudo indisponible, veuillez en choisir un autre.";
        $erreur = true;  // Nous sommes dans un cas d'erreur, nous changeons la valeur de cette variable pour la tester apres.
        $tab['pseudo'] = "Pseudo indisponible, veuillez en choisir un autre.";  // Evite la redirection depuiis index.php.
    }
    if(!$erreur){  // if(erreur == false) // Si il n'y a pas d'erreur durant les traitements precedent.
        // On place dans la $_SESSION le pseudo, l'id et la civilité de l'utilisateur.
        
        $_SESSION['id_membre'] = $id_membre;
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['civilite;'] = $civilite;

        $f = fopen("prenom.txt", "a");  // On ouvre le fichier prenom.txt sinon on le créer
        fwrite($f, $pseudo . "\n");  // On ecrit dans ce fichier le pseudo de l'utilisateur
        fclose($f);  // Pour fermer le fichier et libéré de la ressource
    }
}

echo json_encode($tab);