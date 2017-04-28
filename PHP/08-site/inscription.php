<?php

//************************************* Traitement ************************************
    require_once('inc/init.inc.php');
    $inscription = false;   // Variable qui permet de savoir si le membre est inscrit pour ne pas réafficher le formulaire d'inscription

    // Traitement du POST
        if(!empty($_POST)){  // Si le formulaire est posté
            // Validation du formulaire
            if(strlen($_POST['pseudo'])<4 || strlen($_POST['pseudo'])>20){
                $contenu .= '<div class="bg-danger">Le pseudo doit contenir entre 4 et 20 caractères</div>';
            }
            if(strlen($_POST['mdp'])<4 || strlen($_POST['mdp'])>20){
                $contenu .= '<div class="bg-danger">Le mot de passe doit contenir entre 4 et 20 caractères</div>';
            }
            if(strlen($_POST['nom'])<2 || strlen($_POST['nom'])>20){
                $contenu .= '<div class="bg-danger">Le nom doit contenir entre 2 et 20 caractères</div>';
            }
            if(strlen($_POST['prenom'])<2 || strlen($_POST['prenom'])>20){
                $contenu .= '<div class="bg-danger">Le prenom doit contenir entre 2 et 20 caractères</div>';
            }
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $contenu .= '<div class="bg-danger">L\'email est invalide</div>';
            }
            // Filter_var() permet de valider des formats de chaines de caractères pour verifié qu'il s'agit ici d'email (on pourrait valider une URL par exemple).

            if($_POST['civilite'] != 'm' && $_POST(['civilite']) != 'f'){
                $contenu .= '<div class="bg-danger">La civilité est incorrecte</div>';
            }

            if(strlen($_POST['ville'])<1 || strlen($_POST['ville'])>20){
                $contenu .= '<div class="bg-danger">Le ville doit contenir entre 1 et 20 caractères</div>';
            }

            if(!preg_match('#^[0-9]{5}$#', $_POST['code_postal'])){  // preg_match retourne true si le string en deuxième argument correspond à l'expression réguliere
                $contenu .= '<div class="bg-danger">Le code postal n\'est pas valide</div>';
            }
            // Explication de l'expression regulière:
            // Elle est délimitée par des # au début et à la fin
            // Le ^ signifie que l'expression débute par tout ce qui suit
            // Le $ signifie que l'expression termine par tout ce qui precede
            // [0-9] définit l'interval de caractères autorisés, ici de 0 à 9
            // {5} est un quantificateur qui indique qu'il faut 5 caractères autorisés (pas plus pas moins)

            if(strlen($_POST['adresse'])<4 || strlen($_POST['adresse'])>50){
                $contenu .= '<div class="bg-danger">L\'adresse doit contenir entre 4 et 50 caractères</div>';
            }

            // Si aucune erreur sur le formulaire, on verifie l'unicité du pseudo avant l'inscription en BDD:
            if(empty($contenu)){    // Si $contenu est vide, c'est qu'il n'y a pas d'erreur
                $membre = executeRequete("SELECT id_membre FROM membre WHERE pseudo = :pseudo", array(':pseudo'=>$_POST['pseudo']));    // On verifie l'existence du pseudo.
                if($membre->rowCount() > 0){    // Si il y a des lignes dans le resultat de la requete
                    $contenu .= '<div class="bg-danger">Le pseudo est indisponible: veuillez en choisir un autre</div>';
                }else{
                    // Si le pseudo est unique, on peut faire l'inscription en BDD
                    $_POST['mdp'] = md5($_POST['mdp']);  // Permet d'encrypter le mot de passe selon l'algorithme md5. Il faudra le faire aussi sur la page de connexion pour comparer 2 mots cryptés.

                    executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, 0)", array(':pseudo'=>$_POST['pseudo'], ':mdp'=>$_POST['mdp'], ':nom'=>$_POST['nom'], ':prenom'=>$_POST['prenom'], ':email'=>$_POST['email'], ':civilite'=>$_POST['civilite'], ':ville'=>$_POST['ville'],':code_postal'=>$_POST['code_postal'],':adresse'=>$_POST['adresse']));

                    $contenu .= '<div class="bg-success">Vous etes inscrit. <a href="connexion.php">Cliquez ici pour vous connecter</a></div>';
                    $inscription = true;    // Pour ne plus afficher le formulaire d'inscription.
                }
            }
        }

//************************************ Affichage **************************************
    require_once('inc/haut.inc.php');
    echo $contenu;  // Affiche les messages du site
    if(!$inscription):  // Si membre non inscrit ($inscription = false), ona ffiche le formulaire
        ?>
        <h3>Veuillez renseigner le formulaire pour vous inscrire</h3>
        <form method="post" action="">
            
            <label for="pseudo">Pseudo</label><br>
            <input type="text" name="pseudo" id="pseudo" value=""><br><br>

            <label for="mdp">Mot de passe</label><br>
            <input type="password" name="mdp" id="mdp" value=""><br><br>

            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom" value=""><br><br>

            <label for="prenom">Prenom</label><br>
            <input type="text" name="prenom" id="prenom" value=""><br><br>

            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" value=""><br><br>

            <label>Civilité</label><br>
            <input type="radio" name="civilite" id="homme" value="m" checked><label for="homme">Homme</label>
            <input type="radio" name="civilite" id="femme" value="f"><label for="femme">Femme</label><br><br>

            <label for="ville">Ville</label><br>
            <input type="text" name="ville" id="ville" value=""><br><br>

            <label for="code_postal">Code Postal</label><br>
            <input type="text" name="code_postal" id="code_postal" value=""><br><br>

            <label for="adresse">Adresse</label><br>
            <textarea id="adresse" name="adresse"></textarea><br><br>

            <input type="submit" name="inscription" value="S'inscrire" class="btn">

        </form>

<?php
    endif;  // Syntaxe du if avec ":" qui remplace la première accolade et "endif" qui remplace la seconde



    require_once('inc/bas.inc.php');