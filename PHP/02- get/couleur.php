<h1>Couleur des fruits</h1>

<?php

//Exercice:
    // Dans le fichier listeFruits.php: créer trois liens Banane, Kiwi et Cerise. Quand on clic sur les liens on passe le nom du fruit dans l'url à la page couleur.php

    // Dans couleur.php vous récuperez le nom du fruit et affichez sa couleur.

    // Notez que vous ne passez pas la couleur dans l'url mais vous la deduisez dans couleur.php

        if(isset($_GET['fruit'])){
            if($_GET['fruit'] == 'Banane'){
                echo $_GET['fruit'] . ' Jaune';
            }else if($_GET['fruit'] == 'Kiwi'){
                echo $_GET['fruit'] . ' Vert';
            }else if($_GET['fruit'] == 'Cerise'){
                echo $_GET['fruit'] . ' Rouge';
            }else{
                echo 'Ce fruit n\'existe pas';
            }
        }else{
            echo 'Aucun produit selectionné';
        }