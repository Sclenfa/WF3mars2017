--******************************
--Fonctions prédéfinies
--******************************
    -- Fonctions prédéfinies: prevue par le SQL et executée par le développeur.

    -- Dernier Id inséré:
        INSERT INTO abonne (prenom) VALUES ('test');
        SELECT LAST_INSERT_ID();    -- Permet d'afficher le dernier identifiant inséré.
    
    -- Fonctions de dates:
        SELECT*, DATE_FORMAT(date_rendu, '%d-%m-%Y') AS date_rendu_fr FROM emprunt;  -- Met les dates du champ date_rendu_fr au format français JJ-MM-AAAA.
        SELECT NOW();   -- Affiche la date et l'heure en cours.
        SELECT CURDATE();   -- Retourne la date du jour au format YYYY-MM-DD.
        SELECT CURTIME();   -- Retourne l'heure courante au format HH-MM-SS.

    -- Crypter un mot de passe avec l'algorithme AES:
        SELECT PASSWORD('mypass');  -- Affiche 'mypass' crypté par l'algorythme AES
        INSERT INTO abonne(prenom) VALUES(PASSWORD('mypass'));  -- Insère le mdp crypté en base

    -- Concaténation:
        SELECT CONCAT('a','b','c');  -- Concatène les trois chaines de caractères.
        SELECT CONCAT_WS('-','a','b','c');   -- Concat With Separator

    -- Fonctions sur les chaines de caractères:
        SELECT SUBSTRING('bonjour', 1,3);   -- Affiche 'bon' : compte 3 à partir de la position 1
        SELECT TRIM('      bonjour       ');    -- Supprime les espaces avant et après la chaine de caractères.
