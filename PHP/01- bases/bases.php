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
            $a += $b;   // Vaut 12 car equivaut a $a = $a + $b soit 10+2
            $a -= $b;   // Vaut 10 car equivaut a $a = $a - $b soit 12-2
            $a *= $b;   // Vaut 20 car equivaut a $a = $a - $b soit 12-2
            $a /= $b;   // Vaut 10
            $a %= $b;   // Vaut 0

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

    // Entrer une valeur dans une variable sous condition (PHP7):
        $var1 = isset($maVar) ? $maVar : 'valeur par defaut';   // Dans cette ternaire, on affecte la valeur de $maVar a $var1 si elle existe. Celle-ci n'existant pas, on lui affecte 'valeur par defaut'.
        echo $var1 . '<br>';    // Affiche 'valeur par defaut'

        // En version PHP7:
        $var2 = $maVar ?? 'valeur par defaut';  // On fait exactement la même chose mais en plus cours: le "??" signifie "soit l'un soit l'autre", "prend la premiere valeur qui existe".
        echo $var2 . '<br>';

        $var3 = $_GET ['pays'] ?? $_GET ['ville'] ?? 'pas d\'info';  // Soit on prend le pays si il existe, sinon on prend la ville si elle existe sinon on prend 'pas d'info' par defaut.
        echo $var3 . '<br>';

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
    

// --------------------------------------
echo '<h2> Les fonctions utilisateurs </h2>';
//---------------------------------------
    // Les fonctions qui ne sont pas predefinies dans le langage sont déclarées puis executé par l'utilisateur.

        // Déclaration d'une fonction
            function separation(){
                echo '<hr>';    // simple fonction permettant de tiré un trait dans la page
            }

        // Appel de la fonction par son nom:
            separation();   //Ici on execute la fonction.

    // Fonction avec arguments:

        // Les arguments sont des paramètres fourni à la fonction et lui permettent de completer ou modifier son comportement initialement prevu.

            function bonjour($qui){  // $qui apparrait ici pour la première fois: il s'agit d'une variable de reception qui recoit la valeur d'un argument.
                return 'Bonjour ' . $qui . '<br>';  // return permet de renvoyer ce qui suit le return à l'endroit ou la fonction est appelé.
                echo 'Cette ligne ne sera pas executé';  // Apres un return on quitte la fonction donc on n'execute pas le code qui suit.
            }

        // Appel de la fonction:
            echo bonjour('Link');   // On appel la fonction en lui donnant le string 'Link' en argument => affiche Bonjour 'Link'.

            $prenom = 'Sephiroth';
            echo bonjour($prenom);  // l'argument peut etre une variable => affiche 'bonjour Sephiroth'.

    // Exercice:
        function appliqueTva($nombre){
            return $nombre * 1.2;
        }
        // Ecrivez une fonction appliqueTva2 sur la base de la precedente, mais en donnant la possibilité de modifié le taux

        function appliqueTva2($nombre, $taux){  // On ne peut pas redéclarer une fonction avec le même nom.
            return $nombre * $taux;
        }
        echo appliqueTva2(100, 1.5) . '<br>';   // Lorsqu'une fonction attend des arguments, il faut obligatoirement les lui donner.

    // Exercice 2:
        function meteo($saison, $temperature){
            echo "Nous sommes en $saison et il fait $temperature °C <br>";
        }

        meteo('hiver', 1);
        meteo('printemps', 1);

        // Créer une fonction meteo2 qui permet d'afficher "au printemps" quand il s'agit du printemps.
        
        function meteo2($saison, $temperature){
            if($saison == 'printemps'){
                echo "Nous sommes au $saison et il fait $temperature °C <br>";
            }else{
                echo "Nous sommes en $saison et il fait $temperature °C <br>";
            }
        }
        function meteo3($saison, $temperature){
            $article = ($saison == 'printemps') ? 'au' : 'en';
                echo "Nous sommes $article $saison et il fait $temperature °C <br>";
        }
        meteo2('printemps', 2);
        meteo3('printemps', 3);

        // Exercices:
        function prixLitre(){
            return rand(1000,2000)/1000;    // Détermine un prix aléatoire entre 1 et 2€
        }

        // Ecrivez la fonction factureEssence qui calcule le prix total de votre facture d'essence en fonction du nombre de litres que vous lui donnez. Cette fonction retourne la phrase 'votre facture est de X€ pour YL d'essence (X et Y sont variable).
        // Dans cette fonction utilisez la fonction prixLitre() qui vous retourne le prix du litre d'essence.

        $Y = 0;

        function factureEssence($Y){
            $X = prixLitre() * $Y;
            echo "Votre facture est de $X € pour $Y L d'essence.";
        }
        factureEssence(10);



