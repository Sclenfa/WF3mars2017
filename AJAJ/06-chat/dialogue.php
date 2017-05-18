<?php

    require_once('inc/init.inc.php');

    if(empty($_SESSION['id_membre'])){
        // Si l'utilisateur est deja present dans la session, on le redirige sur dialogue.php
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title>Document</title>
    </head>
    <body>
        <div id="conteneur">
            <h2 id="moi">Bonjour <?php echo $_SESSION['pseudo']; ?></h2>
            <div id="message_tchat"></div>
            <div id="liste_membre_connecte"></div>
            <div class="clear"></div>
            <div id="smiley">
                <img src="smil/smiley1.gif" alt=":)">
                <img src="smil/smiley2.gif" alt=":hm">
                <img src="smil/smiley3.gif" alt=":lapin">
                <img src="smil/smiley4.gif" alt=":p">
                <img src="smil/smiley5.gif" alt=":love">
                <img src="smil/smiley6.gif" alt=":|">
                <img src="smil/smiley7.gif" alt=":grrr">
                <img src="smil/smiley8.gif" alt=":peur">
                <img src="smil/smiley9.gif" alt=":dodo">
                <img src="smil/smiley10.gif" alt=":ouin">
                <img src="smil/smiley11.gif" alt=":mouais">
                <img src="smil/smiley12.gif" alt=":cool">
                <img src="smil/smiley13.gif" alt=":neutre">
                <img src="smil/smiley14.gif" alt=":clin">
                <img src="smil/smiley15.gif" alt=":d">
                <img src="smil/smiley27.gif" alt=":pan">
            </div>
            <!-- Formulaire -->
            <div id="formulaire_tchat">
                <form id="form"  method="post">
                    <textarea id="message" name="message" rows="5" maxlength="300"></textarea>
                    <input type="submit" name="envoi" value="Envoi" class="submit">
                </form>
            </div>
            <div id="postMessage"></div>
        </div>

        <script>

            // Faire en sorte que si l'utilisateur appuie sur la touche entrée cela enregistre le message
                document.addEventListener("keypress", function (evt){
                    if(evt.keyCode == 13){

                    var messageValeur = document.getElementById("message").value

                    // On envoie notre ajax
                    ajax("postMessage", messageValeur)

                    // On envoie une autre requete ajax pour recuperer les messages et les afficher.
                    ajax("message_tchat");

                    // On vide le champ
                    document.getElementById("message").value = "";
                    }
                })

            // Ajout des smiley dans le message lors du clic sur le smiley
            document.getElementById("smiley").addEventListener("click", function(){
                document.getElementById("message").value = document.getElementById("message").value + event.target.alt
                document.getElementById("message").focus()  // .focus permet de remettre le curseur
            })

            // Pour récuperer la liste des membres connectés
                setInterval("ajax(liste_membre_connecte)", 3333)

            // Pour récuperer la liste des membres connectés
                setInterval("ajax(message_tchat)", 2000)

            //Enregistrement du message via bouton submit
                document.getElementById("form").addEventListener("submit", function(evt){
                    evt.preventDefault();

                    // On recupere la valeur
                    var messageValeur = document.getElementById("message").value

                    // On envoie notre ajax
                    ajax("postMessage", messageValeur)

                    // On envoie une autre requete ajax pour recuperer les messages et les afficher.
                    ajax("message_tchat");

                    // On vide le champ
                    document.getElementById("message").value = "";
                })


                // Fermeture de la page par l'utilisateur
                // On le retire du fichier prenom.txt
                window.onbeforeunload = function(){
                    ajax("liste_membre_connecte", '<?php echo $_SESSION['pseudo']; ?>')
                }



            // Déclaration de la fonction ajax
            function ajax(mode, arg =''){
                if(typeof(mode) == 'object'){
                    mode = mode.id
                    // L'argument mode recevra les id des differents elements de notre page. Sachant que l'on peut selectionner des elements html directement par leurs id(sans getElementById...) il y a un risque de recuperer un objet représentant l'element html. Dans ce cas nous recuperons juste l'id de l'element (mode = mode.id).
                }
                console.log("mode actuel:"+mode)  // Nous affiche la tache en cours.

                var file = "ajax_dialogue.php"
                var param = "mode="+mode+"&arg="+arg;

                if(window.XMLHttpRequest){
                    var xhttp = new XMLHttpRequest()
                }else{
                    var xhttp = new ActiveXObject("Microsoft.XMLHTTP")  // IE inferieur v7
                }

                xhttp.open("POST", file, true)
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState == 4 && xhttp.status == 200){
                        console.log(xhttp.responseText)
                        var obj = JSON.parse(xhttp.responseText)
                        document.getElementById(mode).innerHTML = obj.resultat

                        var boiteMessage = document.getElementById("message_tchat")
                        document.getElementById(mode).scrollTop = boiteMessage.scrollHeight  // Permet de descendre l'ascenceur de ce div et de voir les derniers messages
                    }
                }
                xhttp.send(param)
            }
        </script>
    </body>
</html>