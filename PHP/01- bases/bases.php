<style>h2{font-size: 15px; color: red;} </style>

<?php
    // Pour ouvrir un passage en PHP, on utilise la balise precedente

//--------------------------------------
echo '<h2> Les balises PHP </h2>';  // Echo est une instruction qui nous permet d'effectuer un affichage. Notez que les instruction se terminent par un ";"
//--------------------------------------

    // Pour fermer un passage en PHP on utilise la balise suivante
    ?>

    <strong>Bonjour</strong>    <!-- En dehors des balises d'ouverture et de fermeture du PHP, nous pouvons écrire du HTML -->

    <?php

//--------------------------------------
echo '<h2> Ecriture et affichage </h2>';
//--------------------------------------
    echo '<br>'; // Onpeut mettre des balises HTML dans un echo, elles sont interprétées comme telles.
    print 'Nous somme jeudi';   // Print est une autre instruction d'affichage. 
    // Pour info il existe d'autres instructions d'affichage: print_r(); et var_dump();

//--------------------------------------
echo '<h2> Variable : types / déclaration / affection </h2>';
//--------------------------------------
    // Definition: Une variable est un espace mémoire nommé qui permet de conserver une valeur.
    // En PHP, on déclare une variable avec le signe "$".

    $a = 127;   // Je délcare la variable a et je lui affecte la valeur 127.
    // Le type de la variable a est INTEGER (entier).

    $b = 1.5;   // Un type double pour nombre a virgule.

    $a = 'une chaine de caractères';    // Type string pour une chaine de caractères

    $b = '127';   // Il s'agit aussi d'un string car il y a des quotes.

    $a = true;   // Type qui prend que 2 valeurs possibles : TRUE ou FALSE.$_COOKIE

//--------------------------------------
echo '<h2> Concaténation </h2>';
//---------------------------------------
    $x = 'bonjour ';
    $y = 'tout le monde';
    echo $x . $y . '<br>';   // Point de concaténation que l'ont peu traduire par 'suivi de'.
    echo "$x $y <br>";   // On obtient le même resultat sans concaténation. (cf chapitre d'apres pour l'explication de l'evaluation des variables dans les quillements).

    //---------------------------------------
    // Concaténation lors de l'affectation
    //---------------------------------------
        $prenom1 = 'Bruno';   // Déclaration de la variable $prenom1.

        $prenom1 = 'Claire';    // Ici la valeur "Claire" écrase la valeur precedente "Bruno" qui etait contenue dans la variable.

        echo $prenom1 . '<br>';  // Affiche Claire

        $prenom2 = 'Bruno ';
        $prenom2 .= 'Claire';   // On affecte la valeur 'Claire' à la variable $prenom2 en l'ajoutant a la valeur precedement contenu dans la variable grace a l'opératuer .=
        echo $prenom2 . '<br>';  // Affiche Bruno Claire

//---------------------------------------
echo '<h2> Guillemets et quotes </h2>';
//---------------------------------------
    $message = "aujourd'hui";   // Ou bien
    $message = 'aujourd\'hui';  // Dans les quotes on évite les apostrophes avec l'anti-slash.
    $txt = 'Bonjour';
    echo "$txt tout le monde <br>";  // Ici les variables sont évaluées quand elles sont presentes dans des guillemets, c'est leurs contenu qui est affiché
    echo '$txt tout le monde <br>';  // Dans des quotes simples on affiche littéralement le nom des variables : elles ne sont pas évaluées.

// --------------------------------------
echo '<h2> Constantes </h2>';
// --------------------------------------
    // Une constante permet de conserver une valeur qui ne peut pas (ou ne doit pas) être modifiée durant la durée du script. Tres utile pour garder de manière certaine la connexion à une BDD ou le chemin du site par exemple.

    define("CAPITALE", "Paris");   // Par convention, on écrit toujours le nom des constantes en MAJUSCULES. define() permet de déclarer une constante dont on indique d'abord le nom puis la valeur.

    echo CAPITALE . '<br>';  // Affiche Paris.

    // Constantes magiques:
    echo __FILE__ . '<br>';  // Affiche le chemin complet du fichier dans lequel on est...
    echo __LINE__ . '<br>';  // Affiche la ligne à laquelle on est.