// --------------------------------------
echo '<h2> Les variables locales et globales </h2>';
//---------------------------------------
    function jourSemaine(){
        $jour = 'vendredi';  // Ici dans la fonction nous sommes dans un espace local. La variable $jour est donc locale.
        return $jour;
    }

    // a l'exterieur de la fonction, je suis dans l'espace global.
    //echo $jour;  // Je ne peux pas utiliser une variable locale dans l'espace global.
    echo jourSemaine() . '<br>';    // On peux cependant récupéré la valeur de %jour grace au return qui est au sein de la fonction et à l'appel de cette fonction.

    $pays = 'France';   // Variable globale
    function affichagePays(){
        global $pays;   // Permet de récupéré une variable provenant de l'espace globale au sein de l'espace loval de la fonction.
        echo $pays;  // On peut donc utilisé cette variable $pays.
    }

    affichagePays();

// --------------------------------------
echo '<h2> Les structures itératives : boucles </h2>';
//---------------------------------------
    // Boucle while
        $i=0;   // Valeur de départ de la boucle.

        while ($i<3){   // Tant que $i est inferieur à 3, j'execute les accolades qui suivent.
            if ($i == 2){
                echo "$i";
            }else{
                echo "$i---";
            }
            $i++;   // On n'oublie pas d'incrémenter $i pour que la boucle ne soit pas infini (il faut que la condition puisse devenir false à un moment donné).
        }
        echo '<br>';

        // Exercice: A l'aide d'une boucle while, afficher dans un selecteur les années depuis l'année en cours moins 100 ans et jusqu'a l'année en cours: 1971 => 2017

        $annee = date("Y") - 100;   // Equivaut a 1917
        echo "<select>";
            while ($annee <= date("Y")){    // Equivaut a $a = 2017
                echo "<option> $annee </option>";
            $annee++;
        }
        echo"</select>";

    // Boucle do while
        // La boucle do while a la particularité de s'executé au moins UNE fois puis tant que la condition de fin est vraie.
        echo '<br>boucle do while <br>';
        do{
            echo 'un tour de boucle';
        } while (false);    // On met la condition pour executer les tours de boucle ici à la place de false. Dans ce cas precis, on voit que l'on effectue un tour de boucle bien que la condition soit fausse.

        // Notez la presence du ";" à la fin de la boucle de while (contrairement aux autres structures itératives).

    // Boucle for:
        echo '<br>';
        for($j=0; $j < 16; $j++ ){  // Initialisation de la valeur de départ ; condition d'entrée dans la boucle ; incrémentation ou décrémentation.
            print $j . '<br>';
        }

        // Exercice: Faire une boucle qui affiche 0 à 9 sur la même ligne. Ensuite dans un tableau HTML.
            for($chiffres = 0; $chiffres <= 9; $chiffres++){
                echo $chiffres;
            }

            echo "<table border='1'>";
            echo "<tr>";
                for($chiffres2 = 0; $chiffres2 <=9; $chiffres2++){
                    echo "<td> $chiffres2 </td>";
                }
            echo "</tr>";
            echo "</table>";
            echo '<br>';

            echo "<table border='1'>";
                for ($array=0; $array <=10; $array++){
                    echo "<tr>";
                        for($chiffres2 = 0; $chiffres2 <=9; $chiffres2++){
                            echo "<td> $chiffres2 </td>";
                    }
                    echo "</tr>";
                }
            echo "</table>";

