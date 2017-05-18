<?php
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$id_employes = 1;
if(isset($_POST['id_employes'])){
    $id_employes = $_POST['id_employes'];
}

$req = $pdo->query("SELECT * FROM employes WHERE id_employes = $_POST[id_employes]");

$information_employes = $req->fetch(PDO::FETCH_ASSOC);


$tab = array();
$tab['resultat'] = "<table border='1'><tr>";
$tab['resultat'] .= '<th>'. implode('</th><th>', array_keys($information_employes)).'</th></tr>';
$tab['resultat'] .= '<tr>';

foreach($information_employes as $value){
    $tab['resultat'] .= '<td>'. $value .'</td>';
}

$tab['resultat'] .= '</tr>';
$tab['resultat'] .= '</table>';

echo json_encode($tab);