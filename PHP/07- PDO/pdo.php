<?php
//**************************************
// PDO
//**************************************
    // L'extension PHP Data Object (PDO) définit une interface pour acceder a une BDD depuis PHP.

//**************************************
//01. Connexion
//**************************************
    echo '<h1>01. Connexion</h1>';
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    // $pdo est un objet issu de la class prédéfini PDO: il représente la connexion à la BDD.
    // Les arguments passé à PDO: 
        // - driver + serveur + nom de la BDD
        // pseudo du SGBD
        // mdp du SGBD
        // options: option 1 pour générer l'affichage des erreurs, option 2 = commande a executé lors de la connexion au serveur qui defini le jeu de caractère des échanges avec la BDD.
        print_r($pdo);
        echo '<pre>'; print_r(get_class_methods($pdo)); echo '<pre>';   // Permet d'afficher les methodes disponible dans l'objet $pdo.

//**************************************
//02. exec() avec INSERT, UPDATE et DELETE
//**************************************
    echo '<h1>02. exec() avec INSERT, UPDATE et DELETE</h1>';
    // $resultat = $pdo->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Tartempion', 'm', 'informatique', '2017-04-25', 300)");
    // exec() est utilisé pour formulé des requetes ne retournant pas de jeu de resultat: INSERT, UPDATE et DELETE.

    // Valeur de retour:
        // Succes: un integer correspondant au nombre de ligne affectées.
        // Echec: false.


    // echo "nombre d'enregistrement affecté par l'INSERT: $resultat <br>";
    echo 'dernier id généré: ' .$pdo->lastInsertId() . '<br>';

    $resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");
    echo "Nombre d'enregistrement affectés par l'UPDATE: $resultat <br>";

//**************************************
//03. query() avec SELECT + fetch
//**************************************
    echo '<h1>03.query() avec SELECT + fetch</h1>';

    $result = $pdo ->query("SELECT * FROM employes WHERE prenom = 'daniel'");
    // Avec query $result est un objet issu de la classe prédefini PDOStatement

    /* 
        Au contraire d'exec(), query() est utilisé pour la formulation de requêtes tournant un ou plusieurs résultats :SELECT.$_COOKIE
        
        Valeur de retour :
            Succès : objet PDOStatement
            Echec : false

        Notez qu'avec query on peut aussi utiliser INSERT, UPDATE et DELETE.
    */

    echo '<pre>'; print_r($result); echo '<pre>';
    echo '<pre>'; print_r(get_class_methods($result)); echo '<pre>';    // on voit les nouvelles méthodes de la classe $PDOStatement

    // $result constitue le résultat de la requête sous forme inexploitable directement : il faut donc le transformer par la méthode fetch() :
        $employe = $result->fetch(PDO::FETCH_ASSOC); // la méthode fetch avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $result en un array associatif exploitable indexé avec le nom des champs de la requête

        echo '<pre>'; print_r($employe); echo '<pre>';
        echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service] <br>";

    // Ou encore faire un fetch selonl'une des méthodes suivantes :
        $result = $pdo ->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        $employe = $result->fetch(PDO::FETCH_NUM);     // pour obtenir un array indexé numériquement
        echo '<pre>'; print_r($employe); echo '<pre>';
        echo $employe[1];   // on accède au prénom par l'indice 1 de l'aray $employe

    //---
        $result = $pdo ->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        $employe = $result->fetch();    // pour un mélange de fetch_assoc et fetch_num
        echo '<pre>'; print_r($employe); echo '<pre>';

    //---
        $result = $pdo ->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        $employe = $result->fetch(PDO::FETCH_OBJ); // retourne un nouvel objet avec les noms de champs comme propriétés (=attributs) public.
        echo '<pre>'; print_r($employe); echo '<pre>';
        echo $employe->prenom;      // affiche la valeur de la propriété prénom de l'objet $employe

    // Attrention : il faut choisir l'un des fetch que vous voulez exécuter sur un jeu de résultats, vous ne pouvez pas faire plusieurs fetch sur le même résultat n'en contenant qu'une seule. En effet cette méthode déplace un curseur de lecture sur le résultat suivant contenu dans le jeu de résultats :ainsi quand il n'y en a qu'un seul on sort du jeu.

    // Exercice : afficher le service de l'employée Laura selon deux méthodes différentes de votre choix

        $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
        $employe = $result->fetch(PDO::FETCH_NUM);
        echo '<pre>'; print_r($employe); echo '</pre>';
        echo $employe[0];

        $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
        $employe = $result->fetch(PDO::FETCH_OBJ);
        echo '<pre>'; print_r($employe); echo '</pre>';
        echo $employe->service;

        $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
        $employe = $result->fetch(PDO::FETCH_ASSOC);
        echo '<pre>'; print_r($employe); echo '</pre>';
        echo $employe['service'];

