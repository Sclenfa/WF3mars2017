--*******************************
-- Création de la BDD
--*******************************

    CREATE DATABASE bibliotheque;

    USE bibliotheque;

        -- Copie/colle le contenu de la bibliotheque.sql dans la console

--*******************************
-- Exercices
--*******************************
    -- 1. Quel est l'id_abonne de Laura ?
        SELECT id_abonne FROM abonne WHERE prenom = 'Laura';

    -- 2. L'id_abdonne 2 est venu emprunter un livre à quelles dates ?
        SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

    -- 3. Combien d'emprunt on été effectué en tout ?
        SELECT  COUNT(id_emprunt) FROM emprunt;

    -- 4. Combien de livre sont sortis le 2011-12-19 ?
        SELECT COUNT(date_sortie) FROM emprunt WHERE date_sortie = '2011-12-19';

    -- 5. Une Vie est de quel auteur ?
        SELECT auteur FROM livre WHERE titre = 'Une Vie';

    -- 6. De combien de livre d'Alexandre Dumas dispose-t-on ?
        SELECT COUNT(id_livre) FROM livre WHERE auteur = 'Alexandre Dumas';

    -- 7. Quel id_livre est le plus emprunté?
        SELECT id_livre, COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1;

    -- 8. Quel id_abonne emprunte le plus de livres ?
        SELECT id_abonne, COUNT(id_abonne) AS nombre FROM emprunt GROUP BY id_abonne ORDER BY nombre DESC LIMIT 0,1;


--*******************************
--Requetes imbriquées
--*******************************
    -- Syntaxe "aide mémoire" de la requete imbriquée:
        SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);
    -- Afin de réalisé une requete imbriquée, il faut obligatoirement un champ en commun entre les deux tables.

    -- Un champ NULL se teste avec IS NULL:
        SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;   -- Affiche les id_livre non-rendus.

        SELECT titre FROM livre WHERE id_livre IN(SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);   -- Affiche les titres de ces livres non-rendus.

        SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne from abonne WHERE prenom = 'Chloe');   -- Affiche le numero des livres que Chloé a emprunté. Quand il n'y a q'un seul résultat dans la requete imbriquée, on met le signe "=".

--*******************************
-- Exercices
--*******************************
    --Afficher le prenom des abonnés ayant emprunté un livre le 19-12-2011
        SELECT prenom FROM abonne  WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie = '2011-12-19');

    -- Afficher le prénom des abonnés ayant emprunté un livre d'Alphonse Daudet:
        SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN (SELECT id_livre FROM livre WHERE auteur = 'Alphonse Daudet'));

    -- Afficher le ou les titres de livre que Chloé a emprunté:
        SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe'));

    -- Afficher le ou les titre de livre que Chloé n'a pas encore rendu.
        SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe') AND date_rendu IS NULL);

    -- Combien de livre Benoit a emprunté
        SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Benoit');

    -- Qui (prénom) a emprunté le plus de livre
        SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 0,1);    -- Remarque: On ne peut pas utiliser LIMIT dans un IN mais obligatoirement dans un "="

--*******************************
--Jointures Interne
--*******************************
    -- Difference entre jointure et une requete imbriqué: Une requete imbriqué est possible seulement dans le cas ou les champs affichés (ceux qui sont dans le SELECT) sont issu de la même table.

    -- Avec une requete de jointure, les champs selectionnés peuvent etre issu de table differentes. Une jointure est une requete permettant de faire des relations entre les differentes tables afin d'avoir des colonnes ASSOCIEES qui ne forme qu'un seul résultat.

        SELECT a.prenom, e.date_sortie, e.date_rendu
        FROM abonne a
        INNER JOIN emprunt e
        ON a.id_abonne = e.id_abonne
        WHERE a.prenom = 'Guillaume';
        -- Affiche les dates de sortie et de rendu pour l'abonné Guillaume:

        -- 1ere ligne: Ce que je souhaite affichés.

        -- 2eme ligne: Premiere table d'ou proviennent les informations.

        -- 3eme ligne: La seconde table d'ou proviennet les informations.

        -- 4eme ligne: La jointure qui lie les deux tables avec le champ commun.

        -- 5eme ligne: La ou Les conditions supplementaires.

