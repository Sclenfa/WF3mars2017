--*************************************
-- Transactions
--*************************************
    -- Une transaction permet de lancer une requetes, telles que des modifications et de les annuler si besoin comme si vous pouviez faire un "CTRL-Z" dans votre BDD.

    -- Transaction simple:
        START TRANSACTION;  -- Démarre la transaction.
        UPDATE employes SET prenom = 'Link' WHERE id_employes = 739;
        ROLLBACK;   -- Donne l'ordre a MySQL d'annuler la transaction, l'employé reprennant son prenom.
        COMMIT;  -- Valide l'ensemble de la transaction.

    -- Si on ne fait ni ROLLBACK ni COMMIT avant la déconnexion au SGBD, c'est un ROLLBACK qui s'effectue par defaut.

    -- Transaction avancée:
        START TRANSACTION;
        SAVEPOINT point1;   -- Point de sauvegarde appelé "point1".
        UPDATE employes SET prenom = "Julien A" WHERE id_employes = 699;
        SAVEPOINT point2;   -- Point de sauvegarde appelé "point2".
        UPDATE employes set prenom = 'Julien B' WHERE id_employes = 699;
        ROLLBACK TO point2;  -- Pour annuler une partie de la transaction: retour au point2 => on garde "Julien A"" en base.
        ROLLBACK;   -- Pour annulé toute la transaction => on garde "Julien" an base.
        COMMIT;  -- Valide l'ensemble de la transaction.