// --------------------------------------
echo '<h2> Les array ou tableaux </h2>';
//---------------------------------------
    // On peut stocker dans un array une multitude de valeurs, quleque soit leurs type.
    $liste = array('gregoire', 'nathalie', 'emilie', 'francois', 'georges');    // Déclaration d'un array appelé $liste contenant des prénoms.
    // echo $liste;    // Erreur car on ne peut pas afficher directement de contenu d'un array.

    echo '<pre>'; var_dump($liste); echo '<pre>';
    echo '<pre>'; print_r($liste); echo '<pre>';
    // Ces deux instructions d'affichage permettent d'indiquer le type de l'element mis en argument ainsi que son contenu. Les balies <pre> servent à faire une mise en forme. Notez que ces deux instructions ne sont utiliser qu'en phase de developpement.

    // Autre moyen  d'affecter des valeurs dans un tableau:

        $tab[] = 'France';  // Permet d'ajouter la valeur France dans le tableau $tab.
        $tab[] = 'Italie';
        $tab[] = 'Espagne';
        $tab[] = 'Portugal';

        print_r($tab);  // Pour voir le contenu du tableau
        // Pour afficher la valeur Italie qui ce situe a l'indice 1:
        echo $tab[1] . '<br>';

    // Tableau associatif: tableau dont les indices sont litteraux:

        $couleur = array("j" => "jaune", "b" => "bleu", "v" => "vert");  // On peut choisir le nom des indices.
        // Pour acceder a un element du tableau associatif
        echo 'La seconde couleur de notre tableau est le ' . $couleur['b'] . '<br>';
        echo "La seconde couleur de notre tableau est le $couleur[b] <br>";  // Affiche bleu. Un array écrit dans des guillemets perd ses quotes autour de son indice.

    // Mesurer la taille d'un array:

        echo 'Taille du tableau : ' . count($couleur) . '<br>';  // Compte le nombre d'element dans l'array couleur. Ici 3.
        echo 'Taille du tableau : ' . sizeof($couleur) . '<br>';  // Compte le nombre d'element dans l'array couleur. Ici 3.

    // Transformer un array en string:

        $chaine = implode('-', $couleur);   // Implode() rassemble les elements d'un array en une chaine séparé par le séparateur "-" ici.
        echo $chaine . '<br>';
        $couleur2 = explode('-', $chaine);  // Transforme une chaine en array en séparant les elements grace au séparateur indiqué. Ici un "-". $couleur2 est un array aux indices numérique.

// --------------------------------------
echo '<h2> La boucle foreach pour parcourir les arrays </h2>';
//---------------------------------------
    // La boucle foreach est un moyen simple de passer en revue un tableau. Elle fonctionne uniquement sur les arrays et les objet et elle a l'avantage d'etre automatique, s'arretant quand il n'y a plus d'element.
    foreach($tab as $valeur){   // La variable $valeur (que l'on appelle comme on veut) recupere a chaque tour de boucle les valeurs qui sont parcourues dans l'array $tab. ["<parcourt l'array $tab par ses valeurs"].
        echo $valeur . '<br>';
    }

    foreach($tab as $indice => $valeur){    // On parcourt l'array $tab par ses indices auxquels on associe les valeurs. Quand il y a deux variables, la 1ere parcourt la colonne des indices et la seconde la colonne des valeurs. Ces variables peuvent avoir n'importe quel nom.'
        echo $indice . ' Correspond à ' . $valeur . '<br>';
    }