--*******************************
-- Exercices
--*******************************

    -- Nous aimerions connaitre les mouvements des livres (titre, date_sortie, date_rendu) écrit par Alphonse Daudet
        SELECT l.titre, e.date_sortie, e.date_rendu FROM livre l INNER JOIN emprunt e ON l.id_livre = e.id_livre WHERE l.auteur = 'Alphonse Daudet';

    -- Qui a emprunter "Une Vie" sur l'année 2011
        SELECT a.prenom FROM abonne a INNER JOIN emprunt e ON a.id_abonne = e.id_abonne INNER JOIN livre l ON l.id_livre = e.id_livre WHERE l.titre = 'Une Vie' AND e.date_sortie LIKE '2011%';

    -- Afficher le nombre de livres emprunter par chaques abonnés
        SELECT a.prenom, COUNT(e.id_livre) AS nombre_de_livres FROM abonne a INNER JOIN emprunt e ON a.id_abonne = e.id_abonne GROUP BY a.prenom;

    -- Qui a emprunté quel livre et à quel date de sortie (prenom date_sortie titre)
        SELECT a.prenom, e.date_sortie, l.titre
        FROM abonne a INNER JOIN emprunt e ON a.id_abonne = e.id_abonne INNER JOIN livre l ON e.id_livre = l.id_livre;  -- Ici pas de GROUP BY car il est normal que les prénoms sortent plusieurs fois (ils peuvent emprunter plusieurs livres).

    -- Afficher les prénoms des abonnés avec les id_livre qu'ils ont empruntés
        SELECT a.prenom, e.id_livre FROM abonne a INNER JOIN emprunt e ON a.id_abonne = e.id_abonne;

--*******************************
-- Jointures Externe
--*******************************
    -- Une jointure externe permet de faire des requetes sans correspondance exigée entre les valeurs requetées.

    -- Ajoutez-vous dans la table abbone:
        INSERT INTO abonne (prenom) VALUES('Laurent');

    -- Si on relance la dernière requete de jointure interne, nous n'apparaisont pas dans la liste car nous n'avons pas emprunter de livre.
    -- Pour y remedier, nous faisont une jointure externe.
        SELECT  a.prenom, e.id_livre FROM abonne a LEFT JOIN emprunt e ON a.id_abonne = e.id_abonne;
    
    -- La clause LEFT JOIN permet de rappatrié toutes les données dans la table considéré comme etant a gauche de l'instruction LEFT JOIN (donc abonne dans notre cas), sans correspondance exigée dans l'autre table (emprunt ici).

    -- Voici le cas avec un livre supprimé de la bibliotheque:
        DELETE FROM livre WHERE id_livre = 100;
    -- On visualise les emprunts avec une jointure interne:
        SELECT emprunt.id_emprunt, livre.titre FROM emprunt INNER JOIN livre ON emprunt.id_livre = livre.id_livre;  -- On ne voit pas dans cette requete le livre "Une Vie" qui a été supprimé.

    -- On visualise les emprunts avec une jointure externe:
        SELECT emprunt.id_livre, livre.titre FROM emprunt LEFT JOIN livre ON emprunt.id_livre = livre.id_livre;  -- Ici tout les emprunts sont affiché, y compris ceux pour lesquels les titres sont supprimés et remplacés par NULL.

--*******************************
--UNION
--*******************************
    -- Union permet de fusionner le résultat de deux requetes dans la même liste de résultat.

    -- Si on désinscrit Guillaume (suppression du profil de la table abonné), on peut afficher a la fois tous les livres empruntés, y compris ceux par des lecteurs désinscrit (on affiche NULL à la place de Guillaume) et tous les abonnés y compris ceux qui n'ont rien emprunté (on affiche NULL dans id_livre pour l'abonné "Laurent").

    -- Requete sur les livres empruntés avec UNION:
        (SELECT abonne.prenom, emprunt.id_livre FROM abonne LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne) UNION (SELECT abonne.prenom, emprunt.id_livre FROM abonne RIGHT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne);