//**************************************
//04. While et fetch_assoc
//**************************************
    echo '<h1>04. While et fetch_assos</h1>';
    $resultat = $pdo->query("SELECT * FROM employes");
    echo 'Nombre d\'employés: ' . $resultat->rowCount() . '<br>';   // Permet de compté le nombre de lignes retournées par la requete.
    while ($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){  // fetch() retourne la ligne suivante du jeu de resultat en array associatif. La boucle while permet de faire avancer le curseur dans le jeu de resultat et s'arrete quand il est a la fin des resultats.
        // echo '<pre>'; print_r($contenu); echo '<pre>';  // On voit que $contenu est un array associatif qui contient les données de chaque ligne du jeu de resultat. Le nom des indices correspond aux noms des champs.
        echo $contenu['id_employes'] . '<br>';
        echo $contenu['prenom'] . '<br>';
        echo $contenu['nom'] . '<br>';
        echo $contenu['sexe'] . '<br>';
        echo $contenu['service'] . '<br>';
        echo $contenu['date_embauche'] . '<br>';
        echo $contenu['salaire'] . '<br>';
        echo '-----------------<br>';
    }
    // Quand vous faites une requete qui ne sort qu'un seul resultat: pas de boucle while mais un fetch seul.
    // Quand vous avez plusieurs resultat dans la requete: on fait une boucle while pour parcourir tout les resultat.

//**************************************
//05. fetchAll()
//**************************************
    echo '<h1>05. fetchAll()</h1>';

    $resultat = $pdo->query("SELECT * FROM employes");
    $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);   // retourne toutes les lignes de resultat dans un tableau multidimensionnel sans faire de boucle: vous avez un array associatif a chaque indice numerique. Marche aussi avec fetch_num.
    echo '<pre>'; print_r($donnees); echo '<pre>';
    
    // Pour lire le contenu d'un array multidimensionnel, nous faisont des boucles foreach imbriqué.
        echo '<strong>Double boucle foreach</strong><br>';
        foreach ($donnees as $contenu) {    // $contenu est un sous-array associatif.
            foreach ($contenu as $indice => $value) {   // On parcourt donc chaque sous-array.
                echo $indice . ' correspond à ' . $value . '<br>';
            }
            echo '-----------------<br>';
        }

//**************************************
//06. Exercice
//**************************************
    echo '<h1>06. Exercice</h1>';
    // Afficher la liste des bases de données présentent sur votre SGBD dans une liste <ul><li>.
    // Pour mémoire, la requete SQL est SHOW DATABASES.

    $liste = $pdo ->query("SHOW DATABASES");
    $bdd = $liste->fetchAll(PDO::FETCH_ASSOC);
    foreach($bdd as $indice){
        foreach($indice as $contenu => $value){
            echo "<ul><li>$value</li></ul>";
        }
    }
    echo '<hr>';

    $liste = $pdo ->query("SHOW DATABASES");
    while($donnees = $liste->fetch(PDO::FETCH_ASSOC)){
        echo '<ul><li>'. $donnees['Database'] .'</li></ul>';
    }
    
