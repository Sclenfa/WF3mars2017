--******************************
-- Création de la BDD
--******************************

    CREATE DATABASE bibliotheque;

    USE bibliotheque;

        -- Copie/colle le contenu de la bibliotheque.sql dans la console

--******************************
-- Exercices
--******************************
    -- 1. Quel est l'id_abonne de Laura ?
        SELECT id_abonne FROM abonne WHERE prenom = 'Laura';

    -- 2. L'id_abdonne 2 est venu emprunter un livre à quelles dates ?
        SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

    -- 3. Combien d'emprunt on été effectué en tout ?
        SELECT  COUNT(id_emprunt) FROM emprunt;

    -- 4. Combien de livre sont sortis le 2011-12-19 ?

    -- 5. Une Vie est de quel auteur ?

    -- 6. De combien de livre d'Alexandre Dumas dispose-t-on ?

    -- 7. Quel id_livre est le plus emprunté?

    -- 8. Quel id_abonne emprunte le plus de livres ?
