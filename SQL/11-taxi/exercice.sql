--*******************************
--Exercices
--*******************************
    -- 1 Qui conduit la voiture d'id_vehicule 503 ?
        SELECT c.id_conducteur, prenom, nom FROM conducteur c INNER JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur WHERE id_vehicule = 503;

    -- 2 Qui (prenom) conduit quel model ?
        SELECT c.prenom, v.modele FROM conducteur c INNER JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur INNER JOIN vehicule v ON v.id_vehicule = a.id_vehicule WHERE id_association;

    -- 3 Insérez vous dans la table conducteur puis affichez tout les conducteurs (même ceux qui n'ont pas de vehicule affecté) ainsi que les modeles de vehicules.
        INSERT INTO conducteur (id_conducteur, prenom, nom) VALUES ('6', 'Cloud', 'Strife');
        SELECT c.prenom, nom, v.modele FROM conducteur c LEFT JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur LEFT JOIN vehicule v ON a.id_vehicule = v.id_vehicule;

    -- 4 Ajouter l'enregistrement suivant : INSERT INTO vehicule(marque, modele, couleur, immatriculation) VALUES ('Renault', 'Espace', 'noir', 'ZE-123-RT'); Affichez tout les models de vehicule y compris ceux qui n'ont pas de chauffeurs affecté et le prénom des conducteurs.
        SELECT v.marque, modele, c.prenom FROM vehicule v LEFT JOIN association_vehicule_conducteur a ON v.id_vehicule = a.id_vehicule LEFT JOIN conducteur c ON a.id_conducteur = c.id_conducteur;

    -- 5 Affichez les prenoms des conducteurs (y compris ceux qui n'ont pas de vehicule) et tout les modeles (y compris ceux qui n'ont pas de chauffeur).
        (SELECT c.prenom, v.modele FROM conducteur c LEFT JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur LEFT JOIN vehicule v ON a.id_vehicule = v.id_vehicule) UNION (SELECT c.prenom, v.modele FROM vehicule v LEFT JOIN association_vehicule_conducteur a ON v.id_vehicule = a.id_vehicule LEFT JOIN conducteur c ON a.id_conducteur = c.id_conducteur);
