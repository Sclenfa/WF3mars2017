<?php

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$liste_prenom = $pdo->query('SELECT id_employes, prenom FROM employes');
$liste = "";

while ($prenom = $liste_prenom->fetch(PDO::FETCH_ASSOC)){
    $liste .= '<option value="'. $prenom['id_employes'] .'">'. $prenom['prenom'] .'</option>';
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>

        </style>
    </head>
    <body>
        <form id="mon_form">
            <label>Prénom</label>
            <select id="choix">
                <?php 
                    echo $liste;
                ?>  <!-- Recuperer tout les prenom present dans la BDD entreprise sur la table employes et mettre l'id employes dans la value -->
            </select>
            <input type="submit" value="Valider" id="valider">
        </form>
        <hr>
        <p id="resultat"></p>

        <script>
            // Mettre en place un evenement sur la validation du formulaire (submit)
            // Bloquer le rechargement de page consecutif a la validation du formulaire
            // Declencher une requete ajax qui envoie sur ajax.php
            // Sur ajax.php recuperer les informations de l'employes correspondant à l'id recuperer
            // Envoyer une réponse sous forme de tableau html

            var formulaire = document.getElementById("mon_form").addEventListener("submit", ajax);
            function ajax(evt){
                evt.preventDefault();
                var xhttp = new XMLHttpRequest();
                var champSelect = document.getElementById("choix");
                var value = champSelect.value;
                var file = "ajax.php";
                var parametres = "id_employes="+value;
                xhttp.open("POST", file, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function (){
                    if(xhttp.readyState == 4 && xhttp.status == 200){
                        console.log(xhttp.responseText);
                        var reponse = JSON.parse(xhttp.responseText);
                        document.getElementById("resultat").innerHTML = reponse.resultat;
                    }
                }
                xhttp.send(parametres);
            }
        </script>
    </body>
</html>
