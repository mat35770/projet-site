INSERT INTO trajets
VALUES ('','Rennes','Troyes','Un deuxième trajet','2015-05-23',16,2,0,30);

INSERT INTO villes 
VALUES ('','Troyes', 'France'),
     ('','Rennes', 'France'),
     ('','Tours', 'France'),
     ('','Paris', 'France'),
     ('','Lille', 'France'),
     ('','Lyon', 'France');

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