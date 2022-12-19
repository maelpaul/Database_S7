
DELETE FROM pertinence ;
DELETE FROM aimer;
DELETE FROM preferer;
DELETE FROM avoir;
DELETE FROM posseder;
DELETE FROM concerner;
DELETE FROM illustrer;
DELETE FROM creer;
DELETE FROM note;
DELETE FROM categorie;
DELETE FROM jeu;
DELETE FROM theme;
DELETE FROM personne;
DELETE FROM joueur;


INSERT INTO JOUEUR(ID_JOUEUR, PSEUDO, NOM, PRENOM, MAIL)
 VALUES
(0,'Deleted User', NULL, NULL, NULL),
(1,'Shadow', 'Paul', 'Mael', 'mpaul@bordeaux-inp.fr'),
(2,'Ereizam', 'Maziere', 'Leo-Paul', 'lpmaziere@bordeaux-inp.fr'),
(3,'Thifox', 'Lanier', 'Thibaut', 'tlanier@bordeaux-inp.fr'),
(4,'greencatfish', 'Lam', 'Mathieu', 'mlam@bordeaux-inp.fr'),
(5,'jpjean', 'Jean', 'Jean-Pierre', 'jp33@outlook.fr'),
(6,'RireJaune', 'Tran', 'Kevin', 'Kevtran@gmail.com'),
(7,'Cyprien', 'Iov', 'Cyprien', 'cypiov75@gmail.com'),
(8, 'Squeezie', 'Hochard', 'Lucas', 'squeeziepro@outlook.fr'),
(9, 'JDG', 'Molas', 'Frederic', 'jdgprod@laposte.fr'),
(10, 'MV', 'Dang', 'Xavier', 'mistermv@outlook.fr'),
(11, 'Kameto', 'Kebir', 'Kamel', 'kammeto@kcorp.com'),
(12, 'Inoxtag', 'Benzzouz', 'Inès', 'inox@gmail.com'),
(13, 'Domingo', 'Bizot', 'Pierre-Alexis', 'popcorn@outlook.fr'),
(14, 'Etoiles', 'Guendil', 'Rayenne', 'etoiles@ggmail.com'),
(15, 'Faker', 'Lee', 'Sang-hyeok', 'faker@t1.com'),
(16, 'KennyS', 'Schrub', 'Kenny', 'kennyS@liquid.com'),
(17, 'S1mple', 'Kostyliev', 'Oleksandr', 'S1mple@navi.com'),
(18, 'Vatira', 'Tourret', 'Axel', 'vatira@kcorp.com')
;

INSERT INTO NOTE(ID_NOTE, ID_JOUEUR, SCORE, COMMENTAIRE, DATE_NOTE, NB_JOUEURS)
 VALUES
(1,2,15, 'Tres bien', '2020-07-25', 4 ),
(2,4,3, 'Nul', '2018-05-20', 3),
(3,1,13, 'Plutot moyen', '2019-12-12', 3),
(4,2,18, 'Tres bon jeu', '2021-08-30', 4 ),
(5,15,12, 'Jeu assez moyen', '2015-03-12',5),
(6,13,13, 'Plutot moyen', '2017-05-30', 2 ),
(7,7,2, 'Très mauvais, à ne pas acheter', '2018-12-31', 3),
(8,2,9, 'Amusement sans plus', '2019-01-03', 10),
(9,6,8, 'Je ne m attendais à rien et je suis quand même déçu', '2020-04-10', 4),
(10,8,16, 'Très bonnes règles mais matériel de moyenne qualité', '2020-06-17',8),
(11,11,12, 'Jeu assez bien pour passer 30 mins de bon moment mais mauvaise rejouabilité', '2019-02-24', 5 ),
(12,17,13, 'Moyen, déjà fait dans plein d autres jeux', '2018-05-28', 3),
(13,18,13, 'Bof', '2018-04-10', 3),
(14,8,16, 'Bon jeu où la réflexion prend une part très importante', '2021-04-01', 5 ),
(15,10,5, 'Jeu ni nul ni bon, un entre-deux médiocre', '2022-09-09',6),
(16,1,7, 'NUUUUUUUUUUUUL', '2020-05-14', 2 ),
(17,14,10, 'Jeu assez poussif dans ses mécaniques', '2018-06-23', 2),
(18,15,11, 'Drôle mais très ortienté pour des enfants', '2019-09-21', 2),
(19,13,19, 'Meilleur jeu du monde', '2021-09-20', 12 ),
(20,12,20, 'Chef-d oeuvre absolu du mon ludique, une expéreince enrichissante pour tous les âges, une redéfintion de la notion d amusement', '2022-07-08',6),
(21,6,17, 'J ai beaucoup aimé les différentes approches possibles', '2020-11-20', 5 ),
(22,8,14, 'Cool', '2018-09-18', 2),
(23,2,12, 'Perso je ne l achetrai pas', '2019-12-02', 8),
(24,3,9, ':(', '2021-03-10', 10 ),
(25,15,10, 'Médiocre', '2022-09-15',4),
(26,4,3, 'Je ne le donnerai pas même à mon pire ennemi', '2020-03-26', 4 ),
(27,5,18, 'Grandiose', '2018-04-27', 3),
(28,13,6, 'Même mon frère de 2 ans le trouverait trop enfantin', '2019-11-11', 3),
(29,12,7, 'Ca va', '2021-07-19', 4 ),
(30,3,10, 'Bof', '2022-07-14',5)
;



