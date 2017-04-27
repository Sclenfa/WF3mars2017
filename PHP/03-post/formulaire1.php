<?php

//*******************************************
// La superglobale $_POST
//*******************************************
    // $_POST est une superglobale et donc un array disponible dans tout les contextes du script. C'est une methode qui permet de récuprer des informations issu d'un formulaire. Un formulaire est obligatoirement dans des balises <form></form> avec la designation des attributs "method" (pour GET ou POST) et action (qui indique le fichier de destination des données du formulaire). Il contiens un bouton de type submit qui déclenche l'envoie des données vers le serveur.

    // Les attributs "name" du formulaire, constituent les indices de l'array $_POST de reception. Les données saisies dans les champs constituent les valeurs correspondantes.


        if(! empty($_POST)){    // not empty signifie que l'array $_POST n'est pas vide, autrement dit, que le formulaire a été posté. Il peut cependant avoir éé posté avec des champs vides: les valeurs de l'array $_POST sont vide mais il y a bien les indices 'prenom' et 'descrption' à l'interieur.
        echo  'Prénom: ' . $_POST['prenom'] . '<br>';
        echo  'Description: ' . $_POST['description'] . '<br>';
        }

        ?>

        <h1>Formulaire</h1>

            <form method="post" action="">

                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom"><br>

                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea><br>

                <input type="submit" name="validation" value="Envoyer">

            </form>