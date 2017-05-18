<?php

    require_once("inc/init.inc.php");

    if(!empty($_SESSION['id_membre'])){
        // Si l'utilisateur est deja present dans la session, on le redirige sur dialogue.php
        header("location:dialogue.php");
    }

    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <fieldset class="cadre_accueil">
            <div id="message"></div>
        </fieldset>

        <fieldset class="cadre_accueil">
            <form id="form">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" value=""><br>

                <label for="civilite">Civilité</label>
                <select id="civilite" name="civilite">
                    <option value="m">Homme</option>
                    <option value="f">Femme</option>
                </select><br>

                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" value=""><br>

                <label for="date_de_naissance">Date de naissance</label>
                <input type="date" name="date_de_naissance" id="date_de_naissance" value="" placeholder="YYYY-MM-DD"><br>

                <input type="submit" name="connexion" value="Se connecter">
            </form>
        </fieldset>

        <script>
            // Mise en place d'un evenement sur la validation du formulaire
            document.getElementById("form").addEventListener("submit", function(evt){
                evt.preventDefault()
                //alert('a');
                // Recuperation de la valeur du champs
                var champPseudo = document.getElementById("pseudo")
                var pseudo = champPseudo.value

                var champCivilite = document.getElementById("civilite")
                var civilite = champCivilite.value

                var champVille = document.getElementById("ville")
                var ville = champVille.value

                var champDate = document.getElementById("date_de_naissance")
                var date_de_naissance = champDate.value

                var param = "mode=connexion&pseudo="+pseudo+"&civilite="+civilite+"&ville="+ville+"&date_de_naissance="+date_de_naissance

                var file = "ajax_connexion.php"

                if(window.XMLHttpRequest){
                    var xhttp = new XMLHttpRequest()
                }else{
                    var xhttp = new ActiveXObject("Microsoft.XMLHTTP")  // IE < v7
                }

                xhttp.open("POST", file, true)
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState == 4 && xhttp.status == 200){
                        console.log(xhttp.responseText)
                        var obj = JSON.parse(xhttp.responseText)
                        document.getElementById("message").innerHTML = obj.resultat

                        if(obj.pseudo == "disponible"){
                            // Si l'indice pseudo a la valeur disponible alors on peut connecter l'utilisateur.
                            // On le redirige donc vers dialogue.php
                            window.location.href = 'dialogue.php';
                        }
                    }
                }
                xhttp.send(param)
            })
        </script>
    </body>
</html>