//**************************************
//07. Table HTML
//**************************************
    echo '<h1>07. Table HTML</h1>';
    $resultat = $pdo->query("SELECT*FROM employes");

    echo '<table border = "1">';
        // Affichage de la ligne d'entete:
        echo '<tr>';
            for($i = 0; $i < $resultat->columnCount(); $i++){
                echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '<pre>';  // Pour voir ce que retourne la methode getColumnMEta(): un array avec notament l'indice name qui contient le nom du champs.
                $colonne=$resultat->getColumnMeta($i);   // $colonne est un array qui contient l'indice name.
                echo '<th>' .$colonne['name'] . '</th>';    // L'indice name contient le nom du champ.
            }
        echo '</tr>';

        // Affichage des autres lignes:
            while($ligne=$resultat->fetch(PDO::FETCH_ASSOC)){
                echo '<tr>';
                    foreach($ligne as $information){
                        echo '<td>' .$information . '</td>';
                    }
                echo '</tr>';
            }



    echo '</table>';

//**************************************
//08. Requete préparé: prepare() + bindParam() + execute()
//**************************************
    echo '<h1>08. Requetes preparés: prepare() + bindParam() + execute()</h1>';
    $nom = 'Sennard';

    // Préparation de la requete:
        $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");   // On prépare la requete sans l'executer avec un marqueur nominatif ecrit :nom.

    // On donne une valeur au marquer :nom.
        $resultat->bindParam(':nom', $nom, PDO::PARAM_STR);  // Je lie le marqueur :nom à la variable $nom. Si on change le contenu de la variable, la valeur du marqueur changera automatiquement si on fait plusieurs execute().

    // On execute la requete:
        $resultat->execute();
        $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
        echo implode($donnees, '/');    // Implode transforme l'array en string.

        // Prepare() renvoie toujours un objet PDOstatement
        // execute() renvoie:
            // - Succes: un objet PDOstatement
            // - Echec: false
        // Les requetes préparé sont à preconiser si vous executez plusieurs fois la même requete (par exemple dans une boucle), ainsi éviter le cycle complet analyse / interpretation / execution de la requete.

        // Par ailleurs, les requetes préparées sont souvent utilisées pour assainir les données en forcant le type de valeurs communiquées aux marqueurs.

//**************************************
//09. Requete préparé: prepare() + bindValue() + execute()
//**************************************
    echo '<h1>09. Requetes preparés: prepare() + bindValue() + execute()</h1>';
    $nom = 'Thoyer';

        // On prépare la requete:
            $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");

        // On lie le marqueur à une valeur:
            $resultat->bindValue(':nom', $nom, PDO::PARAM_STR);  // BindValue() recoit une variable ou un string. Le marqueur pointe uniquement vers la valeur: si celle-ci change, il faudra refaire un binedValue() pour prendre en compte cette nouvelle valeur lors d'un prochain execute().

        // On execute la requete:
            $resultat->execute();
            $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
            echo implode($donnees, '/');

        // Si on change la valeur de la variable $nom, sans faire un nouveau bindValue, le marqueur de la requete pointe toujours vers 'Thoyer':
            $nom = 'Durand';
                $resultat->execute();
                $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
                echo implode($donnees, '/');    // En effet, on obtient encore les informations de Thoyer et non pas de Durand.

