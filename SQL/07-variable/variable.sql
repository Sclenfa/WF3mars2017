--********************************
-- Les variables en SQL
--********************************
    -- Une variable est un espace mémoire nommé qui permet de conserver une valeur.
    -- Permet d'obsrver les variables systemes:
        SHOW VARIABLES;
        SELECT @@version;   -- On met deux @ pour acceder a une variable système.
    
    -- Determiner nos propres variables:
        SET @ecole = 'WF3';  -- Déclare une variable ecole et lui affecte la valeur 'WF3'.
        SELECT @ecole;  -- On peut acceder au contenu de cette variable par son nom.