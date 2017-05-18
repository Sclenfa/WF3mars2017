<?php

require_once("inc/init.inc.php");


$tab = array();
$tab['resultat'] = '';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$arg = isset($_POST['arg']) ? $_POST['arg'] : '';



if($mode == 'liste_membre_connecte' && empty($arg)){
    // Recuperer le contenu du fichier prenom.txt (file())
    // Placer dans $tab['resultat'] le contenu de ce fichier sous la forme '<p>Pseudo1</p><p>Pseudo2</p>'
    $f = file("prenom.txt");

    foreach ($f as $value) {
        $tab['resultat'] .= '<p>'. $value .'</p>';
    }
}elseif($mode == 'postMessage'){
    $arg = trim($arg);  // On enleve les espaces avant et apres la chaine ainsi que si le message ne possède que des espaces.
    if(!empty($arg)){  // Si le message n'est pas vide alors on lance un INSERT INTO

        $arg = addslashes($arg);  // Met un \ devant les '' et les ""
        // Enregistrement du message
        $pdo->query("INSERT INTO dialogue (id_membre, message, date) VALUES ($_SESSION[id_membre], '$arg', NOW())");
        $tab['resultat'] = "Message enregistré";
    }
}elseif($mode == "message_tchat"){
    // Recuperer tous les messages de la table dialogue
    $com = $pdo->query("SELECT * FROM dialogue d INNER JOIN membre m ON d.id_membre = m.id_membre");
    // Traitement de l'objet résultat avec un while pour placer la reponse dans $tab['resultat']

    while($result = $com->fetch(PDO::FETCH_ASSOC)){
        if($result['civilite'] == 'm'){
            $tab['resultat'] .= '<p class="bleu">'. ucfirst($result['pseudo']) .' : '. $result['message'] .'</p>';
        }else{
            $tab['resultat'] .= '<p class="rose">'. ucfirst($result['pseudo']) .' : '. $result['message'] .'</p>';
        }
    }
}elseif($mode == 'liste_membre_connecte' && !empty($arg)){
    // Si $arg n'est pas vide alors on a un pseudo et nous ddeevons le retirer du fichier prenom.txt
    $contenu = file_get_contents('prenom.txt');  // On recupere le contenu du fichier prenom.txt dans la variable $contenu

    $contenu = str_replace($arg, "", $contenu);  // On remplace le pseudo recherché par rien

    file_put_contents('prenom.txt', $contenu);  // On écrase l'ancien contenu par le nouveau ou l'on a supprimer le pseudo concerné
}

echo json_encode($tab);