//**************************************
//10. Exercice
//**************************************
    echo '<h1>10. Exercices</h1>';
    // Apres avoir importé la BDD "bibliotheque", affichez dans une liste <ul><li> les livres empruntés par Chloé (il y en a plusieurs...), en utilisant une requete préparé.

    $pdo2 = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $prenom = 'Chloe';

    $result = $pdo2 ->prepare("SELECT l.titre, l.auteur FROM livre l INNER JOIN emprunt e ON l.id_livre = e.id_livre INNER JOIN abonne a ON e.id_abonne = a.id_abonne WHERE a.prenom = :prenom");
    $result->bindParam(':prenom', $prenom, PDO::PARAM_STR);  // On peut aussi avoir PDO::PARAM_INT ou PDO::PARAM_BOOL.
    
    $result->execute();  // On obtient un objet issu de la classe prédéfinie PDOstatement (= 1 résultat de requete).

    echo '<ul>';
    while($donnees = $result->fetch(PDO::FETCH_ASSOC)){
        echo "<li> $donnees[titre], de l'auteur $donnees[auteur]</li>";
    }
    echo '</ul>';


//**************************************
//11. FETCH_CLASS
//**************************************
    echo '<h1>11. FETCH_CLASS</h1>';

    class Employes{
        public $id_employes;
        public $prenom;
        public $nom;
        public $sexe;
        public $service;
        public $date_embauche;
        public $salaire;    // On déclare autant de propriété qu'il y a de champs dans la table employes. L'orthographe des propriétés DOIT etre identique à celle des champs.
    }

    $result = $pdo->query("SELECT * FROM employes");
    $donnees = $result->fetchAll(PDO::FETCH_CLASS, 'Employes');  // On obtient un array multidimensionnel indicé numériquement, qui contient à chaque indice un objet issu de la classe Employés;
    echo '<pre>'; print_r($donnees); echo '<pre>';

    // On affiche le contenu de $donnees avec une boucle foreach:
        foreach($donnees as $employe){
            echo $employe->prenom . '<br>';
        }

//**************************************
//12. Points complementaires
//**************************************
    echo '<h1>12. Points complementaires</h1>';

    echo '<strong>Le marqueur "?"</strong><br>';
        $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom=? AND prenom=?");   // On prepare dans un premier temps la requete sans sa partie variable que l'on represente avec des marqueurs sous forme de "?".
        $resultat->execute(array('Durand', 'Damien'));  // Durand va remplacer le premier "?" et Damien le second.
        $donnees = $resultat->fetch(PDO::FETCH_ASSOC);  // Pas de boucle while car on sais qu'il n'y a qu'un seul résultat dans cette requete.

        echo implode($donnees, '/');    // Notez que nous faisons implode ici pour aller plus vite et eviter de faire un affichage dans une boucle.

    echo '<br>';
    echo '<br>';
    echo '<strong>On peut faire un execute() sans bindParam()</strong><br>';
        $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom=:nom AND prenom=:prenom");
        $resultat->execute(array('nom' => 'Chevel', 'prenom'=> 'Daniel'));  // Notez  que nous ne sommes pas obligés de mettre les ":" devant les marqueurs.
        $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
        echo implode($donnees, '/');

    echo '<br>';
    echo '<br>';
    echo '<strong>Afficher une erreur de requete SQL</strong><br>';
        $resultat = $pdo->prepare("SELECT * FROM azerty WHERE nom='Durand'");
        $resultat->execute();
        echo '<pre>'; print_r($resultat->errorInfo()); echo '<pre>';    // errorInfo() est une methode qui appartient à la classe PDOStatement et qui fournit des infos sur l'erreur SQL eventuellement produite. On trouve le message de l'erreur à l'indice [2] de l'array retourné par cette methode.


//**************************************
//13. MySQLI
//**************************************
    echo '<h1>13. MySQLI</h1>';

    // Il existe une autre manière de ce connecté a une BDD et d'effectuer une requete sur cell-ci: l'extension MySQLI.

    // Connexion à la BDD:
        $mysqli=new Mysqli('localhost', 'root', '', 'entreprise');

    // Un exemple de requete:
        $requete=$mysqli->query("SELECT*FROM employes");

    // Notez que les objets $mysqli (issu de la classe predefini Mysqli) et $requete (issu de la classe Mysqli_result) ont des propriété et des methodes differentes de PDO. Nous ne pouvons donc pas les melangers les uns avec les autres.

//****************************************************************
