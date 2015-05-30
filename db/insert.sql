
INSERT INTO `membres` (`id`, `nom`, `prenom`, `annee_naissance`, `password`, `login`,`argent`) VALUES
(1, 'del', 'mathieu', 1995, '0', 'mat', 0),
(2, 'delalande', 'mathieu', 1995, 'f', 'mathieu', 0),
(3, 'Delalande', 'Mathieu', 1995, 'admin', 'admin', 0);

INSERT INTO `trajets` (`id`, `ville_depart_id`, `ville_arrivee_id`, `date`, `heure`, `nbr_places_disponibles`, `nbr_places_reservees`, `prix`, `membres_id`) VALUES
('', 2, 3, '2015-05-27', '16', 2, 0, 30, 1),
('', 2, 1, '2015-05-23', '15', 3, 0, 20, 1),
('', 4, 5, '2015-05-23', '17', 2, 0, 30, 1),
('', 5, 6, '2015-05-23', '16', 2, 0, 30, 1),
('', 6, 3, '2015-05-13', '0', 1, 0, 54, 1),
('', 11, 2, '2015-05-30', '8', 4, 0, 40, 1),
('', 10, 2, '2015-05-15', '0', 1, 0, 5, 1),
('', 3, 5, '2015-05-15', '0', 1, 0, 5, 1),
('', 7, 10, '2015-05-29', '7', 3, 0, 41, 1),
('', 9, 2, '2015-05-13', '0', 1, 0, 4, 1);

INSERT INTO `vehicules` (`id`, `marque`, `couleur`, `modele`, `annee_mise_en_circulation`, `membres_id`) VALUES
(1, 'renault', 'noir', 'scenic', 2006, 1);

INSERT INTO `villes` (`id`, `nom`) VALUES
(1, 'Troyes'),
(2, 'Rennes'),
(3, 'Tours'),
(4, 'Paris'),
(5, 'Lille'),
(6, 'Lyon'),
(7, 'Nantes'),
(8, 'Toulouse');