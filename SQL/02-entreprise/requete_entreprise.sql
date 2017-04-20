-- Ouvrir la console SQL sous XAMPP:
--      cd c:\xampp\mysql\bin
--      mysql.exe -u root --password


-- ligne de commentaire en SQL débute par --
-- les requetes ne sont pas sensible a la casse, mais une convention indique qu'il faut mettre les mots clé des requetes en majuscule.

--*************************************
-- Requetes générales
--*************************************

        CREATE DATABASE entreprise;   -- Créer une nouvelle BDD appelée "entreprise"

        SHOW DATABASES; -- Permet d'afficher les BDD disponibles

    -- NE PAS SAISIR DANS LA CONSOLE :

        DROP DATABASE entreprise;   -- Supprime la BDD entreprise

        DROP table employes;    -- Supprime la table employés

        TRUNCATE employes;  -- Vide la table employés de son contenu

    -- On peut coller dans la console:

        USE entreprise;  -- Se connecter a la BDD entreprise

        SHOW TABLES;    -- Permet de lister les tables de la BDD en cours d'utilisation

        DESC employes;  -- Observer la structure de la table ainsi que les champs

--*************************************
--Requetes de selection
--*************************************

        SELECT nom, prenom FROM employes;   -- Affiche ( selectionne) le nom et le prénom de la table employés: SELECT selectionne les champs indiqués, FROM la ou les tables utilisées.

        SELECT service FROM employes;   -- Affiche les services de l'entreprise

    -- DISTINCT:
        -- On a vu dans la requete precedente que les services sont affichés plusieurs fois. Pour éliminer les doublons on utilise DISTINCT:

        SELECT DISTINCT service FROM employes;

    -- ALL ou * :
        -- On peut afficher toutes les informations issues d'une table avec une " * " (pour dire ALL)

        SELECT * FROM employes;   -- Affiche toutes la table employés

    -- clause WHERE:
        SELECT prenom, nom FROM employes WHERE service = 'informatique';    -- Affiche le prénom et le nom des employés du service informatique. Notez que les noms des champs ou des tables ne prennent pas de guillemet, alor que les valeurs telle que 'informatique' prennent en prennent. Cependant, s'il sagit d'un chiffre on ne lui en met pas.

    -- BETWEEN:

        SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31';  --Affiche les employés dont la date d'embauche et entre 2006 et 2010'

    -- LIKE:

        SELECT prenom FROM employes WHERE prenom LIKE 's%';  -- Affiche les prénoms des employés commancant par "s". Le signe % est un joker qui remplace les autres caractères.

        SELECT prenom FROM employes WHERE prenom LIKE '%-%';  -- Afficher les prénoms des employés qui contiennent un tiret. LIKE est utilisé entre-autre pour les formulaire de recherche sur les sites.

    -- Opérateurs de comparaisons:

        SELECT prenom, nom, service FROM employes WHERE service != 'informatique';   -- Affiche le prénom et le nom des employés n'etant pas du service informatique.

    -- = égale
    -- < inferieur
    -- > superieur
    -- <= inferieur ou égal
    -- >= superieur ou égal
    -- != ou encore <> pour different de

    -- ORDER BY pour faire des tris:

        SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire;    -- Affiche les employés par salaire en ordre croissant par defaut

        SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire ASC, prenom DESC;   -- ASC pour un tri ascendant, DESC pour un tri descendant. Ici on tri les salaires par ordre croissant puis a salaire identique, les prénom par ordre décroissant.

    -- LIMIT:
        SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1;  -- Affiche l'employé ayant le salaire le plus elevé: On tri d'abord les salaires par ordre decroissant (pour avoir le plus elevé en premier), puis on limite le résultat au premier enregistrement avec LIMIT 0.1. Le 0 signifie le point de LIMIT et le 1 signifie prendre un enregistrement. On utilise LIMIT dans la pagination sur les sites.

    -- L'alias avec AS:

        SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes;   -- Affiche le salaire sur 12 mois des employés. Salaire_annuel est un alias qui affiche la valeur de ce qui précéde.

    -- SUM:

        SELECT SUM(salaire*12) FROM employes;   -- Affiche le salaire total annuel de tout les employés. SUM permet d'additionner les valeurs de champs differents.

    -- MIN et MAX:

        SELECT MIN(salaire) FROM employes;  -- Affiche le salaire le plus bas.
        SELECT MAX(salaire) FROM employes;  -- Affiche le salaire le plus haut.

        SELECT prenom, MIN(salaire) FROM employes;  -- Ne donne pas le résultat attendu car affiche le premier prénom dans la table (Jean-Pierre). Il faut pour répondre a cette question ORDER BY et LIMIT comme au dessus.
        SELECT prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

    -- AVG (Average):

        SELECT AVG(salaire) FROM employes;  -- Affiche le salaire moyen de l'entreprise.

    -- ROUND:

        SELECT ROUND(AVG(salaire), 1) FROM employes;    -- Affiche le salaire moyen arrondi a un chiffre apres la virgule.

    -- COUNT:

        SELECT COUNT(id_employes) FROM employes WHERE sexe= 'f';    -- Affiche le nombre d'employé féminin.

    -- IN:

        SELECT prenom, service FROM employes WHERE service IN('comptabilité', 'informatique');  -- Affiche les employés appartenant a la comptabilité ou a l'informatique.

    -- NOT IN:

        SELECT prenom, service FROM employes WHERE service NOT IN('comptabilité', 'informatique');  -- Affiche les employés n'appartenant pas a la comptabilité ou a l'informatique.

    -- AND et OR:

        SELECT prenom, service, salaire FROM employes WHERE service = 'commercial' AND salaire <= 2000;  -- Affiche le prénom des commerciaux dont le salaire est inferieur ou égal a 2000.
        SELECT prenom, service, salaire FROM employes WHERE (service = 'production' AND salaire = 1900) OR salaire = 2300;  -- Affiche les employés du service production dont le salaire est de 1900, ou dans les autres services ceux qui gagnent 2300.

    -- GROUP BY:

        SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service;   -- Affiche le nombre d'employés par service. GROUP BY distribue le resultat du comptage par les services correspondant.

    -- GROUP BY ... HAVING:

        SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service  HAVING nombre > 1;  -- Affiche les services ou il y a plus d'un employé. HAVING remplace WHERE dans un GROUP BY.

