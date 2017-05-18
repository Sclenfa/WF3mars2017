<?php

$email = "";

if(isset($_POST['email'])){
    $email = $_POST['email'];
}

// Création ou ouverture d'un fichier via la fonction fopen.
// En mode "a" php crée le fichier s'il n'existe pas sinon il ne fait que l'ouvrir.
// http://php.net/manual/fr/function.fopen.php

$f = fopen("email.txt", "a");
fwrite($f, $email . "\n");  // \n permet le retour a la ligne dans un fichier. Il doit etre entre "" sinon il ne sera pas interprété.

$tab = array();
$tab['resultat'] = '<h2>Confirmation de l\'inscription</h2>';

$liste = file("email.txt");  // La fonction file() place chaque ligne du fichier precisé en argument dans un tableau array.

$tab['resultat'] .= '<p>Voici la liste de tous les inscrits</p>';

$tab['resultat'] .= '<ul>';
foreach ($liste as $value) {
    $tab['resultat'] .= '<li>'. $value .'</li>';
}
$tab['resultat'] .= '</ul>';

echo json_encode($tab);