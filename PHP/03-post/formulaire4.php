<!--Exercice: Réaliser un formulaire "pseudo" et "email" dans formulaire3.php en récuperant et affichant les informations dans formulaire4.php. Une fois le formulaire soumis, verifiez que le pseudo n'est pas vide. Si tel est le cas, afficher un message a l'internaute (dans formulaire4.php) -->

<?php

    if(! empty($_POST)){    // si le formulaire est soumis, il y a les indices correspondants aux names.
        if(! empty($_POST['pseudo'])){
            echo 'Pseudo: ' .$_POST['pseudo'] . '<br>';
        }else{
            echo 'Champ requis' . '<br>';
        }
        echo 'Email: ' .$_POST['email'] . '<br>';
    }