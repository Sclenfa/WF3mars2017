
<?php
// Exercice:
    // - Faire 4 liens HTMl avec le nom des fruits
    // - Quand on clic sur un lien on affiche le prix pour 1000g de ce fruit, dans cette page lien_fruits.php

        include ('fonction.inc.php');

        if(isset($_GET['fruit'])){
            echo '<br>';
            echo calcul($_GET['fruit'], 1000);
        }else{
            echo ' <br> Selectionnez votre fruit';
        }

?>

    <a href="?fruit=bananes">Bananes</a>
    <a href="?fruit=cerises">Cerise</a>
    <a href="?fruit=pommes">Pomme</a>
    <a href="?fruit=peches">Peche</a>

