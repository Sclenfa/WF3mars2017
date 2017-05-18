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

        <script
            src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $("#mon_form").on('submit', function(evt){
                    evt.preventDefault()

                    var url = "ajax.php"
                    var personne = $("#choix").val();
                    var param = "personne="+personne

                    $.ajax({
                        url: url, 
                        type: "POST",
                        data: param,
                        dataType: "json",
                        success: function(reponse){
                            $("#resultat").html(reponse.resultat)
                        }
                    })
                })

            })  // Fin du chargement du DOM
        </script>
    </body>
</html>
