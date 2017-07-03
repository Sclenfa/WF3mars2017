
<?php
    $db = new PDO('mysql:host=localhost;dbname=exo2_inscription', 'root', '',
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$contenu = '';
$type = array('eleve', 'formateur');

    if(!empty($_POST)) {

        if (strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) {
            $contenu .= '<p>Le nom doit contenir entre 2 et 20 caractères</p>';
        }

        if (strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) {
            $contenu .= '<p>Le prenom doit contenir entre 2 et 20 caractères</p>';
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $contenu .= '<p>L\'email est invalide</p>';
        }

        if (strlen($_POST['password']) < 4 || strlen($_POST['password']) > 20) {
            $contenu .= '<p>Le mot de passe doit contenir entre 4 et 20 caractères</p>';
        }

        if ($_POST['type'] != 'eleve' && $_POST['type'] != 'formateur') {
            $contenu .= '<p> Il faut cocher l\'un des bouton radio </p>';
        }

        if (empty($contenu)) {    // Si $contenu est vide, c'est qu'il n'y a pas d'erreur

            foreach ($_POST as $indice => $valeur) {
                $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
            }

                $_POST['password'] = md5($_POST['password']);

                $query = $db->prepare('INSERT INTO inscription (nom, prenom,email, password, type)
                                            VALUES(:nom, :prenom,:email, :password, :type)');
                $query->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
                $query->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
                $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
                $query->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
                $query->bindParam(':type', $_POST['type'], PDO::PARAM_STR);

                $succes = $query->execute();


            }

        }
?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <style>
    .myform-container.myform {
      max-width: 600px;
      padding: 40px 40px;
    }

    .btn {
      font-weight: 700;
      height: 36px;
      -moz-user-select: none;
      -webkit-user-select: none;
      user-select: none;
      cursor: default;
    }

    .myform {
      background-color: #F7F7F7;
      padding: 20px 25px 30px;
      margin: 0 auto 25px;
      margin-top: 50px;
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      border-radius: 2px;
      -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>

    <?= $contenu ?>

  <div class="myform myform-container">
    <form class="form-horizontal" method="POST">

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="nom" placeholder="Nom" autofocus>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="prenom" placeholder="Prénom">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <div class="radio">
            <label>
              <input type="radio" name="type" value="eleve" checked> Elève
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="type" value="formateur"> Formateur
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <button type="submit" name="submit" class="btn btn-default">S'inscrire</button>
        </div>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>