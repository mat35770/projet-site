INSERT INTO `membres`(`id`, `nom`, `prenom`, `mail`, `annee_naissance`, `password`, `login`)
VALUES (0,'del','mathieu','m@hotmail.fr',1995,'0','mat')

INSERT INTO trajets



INSERT INTO villes 
VALUES ('','Troyes'),
     ('','Rennes'),
     ('','Tours'),
     ('','Paris'),
     ('','Lille'),
     ('','Lyon');

INSERT INTO vehicules
VALUES (1,'renault','noir','scenic',2006,1);

INSERT INTO commentaires
VALUES ('','très bien',5);

INSERT INTO commentaires
VALUES ('','ponctuel',4);

INSERT INTO membres_has_commentaires
VALUES (1,1);

INSERT INTO membres_has_commentaires
VALUES (1,2);

INSERT INTO membres_has_trajets
VALUES (1,3);

