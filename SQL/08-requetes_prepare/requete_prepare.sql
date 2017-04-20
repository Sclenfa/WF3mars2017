--***********************************
-- Requetes préparées
--*************************************
    -- Les requetes préparées sont des requetes qui dissocient les phases d'Analyse / Interpretation / Execution. La préparation de la requete consiste à réaliser les étapes d'analyse et d'interpretation. Ensuite on effectue l'execution à part.

    -- La séparation des phases permet de faire des gains de performance quand une requete doit etre executée une multitude de fois. En effet, on execute qu'une seule  fois les 2 premières phases et X fois la dernière.
    -- Requete préparé sans marqueur:

        -- 1-Préparation:
            PREPARE req FROM "SELECT * FROM employes WHERE service = 'commercial'";  -- Déclare une requete préparé.

        -- 2- Execution de la requete:
            EXECUTE req;    -- On peut executer la requete plusieurs fois sans refaire le cycle analyse / interpretation => gain de performance
        
    -- Requete préparé avec un marqueur "?":

        -- 1- Préparation
            PREPARE req2 FROM "SELECT * FROM employes WHERE prenom = ?";    -- le "?" est un marqueur qui attend une valeur.

        -- 2- Execution:
            SET @prenom = 'Emilie';  -- Déclare et affecte la variable prenom.
            EXECUTE req2 USING @prenom;  -- On execute la requete en utilisant la variable prenom.

    -- Supprimer une requete préparé:
            DROP PREPARE req2;

        -- Les requetes préparés ont une durée de vie courte: elles sont supprimées dès que l'ont quitte la session.