INSERT INTO PERTINENCE(ID_NOTE, ID_JOUEUR, PERTINENT)
 VALUES
(1,2,true),
(2,4,true),
(30,4,true),
(18,1,true),
(19,3,false),
(18,2,true),
(4,4,true),
(3,1,true),
(9,2,true),
(10,4,true),
(11,1,true),
(10,3,false),
(16,2,true),
(22,4,true),
(30,1,true),
(29,3,false),
(7,2,true),
(5,4,true),
(7,1,true),
(21,3,false),
(22,2,true),
(21,4,true),
(19,1,true),
(13,3,false),
(14,2,true),
(14,4,true),
(15,1,true),
(8,3,false),
(6,2,true),
(7,4,true),
(5,1,true),
(15,3,false),
(20,4,true),
(30,3,false),
(9,4,true),
(3,3,false),
(2,2,true),
(1,4,true),
(2,1,true)
;

INSERT INTO JEU(ID_JEU, NOM, EDITEUR, ANNEE_PARUTION,DUREE,NB_JOUEURS,EXTENSION,ID_JEU_IF_EXTENSION)
 VALUES
(1,'Catane','Hasbro', 1995, 45, 5, false,NULL),
(2,'SpeedJungle','Hasbro',2005, 20, 8, false,NULL),
(3,'Stratego', 'Ludo', 1995, 30, 2, false,NULL),
(4,'Qui est-ce', 'QuiCorp', 1980, 15, 2, false,NULL),
(5,'Aventuriers du rail', 'Raillou', 2008, 60, 4, false,NULL),
(6,'Catane+','Hasbro',2010,45,5, true, 1),
(7,'Pays du monde', 'Raillou', 2018, 60, 4, true, 5),
(8,'7Wonders','Hasbro', 2015, 35, 2, false, NULL),
(9,'Loup-Garou','Ludo',2000, 60, 10, false,NULL),
(10,'SmallWorld', 'GamesCo', 2010, 30, 5, false,NULL),
(11,'Tarot', 'Cards', 1500, 30, 5, false,NULL),
(12,'Complots', 'Hasbro', 2018, 30, 4, false,NULL),
(13,'SmallWorldsFactions','Hasbro',2010,30,5, true, 10),
(14,'Tresors', 'Ludo', 2018, 20, 4, false, NULL),
(15,'7Wonders+','Hasbro', 2018, 35, 2, true, 8),
(16,'7Wonders2','Hasbro', 2019, 35, 2, true, 8)
;

INSERT INTO concerner(id_note, id_jeu)
VALUES
(1,3),
(2,1),
(3,4),
(4,5),
(4,7),
(5,8),
(6,9),
(7,8),
(8,9),
(9,9),
(10,1),
(11,3),
(12,3),
(13,4),
(14,14),
(15,8),
(16,10),
(17,10),
(18,14),
(19,6),
(19,1),
(20,14),
(21,1),
(22,15),
(22,8),
(23,15),
(23,8),
(24,4),
(25,16),
(25,8),
(26,7),
(26,5),
(27,13),
(27,10),
(28,11),
(29,10),
(30,12)
;

INSERT INTO PERSONNE(ID_PERSONNE, NOM, PRENOM)
 VALUES
(1,'Jean','Jacques'),
(2,'Du Jeu','Paul'),
(3,'Notch','Michel'),
(4,'Paul', 'Mael'),
(5,'Maziere', 'Leo-Paul'),
(6,'Lanier', 'Thibaut'),
(7,'Lam', 'Mathieu'),
(8,'Jean', 'Jean-Pierre'),
(9,'Tran', 'Kevin'),
(10,'Iov', 'Cyprien'),
(11, 'Hochard', 'Lucas'),
(12, 'Molas', 'Frederic'),
(13, 'Dang', 'Xavier'),
(14, 'Kebir', 'Kamel'),
(15, 'Benzzouz', 'Inès'),
(16, 'Bizot', 'Pierre-Alexis'),
(17, 'Guendil', 'Rayenne'),
(18, 'Lee', 'Sang-hyeok'),
(19, 'Schrub', 'Kenny'),
(20, 'Kostyliev', 'Oleksandr'),
(21, 'Tourret', 'Axel')
;