// --------------------------------------
echo '<h2> Opérateurs arithmétiques </h2>';
// --------------------------------------
    $a = 10;
    $b = 2;
    echo $a + $b . '<br>';    // Affiche 12
    echo $a - $b . '<br>';    // Affiche 8
    echo $a * $b . '<br>';    // Affiche 20
    echo $a / $b . '<br>';    // Affiche 5
    echo $a % $b . '<br>';    // Affiche 0 (= le reste de la division entière).

        // ---------------------------------
        // Opérations et affectation combinées:
            $a += $b . '<br>';   // Vaut 12 car equivaut a $a = $a + $b soit 10+2
            $a -= $b . '<br>';   // Vaut 10 car equivaut a $a = $a - $b soit 12-2
            $a *= $b . '<br>';   // Vaut 20 car equivaut a $a = $a - $b soit 12-2
            $a /= $b . '<br>';   // Vaut 10
            $a %= $b . '<br>';   // Vaut 0

        //----------------------------------
        // Incrementer et décrementer:
            $i = 0;
            $i++;   // Incrémentation de $i de +1 (vaut 1)
            $i--;   // Décrementation de $i de -1 (vaut 0)

            $k = ++$i;  // La variable $i est incrémenter de 1, puis elle est affectée a $k
            echo $i . '<br>';   // Vaut 1
            echo $k . '<br>';   // Vaut 1

            $k = $i++;  // La variable $i est d'abord affecté à $k puis incrémenter de 1.
            echo $i . '<br>';   // Vaut 2
            echo $k . '<br>';   // Vaut 1

// --------------------------------------
echo '<h2> Structure conditionnelles et opérateurs de comparaison </h2>';
//---------------------------------------
    $a = 10;
    $b = 5;
    $c = 2;

    if($a > $b){    // Si la condition renvoie TRUE, on execute les accolades qui suivent:
        echo '$a est bien superieur a $b <br>';
    }else{  // Sinon, si la condition renvoie FALSE, on execute le else:
        echo 'Non, c\'est $b qui est superieur à $a <br>';
    }

    if($a > $b && $b > $c){  // && signifie ET
        echo 'Les deux conditions sont vraies <br>';
    }

    if($a == 9 || $b > $c){  // L'opérateur de comparaison est == et l'opérateur OU s'écrit ||
        echo 'OK pour une des deux conditions <br>';
    }else{
        echo 'Les deux conditions sont faussent <br>';
    }

    if($a == 8){
        echo 'Réponse 1';
    }else if($a != 10){  // Sinon si $a different de 10, on execute les accolades qui suivent:
        echo 'Réponse 2';
    }else{  // Sinon, si les deux conditions precedentes sont fausse, on execute les accolades qui suivent:
        echo 'Réponse 3 <br>';   // On entre ici dans le else
    }

    if($a == 10 XOR $b == 6){
        echo 'OK pour la condition exclusive <br>';  // Si les deux conditions  sont vraies ou les deux conditions sont fausses en même temps, nous n'entrons pas dans les accolades.
    }
    // Pour que la condition s'execute il faut que l'une ou l'autre soit vraie mais pas les deux en même temps.

    // Condition ternaires (forme contractée de la condition)
        echo ($a == 10) ? '$a est égal a 10 <br>': '$a est different de 10 <br>';   // Le "?" remplace le "if" et le ":" remplace le "else". Si $a vaut 10 on fait un echo du premier string sinon du second.

    // Difference entre == et ===
        $vara = 1;  // INTEGER
        $varb = '1';   // String

        if($vara == $varb){
            echo  'Il y a égalité en valeur entre les deux variables <br>';
        }
        if($vara === $varb){
            echo  'Il y a égalité en valeur et en type entre les deux variables <br>';
        }else{
            echo 'Le type differe entre les deux variables <br>';
        }

        // Avec la presence de === la comparaison ne fonctionne pas car les variables ne sont pas du même type: on comparé un integer avec un string.
        // Avec le double égal, on ne compare que la valeur : la comparaison est donc juste.

        // = signe d'affectiontion
        // == comparaison en valeur
        // === comparaison en valeur et en type

    // empty() et isset():
        // empty() : teste si c'est vide (c'est à dire 0, '', NULL, false ou non défini).
        // isset() : teste si c'est défini et a une valuer non NULL.
        $var1 = 0;
        $var2 = '';
        if(empty($var1)){
            echo 'on a 0, vide, ou non défninie <br>';
        }
        if(isset($var2)){
            echo '$var2 existe bien <br>';
        }

        // Difference entre empty() et isset() : si on met les lignes 180 et 181 en commentaire  (pour les neutraliser), empty reste vrai car $var1 n'est pas définie, alors que isset est faux car $var2 n'est pas définie.

        // empty() sera utilisé pour vérifié que les champs d'un formulaire sont remplis, isset() permettra de verifié l'existance d'un indice dans un array avant de l'utiliser.