// --------------------------------------
echo '<h2> Les arrays multidimensionnels </h2>';
//---------------------------------------
    $tab_multi = array(
        0 => array('prenom' => 'Julien', 'nom' => 'Dupon', 'telephone' => '06 00 00 00 00'),
        1 => array('prenom' => 'Nicolas', 'nom' => 'Duran', 'telephone' => '06 00 00 00 00'),
        2 => array('prenom' => 'Pierre', 'nom' => 'Duchemol')
    );
    echo '<pre>'; print_r($tab_multi); echo '</pre>';

    // Acceder a la valeur Julien:
        echo$tab_multi[0] ['prenom'] . '<br>';  // Affiche Julien: nous entrons d'abord à l'indice 0 pour aller ensuite dans l'autre tableau à l'indice 'prenom'. Notez que 'prenom' est un string.

    // Parcourir le tableau multidimensionnel avec une boucle for:
        for($i=0; $i < count($tab_multi); $i++){
            echo $tab_multi[$i] ['prenom'] . '<br>';
        }

        echo '<br>';
    // Exercice: Afficher les prenoms avec une boucle foreach:
        foreach($tab_multi as $indice => $valeur){
            // Version 1: en passant par l'indice.
            echo $tab_multi [$indice] ['prenom'] . '<br>';

            // Version 2: en passant par la valeur:
            echo $valeur['prenom'] . '<br>';
        }

// --------------------------------------
echo '<h2> Les inclusions de fichiers </h2>';
//---------------------------------------
    echo 'Première inclusion';
    include('exemple.inc.php');  // On inclus le fichier dont le chemin est psécifié ici.

    echo ' <br>Deuxieme inclusion';
    include_once('exemple.inc.php');    // Avec le once, on vérifie d'abord si le fichier n'est pas déja inclus avant de faire l'inclusion ( évite par exemple de redéclarer des fonctions en incluant deux fois le même fichier).
    
    echo '<br>Troisieme inclusion';
    require ('exemple.inc.php');    // Require fait la même chose que include mais genère une erreur de type fatale s'il ne parvient pas a inclure le fichier qui interrompt l'execution du script. En revanche, include genere une erreur de type Warning dans ce cas, ce qui n'interrompt pas la suite de l'execution du script.

    echo '<br>Quatrieme inclusion';
    require_once('exemple.inc.php');    // Avec le once, on verifie d'abord si le fichier n'est pas deja inclus avant de faire l'inclusion.

    // Le ".inc" du nom du fichier inclus est là à titre indicatif pour préciser qu'il s'agit d'un fichier inclus et non pas d'un fichier directement utilisé.

// --------------------------------------
echo '<h2> Introduction aux objets </h2>';
//---------------------------------------
    // Un objet est un autre type de donnée. Un objet est issu d'une classe qui possède des attributs (encore appelé propriétés) et des methodes (equivalent de fonction).

    // L'objet créé à partir d'une classe, peut acceder à ces attributs et ces methodes.

    // Exemple avec un personnage de type 'Etudiant':
        class Etudiant{
            public $prenom = 'Julien';  // Public pour préciser que l'element est accessible partout et donc en dehors de la class.
            public $age = 25;   // $age est un attribut  ou propriété.
            public function pays(){  // Methode appellé pays.
                return 'France';
            }
        }

        $objet = new Etudiant();   // New permet de créé un nouvel objet: on instancie la class Etudiant en un objet appelé $objet. $objet est une instance de la class Etudiant.
        echo '<pre>'; print_r($objet); echo '<pre>';    // On regarde le contenu de $objet: on voit son type et la class dont il est issu.

        // Afficher le prénom de l'etudiant $objet:
            echo $objet -> prenom . '<br>';  // Nous pouvons acceder a une propriété d'un objet en mettant une fleche "->". Affiche "Julien".

        // Afficher le pays via la methode pays();
            echo $objet->pays() . '<br>';   // On appelle la methode pays() avec ses parentheses: elle nous retourne 'France'.

        // Contexte: Sur un site, une class Panier contiendra les propriétés et les methodes nécessaires au fonctionnement du panier d'achat:
            class Panier{
                public function ajout_article($article){
                    // Instructions qui ajoute le produit au panier
                    return "L'article $article a bien été ajouter au panier <br>";
                }
            }

        // Lorsqu'on clic sur le bouton "ajout au panier":
            $panier = new Panier();  // On crée un panier vide dans un premier temps.
            echo $panier->ajout_article('Pull');    // Puis on ajoute un Pull au panier en appelant la methode "ajout_article()".
?>




