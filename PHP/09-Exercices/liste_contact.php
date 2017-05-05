<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".

*/

require_once('ajout_contact.php');

$result = $pdo->query("SELECT prenom, nom, telephone FROM contact");

echo '<table>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Telephone</th>
		<th>Autres infos</th>';
    while($donnees = $result->fetch(PDO::FETCH_ASSOC)){
		echo '<tr>
				<td>'. $donnees['nom'] .'</td>
				<td>'. $donnees['prenom'] .'</td>
				<td>'. $donnees['telephone'] .'</td>

			  </tr>';
echo '</table>';

	}
