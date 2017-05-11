<?php

// Créer un tableau en PHP contenant les infos suivantes :


$presentation=array('Prenom' => 'Cloud', 'Nom' => 'Strife', 'Adresse' => 'Premiere maison a droite', 'Code Postal' => '92110', 'Ville' => 'Nibelheim', 'Email' => 'cloudstrife@ff7.enix', 'Telephone' => '0635443378', 'Date de naissance' => '1995-08-19');

    $date = new DATETIME($presentation['Date de naissance']);  //Gérer l’affichage de la date de naissance à l’aide de la classe DateTime


// A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML.
// La date sera affichée au format français (DD/MM/YYYY).

    echo '<h1>On se présente</h1>';
    echo '<ul>';
        foreach ($presentation as $key => $value) {
            if($key <> 'Date de naissance'){
                echo '<li>'. $key .' : '. $value .'</li>';
            }else{
                echo '<li>'. $key .' : '. $date->format('d-m-Y') .'</li>';
            }
        }
    echo '</ul>';






?>