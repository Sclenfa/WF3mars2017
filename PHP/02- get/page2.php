<h1>Page detail des articles</h1>

<?php

//****************************************
//La superglobale $_GET
//****************************************
    // $_GET représente l'URL: il s'agit d'une superglobale et comme toutes les superglobales, d'un array. Superglobale signifie qu'il est disponible dans touts les contextes du script, y compris dans les fonctions: il n'est pas necessaire de faire globale $_GET.

    // Les informations transitent dans l'URL de la manière suivante:
        // page.php?indice1=valeur1&indice2=valeur2....      (sans espace)
        // Chaque indice de cet URL correspondent à un indice de l'array $_GET et chaque valeurs aux valeurs correspondantes aux indices.
        
            if(isset($_GET['article'])&& isset($_GET['couleur'])&& isset($_GET['prix'])){   // Si il existe les indices articles, couleur et prix, on peut les afficher:
                echo '<br>';
                echo 'Artcile: ' . $_GET['article'] . '<br>';
                echo 'Couleur: ' . $_GET['couleur'] . '<br>';
                echo 'Prix: ' . $_GET['prix'] . '<br>';
            }else{
                echo 'Aucun produit selectionné';
            }