INSERT INTO ILLUSTRER(ID_PERSONNE, ID_JEU)
 VALUES
(1, 6),
(1, 7),
(1, 3),
(2, 3),
(1, 1),
(1, 16),
(2, 10),
(3, 6),
(9, 7),
(10, 5),
(9, 4),
(10, 1),
(18, 2),
(2, 8),
(3, 3)
;

INSERT INTO CREER(ID_PERSONNE, ID_JEU)
 VALUES
(3, 1),
(3, 2),
(2, 3),
(3, 4),
(3, 5),
(1, 6),
(18, 16),
(15, 13),
(11, 14),
(12, 15),
(8, 16),
(7, 2),
(10, 1),
(2, 5),
(4, 6),
(1, 7),
(3, 7),
(9, 9),
(15, 3),
(16, 4),
(11, 8),
(4, 11),
(5, 12),
(1, 11),
(2, 7),
(16, 9),
(17, 11),
(3, 10)
;

INSERT INTO THEME(ID_THEME, NOM)
 VALUES
(1, 'Fantastique'),
(2, 'Moyen Age'),
(3, 'Pirate'),
(4, 'Aventure'),
(5, 'Animaux'),
(6, 'Mythologie'),
(7, 'Futur'),
(8, 'Contes'),
(9, 'Voyage'),
(10, 'Repos'),
(11, 'Images'),
(12, 'Futuristique'),
(13, 'Création'),
(14, 'Conquête'),
(15, 'Nouveau-Monde'),
(16, 'Robotique'),
(17, 'Cuisine'),
(18, 'Echapée'),
(19, 'Enquête'),
(20, 'Royaume')
;

INSERT INTO CATEGORIE(ID_CATEGORIE, NOM)
 VALUES
(1,'jeu de cartes'),
(2,'jeu de chance'),
(3,'jeu de strategie'),
(4,'jeu de rapidité'),
(5,'jeu d enigmes'),
(6,'jeu de reflexion'),
(7,'jeu de dés'),
(8,'jeu de tuiles'),
(9,'jeu de course'),
(10,'jeu de bluff'),
(11,'jeu de de culture generale'),
(12,'jeu de force'),
(13,'jeu de langues'),
(14,'jeu de plateau')
;

INSERT INTO AIMER(ID_JOUEUR, ID_THEME)
 VALUES
(1,10),
(1,1),
(1,3),
(2,13),
(3,16),
(4,19),
(5,11),
(6,14),
(7,17),
(8,18),
(9,1),
(10,3),
(11,5),
(12,8),
(13,9),
(14,2),
(15,4),
(16,5),
(17,7),
(18,13),
(1,11),
(2,20),
(3,1),
(3,7),
(4,3),
(5,1),
(6,7)
;

INSERT INTO preferer(id_joueur, ID_CATEGORIE)
 VALUES
(1,10),
(2,13),
(3,14),
(4,1),
(5,3),
(6,2),
(7,5),
(8,5),
(9,14),
(10,13),
(11,8),
(12,9),
(13,6),
(14,4),
(15,4),
(16,9),
(17,11),
(18,13),
(2,4),
(2,3),
(2,1)
;
 
INSERT INTO avoir(id_jeu, ID_THEME)
 VALUES
(1,7),
(3,4),
(5,1),
(3,5),
(1,1),
(6,1),
(12,1),
(2,20),
(3,19),
(5,13),
(6,5),
(6,2),
(6,19),
(10,6),
(12,11),
(12,13),
(13,16),
(14,18),
(15,20),
(15,1),
(16,15),
(16,2),
(2,1),
(8,8),
(8,9),
(9,11),
(9,12),
(2,3),
(2,7),
(3,13),
(5,14),
(5,5),
(12,19),
(16,10),
(11,12),
(1,8),
(3,9),
(4,11),
(9,3),
(10,5),
(6,14)
;

INSERT INTO posseder(id_jeu, ID_CATEGORIE)
 VALUES
(1,10),
(2,13),
(3,14),
(4,1),
(5,3),
(6,2),
(6,1),
(7,5),
(8,2),
(9,14),
(10,13),
(11,7),
(12,10),
(13,14),
(14,14),
(1,12),
(7,7),
(9,8),
(11,5),
(1,4),
(1,1),
(2,4),
(3,13)
;

