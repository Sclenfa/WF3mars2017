<?php

// Nous avons besoin d'un langage interprété coté serveur pour pouvoir communiquer.
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';  // On recupere l'argument fourni via post

    $tab = array();  // On prepare le tableau array qui contiendra la reponse.

    $fichier = file_get_contents("fichier.json");  // On recupere le contenu du fichier.json
    $json = json_decode($fichier, true);  // On transforme en tableau array representé par la variable $json.

    foreach($json as $valeur){
        if($valeur['prenom'] == strtolower($prenom)){
            $tab['resultat'] = '<table border="1"><tr>';
            foreach($valeur as $informations){
                $tab['resultat'] .= '<td>'. $informations .'</td>';
            }
            $tab['resultat'] .= '</tr></table>';
        }
    }
    echo json_encode($tab);  // La reponse