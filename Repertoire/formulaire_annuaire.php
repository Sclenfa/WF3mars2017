<!--Nom-->
<!--Prenom-->
<!--Telephone-->
<!--Profession-->
<!--Ville-->
<!--CP-->
<!--Adresse-->
<!--Date de naissance : JJ/MM/YYYY-->
<!--Sexe-->
<!--Description-->
<!--Submit inscription-->

<?php

    $mysqli = new mysqli("localhost", "root", "", "repertoire");

    $contenu = '';

    if(!empty($_POST)){
        print_r($_POST);
        foreach($_POST as $indice => $value){
            $contenu .= "$indice = $value";
        }
    }

?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Formulaire d'inscription</title>
        <style>
            label, select{
                float: left;
                width: 100px;
            }
            fieldset{
                float: left;
                width: 220px;
            }
            .submit{clear: both;}
            .erreur{background: #ff0000;}
            .succes{background: #669933;}
        </style>
    </head>
    <body>

        <?= $contenu ?>
        <form method="post">
            <fieldset>
                <legend>Informations</legend>

                    <label for="nom">Nom :</label><br>
                    <input type="text" name="nom" id="nom"><br><br>

                    <label for="prenom">Prénom :</label><br>
                    <input type="text" name="prenom" id="prenom"><br><br>

                    <label for="telephone">Telephone :</label><br>
                    <input type="text" name="telephone" id="telephone"><br><br>

                    <label for="profession">Profession :</label><br>
                    <input type="text" name="profession" id="profession"><br><br>

                    <label for="ville">Ville :</label><br>
                    <input type="text" name="ville" id="ville"><br><br>

                    <label for="codepostal">Code Postal :</label><br>
                    <input type="text" name="codepostal" id="codepostal"><br><br>

                    <label for="adresse">Adresse :</label><br>
                    <textarea id="adresse" name="adresse"></textarea><br><br>

                <legend>Informations supplémentaires</legend><br>

                    <label>Date de naissance :</label><br><br><br>
                    <label for="jour">Jour</label>
                    <select name="jour" id="jour">
                        <?php for ($i=1; $i<=31; $i++)
                            if($i <= 9){
                                echo  "<option>0$i</option>";
                            }else{
                                echo "<option>$i</option>";
                            }
                        ?>
                    </select><br><br>

                    <label for="mois">Mois</label>
                    <select name="mois" id="mois">
                        <option value="01">Janvier</option>
                        <option value="02">Février</option>
                        <option value="03">Mars</option>
                        <option value="04">Avril</option>
                        <option value="05">Mai</option>
                        <option value="06">Juin</option>
                        <option value="07">Juillet</option>
                        <option value="08">Aout</option>
                        <option value="09">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select><br><br>

                    <label for="annee">Année</label>
                    <select name="annee" id="annee">
                        <?php
                            for($i = date("Y"); $i >= 1930; $i--){
                                echo "<option>$i</option>";
                            }
                        ?>
                    </select><br><br>

                    <label for="sexe">Sexe :</label><br>
                    Homme : <input type="radio" name="sexe" value="m" checked>
                    Femme : <input type="radio" name="sexe" value="f"><br><br>

                    <label for="description">Description :</label><br>
                    <textarea name="description" id="description"></textarea><br><br>

                    <input type="submit" value="Inscription" name="inscription">
            </fieldset>
        </form>
    </body>
</html>