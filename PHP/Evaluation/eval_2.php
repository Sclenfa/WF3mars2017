<?php

echo '<h1>On part en voyage</h1>';

// Créer une fonction permettant de convertir un montant en euros vers un montant en dollars
// américains.

    function devise($montant, $devise_sortie){
        if(is_numeric($montant)){  // Si $montant est bien un chiffre entier ou a virgule
            if($devise_sortie == 'EUR'){
                return $montant * 1.085965;
            }elseif($devise_sortie == 'USD'){
                return $montant / 1.085965;
            }else{
                return 'Convertion uniquement EURO vers USD ou inversement.';
            }
        }else{
            return 'Veuillez mettre un chiffre.';
        }
    }

    // Appel de la fonction
    echo devise(1, 'EUR'); echo '<br>';
    echo devise(15, 'USD');




?>