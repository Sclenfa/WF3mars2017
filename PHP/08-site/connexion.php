<?php
    require_once('inc/init.inc.php');
//****************************************** Traitement ****************************************
    // Deconnexion demander par l'internaute::
        if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
            // Si l'internaute demande la deconnexion, on détruit la session:
            session_destroy();
        }


    // Internaute deja connecté:
        if(internauteEstConnecte()){    // Si l'internaute est deja connecté, il n'a rien a faire ici, on le redirige donc vers son profil.
            header('location:profil.php');  // Demande la page profil.php
        }

    // Traitement du formulaire de connexion et remplissage de la session:
        if(!empty($_POST)){
            // Controle de formulaire:
            if(empty($_POST['pseudo'])){
                $contenu .= '<div class="bg-danger">Le pseudo est requis</div>';
            }
            if(empty($_POST['mdp'])){
                $contenu .= '<div class="bg-danger">Le mot de passe est requis</div>';
            }

        // Si le formulaire est correct, on controle les identifiants:
            if(empty($contenu)){
                $mdp=md5($_POST['mdp']);    // On crypte le mdp pour le comparer avec celui de la base.
                $resultat = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp", array(':pseudo' => $_POST['pseudo'], ':mdp' => $mdp));

                if($resultat->rowCount() != 0){  // Si il y a un enregistrement dans le resultat, c'est que le pseudo et mdp correspondent.
                    $membre = $resultat->fetch(PDO::FETCH_ASSOC);  // Pas de while car il y a unicité du pseudo.
                    // echo '<pre>'; print_r($membre); echo '</pre>';

                    $_SESSION['membre'] = $membre;  // Nous remplissons la session avec les elements provennant de la BDD. Cette session permet de conserver les infos du membre dans l'ensemble du site
                    
                    header('location:profil.php');  // Le membre etant connecté, on l'envoie ver son profil.
                    exit();
                }else{
                    // Si les identifiants ne correspondent pas, on affiche un message d'erreur:
                    $contenu .= '<div class="bg-danger">Erreur sur les identifiants</div>';
                }
            }
        }



//****************************************** Affichage *****************************************

    require_once('inc/haut.inc.php');
    echo $contenu;
?>
    <h3>Veuillez renseigner vos identifiants pour vous connecter</h3>
    <form method="post" action="">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" name="pseudo" id="pseudo" value=""><br><br>

        <label for="mdp">Mot de passe</label><br>
        <input type="password" name="mdp" id="mdp" value=""><br><br>

        <input type="submit" value="Se connecter" class="btn">
    </form>

<?php
    require_once('inc/bas.inc.php');