--*************************************
-- Requetes d'insertion
--*************************************

    SELECT * FROM employes;  -- On observe la table avant de la modifié

    INSERT INTO employes(id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES(8059, 'Alexis', 'Richy', 'm', 'informatique', '2011-12-28', 1800);  -- Insertion d'un employé. Notez que l'ordre des champs énoncés entre parenthèses doit etre le même pour que les valeurs correspondent.

    -- Une requete sans précisé les champs à concerné:

        INSERT INTO employes VALUES(8060, 'test', 'test', 'm', 'test', '2012-12-28', 1800, 'valeur en trop');   -- Insertion d'un employé sans préciser la liste des champs si et seulement si le nmbre et l'ordre des valeurs attendues sont respectés  => ici erreur car valeur en trop.


--*************************************
--Requetes de modification
--*************************************

    -- UPDATE

        UPDATE employes SET salaire = 1870 WHERE nom = 'Cottet';   -- Modification du salaire pour l'employé de nom Cottet.
        UPDATE employes SET salaire = 1871 WHERE id_employes = 699;  -- Il est recommandé de faire des modifications de données par les ID car ils sont uniques. Cela evite d'update plusieurs enregistrement à la fois.
        UPDATE employes SET salaire = 1872, service = 'autre' WHERE id_employes = 699;  -- On modifie 2 valeurs dans la même requete.

        -- A ne pas faire (sauf cas contraire): un UPDATE sans clause WHERE:
            UPDATE employes SET salaire = 1870;  -- Ici les salaires de tous les employés passent à 1870

    -- REPLACE INTO
        REPLACE INTO employes(id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES(2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2600);  -- L'ID_employes 2000 n'existant pas, REPLACE se comporte comme un INSERT.
        REPLACE INTO employes(id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES(2000, 'test2', 'test', 'm', 'marketing', '2010-07-05', 3600);  -- Comme l'ID_employes existe, REPLACE se comporte comme un UPDATE.

--*************************************
--Requetes de suppression
--*************************************

    --DELETE
        DELETE FROM employes WHERE id_employes = 900;   -- Suppression de l'employé dont l'ID est 900.
        DELETE FROM employes WHERE service = 'informatique' AND id_employes != 802;  -- Supprime tout les informaticiens sauf 1 (ont l'ID est 802).
        DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990;  -- Supprime 2 employé qui n'ont pas de point commun. Il s'agit d'un OR et non pas d'un AND car un employé ne peut pas avoir deux id_employes differents.

        -- A ne pas faire: un DELETE sans clause WHERE:
            DELETE FROM employes;   -- Reviens a faire un TRUNCATE de table qui est irréversible.

---************************************
--Exercices
--*************************************

    -- 1. Afficher le service de l'employé 547.
        SELECT service FROM employes WHERE id_employes = 547;

    -- 2. Afficher la date d'embauche d'Amandine.
        SELECT date_embauche FROM employes WHERE prenom = 'Amandine';

    -- 3. Afficher le nombre de commerciaux
        SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

    -- 4. Afficher le coût des commerciaux sur 1 année.
        SELECT SUM(salaire*12) FROM employes WHERE service = 'commercial';

    -- 5. Afficher le salaire moyen par services
        SELECT service, AVG(salaire) FROM employes GROUP BY service;

    -- 6. Afficher le nombre de recrutement sur l'année 2010.
        SELECT COUNT(id_employes) AS nombre FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2011-01-01';
        SELECT COUNT(date_embauche) FROM employes WHERE date_embauche LIKE '2010%'; 

    -- 7. Augmenter le salaire de chaque employé de 100.
        UPDATE employes SET salaire = salaire + 100;

    -- 8. Afficher le nombre de service different
        SELECT COUNT(DISTINCT service) FROM employes;

    -- 9. Afficher le nombre d'employé par services
        SELECT service, COUNT(service) AS nombre FROM employes GROUP BY service;

    -- 10. Afficher les infos de l'employé du service commercial ayant le salaire le plus elevé.
        SELECT id_employes, nom, prenom, sexe, service, salaire FROM employes WHERE service = 'commercial' ORDER BY salaire DESC LIMIT 0,1;

    -- 11. Afficher l'employé ayant été embauché en dernier.
        SELECT nom, prenom FROM employes ORDER BY date_embauche DESC LIMIT 0,1;