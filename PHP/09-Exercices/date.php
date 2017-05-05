<?php
// 1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement. Cette fonction prend 2 paramètres: une date (valide) et le format de conversion  "US" "FR".


function afficheDate2($date, $langue){
    $date2 = new DATETIME($date);

    if($langue == 'FR'){
        return $date2->format('d-m-Y');
    }else if($langue == 'US'){
        return  $date2->format(Y-m-d)
    }else{
        return 'Langue non supporté';
    }
}


function afficheDate($date, $langue){
    if($langue == 'US'){
        $date = strftime('%Y-%m-%d', strtotime($date));
        return $date;
    }else if($langue == 'FR'){
        $date = strftime('%d-%m-%Y', strtotime($date));
        return $date;
    }else{
        return 'FR ou US !';
    }
}

echo afficheDate('2035-05-24', 'FR'); echo '<br>';
echo afficheDate('24-05-2035', 'US'); echo '<br>';
echo afficheDate('24-05-2035', 'IT');

// 2- Vous validez que le paramètre de format est bien US ou FR. La focntino retourne un message si ce n'est pas le cas.