// --------------------------------------
echo '<h2> Condition Switch </h2>';
//---------------------------------------
    // Dans le switch si dessous, les "case" representent les cas different dans lesquels ont peut potentiellement tomber.
    $couleur = 'jaune';

    switch($couleur){
        case 'bleu': echo 'Vous aimez le bleu'; break;
        case 'rouge': echo 'vous aimez le rouge'; break;
        case 'vert': echo 'vous aimez le vert'; break;
        // case 'jaune': echo 'vous aimez le jaune'; break;
        default: echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
    }
    // Le switch compare la valeur de la variable entre parenthese à chaque "case". Lorsqu'une valeur correspond, on execute l'instruction en regard du "case" puis le "break" qui indique qu'il faut sortir de la condition.
    // Le default correspond a un "else", on l'execute par defaut quand aucun "case" ne correspond.

    // Exercice: Ecrivez la condition switch ci-dessus avec des "if.
    if($couleur == 'bleu'){
        echo 'vous aimez le bleu';
    }else if($couleur == 'rouge'){
        echo 'vous aimez le rouge';
    }else if($couleur == 'vert'){
        echo 'vous aimez le vert';
    }else{
        echo 'Vous n\'aimez rien <br>';
    }

// --------------------------------------
echo '<h2> Fonctions prédéfinies </h2>';
//---------------------------------------
    // Une fonction prédéfinie permet de réaliser un traitement spécifique qui est prevu dans le langage.
    echo '<h2>Traitement des chaines de caractères (strlen, strpos, substr) </h2>';
    $email1 = 'prenom@site.fr';
    echo strpos($email1, '@') . '<br>';  // strpos indique la position du caractère "@" dans la chaine $email1.
    echo strpos('Bonjour', '@');
    var_dump(strpos('Bonjour', '@'));

    // Quand j'utilise une fonction predefinie, il faut ce demander quels sont les arguments a lui fournir pour qu'elle s'execute correctement et ce qu'elle peut retourner comme résultat.
    // Dans l'exemple de strpos(): succès => INTEGER, echec => boolean "false".

    $phrase = 'Mettez une phrase à cet endroit';
    echo '<br>' . strlen($phrase) . '<br>';  // Affiche la longueur du string : succes => INTEGER, echec => FALSE

    $texte = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit fuga optio fugit error aliquid culpa et totam excepturi sint iste obcaecati sit aut quibusdam in, a earum, dolor libero repudiandae.';

    echo substr($texte, 0, 20) . '... <a href="">Lire la suite</a> ' . '<br>';  // On découpe une partie du texte et on lui concatène un lien. Succes => string, echec => false.

    echo str_replace('site', 'gmail', $email1) . '<br>';  // Remplace "site" par "gmail" dans le string contenu dans $email1.

    $message ='          Hello World          ';
    echo strtolower($message) . '<br>';  // Passe le string en minuscule.
    echo strtoupper($message) . '<br>';  // Passe le string en majuscule.
    echo strlen($message) . '<br>';
    echo strlen(trim($message)) . '<br>';   // trim() permet de supprimer les espaces au début et à la fin d'un string.

// --------------------------------------
echo '<h2> Le manuel PHP en ligne </h2>';
//---------------------------------------
    // Le manuel PHP en ligne : http://php.net/manual/fr/

// --------------------------------------
echo '<h2> Gestion des dates </h2>';
//---------------------------------------
    echo date('d/m/Y H:i:s') . '<br>';  // Affiche la date et l'heure de l'instant selon le format indiqué. On peut choisir les séparateurs.

    echo time() . '<br>';   // Retourne le timestamp actuel = nombre de seconde écoulé depuis le 01/01/1970 a 00:00:00 (création théorique de UNIX);

    // La fonction prédéfinie strtotime():
    $dateJour = strtotime('10-01-2016');   // Retourne le timestamp a la date indiquée.
    echo $dateJour . '<br>';

    // La fonction strftime():
    $dateFormat = strftime('%Y-%m-%d', $dateJour);  // Transforme le timestamp donné selon le format indiqué, ici YYYY-MM-DD.
    echo $dateFormat . '<br>';  // Affiche 2016-01-10.

    // Exemple de conversion de format de date:
    // Transformer 23-05-2015 en 2015-05-23:
    echo strftime('%Y-%m-%d', strtotime('23-05-2015')) . '<br>';

    // Inversement
    echo strftime('%d-%m-%Y', strtotime('2015-05-23')) . '<br>';

    // Cette methode de transformation est limité dans le temps (2038). On peut donc utilisé une autre methode avec la classe DateTime:

    $date = new DateTime('11-04-2017');
    echo $date->format('Y-m-d') . '<br>';
    // DateTime est une classe que l'on peut comparé a un plan ou un modele qui sert a construire des objets "date".
    // On construit un objet "date" avec le mot new, en indiquant la date qui nous interesse entre parentheses. $date est dont un objet "date".
    // Cet objet bénificie de methodes (= fonctions) offertes par la classe: il y a entre autres la methode format() qui permet de modifier le format d'une date. Pour appeler cette methode sur l'objet $date on utilise la fleche "->".
    

?>