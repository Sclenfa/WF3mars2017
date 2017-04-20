--*******************************
-- Tables virtuelles: Vues
--*******************************
    -- Les vues (ou tables virtuelles) sont des objets de la BDD constitué d'un nom et d'une requete de selection.
    -- Une fois une vue défninie, on peut l'utiliser comme on le ferait avec une table, laquelle serait constitué des données selectionnées par la requete définissant la vue.

    -- Création d'une vue:
        CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe ='m';   -- Crée une table virtuelle (ou vue) remplie avec les données du SELECT

    -- une seconde requete effectué sur la vue:
        SELECT prenom FROM vue_homme;   -- On peut effectuer toutes les opérations habituelles sur cette table virtuelle vue_homme.

    -- Si il y a un changement dans la table d'origine, la vue est corrigé dinamiquement car elle enregistre la requete SELECT qui pointe vers la table d'origine. Inversement, si il y a un changement dans la table virtuelle, il s'impacte dans la table d'origine.
    -- Il y a interet à faire des vues en termes de gain de ressource ou quand il y a des requetes complexes a executer.

    -- Supprimer une vue:
        DROP VIEW vue_homme;

--*******************************
-- Tables temporaires
--*******************************
    -- Créer une table temporaire:
        CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe = 'f';    -- Crée une table temporaire avec les données du SELECT précisé. Cette table s'éfface quand on quitte la session. Elle n'est pas visible dans la liste des tables avec SHOW TABLES.

        -- Utiliser une table temporaire:
            SELECT prenom FROM temp;    -- Affiche les prenom de la table temporaire temp.
    
    -- Contrairement aux tables virtuelles, s'il y a un changement dans la table d'origine, il n'est pas impacté dans la table temporaire car celle-ci est une copie a l'instant T: les données sont dupliquées.