

drop table if EXISTS Jugement_positif;

CREATE table Jugement_positif as
select note.id_note, cast(c as float)
from note FULL OUTER join 
(select id_note, count(*) as c
from pertinence 
where pertinence.PERTINENT
GROUP BY id_note) as T on T.id_note = note.id_note;


drop table if EXISTS Jugement_negatif;

CREATE TABLE Jugement_negatif as 

select note.id_note, cast(d as float)
from note FULL OUTER join 
(select id_note, count(*) as d
from pertinence 
where pertinence.PERTINENT = false
GROUP BY id_note) as T on T.id_note = note.id_note;

UPDATE Jugement_negatif 
set d = 0
where d is NULL;


UPDATE Jugement_positif
set c = 0
where c is NULL;

drop table if EXISTS Indice_confiance;

CREATE TABLE Indice_confiance as 

select note.id_note, pseudo, score, commentaire, jeu.nom, round(cast((1+c)/(1+d) as numeric), 2) as ic
from note 
FULL OUTER JOIN jugement_negatif on note.id_note = jugement_negatif.id_note 
FULL OUTER JOIN jugement_positif on note.id_note = jugement_positif.id_note
join joueur on note.id_joueur = joueur.id_joueur
join concerner on concerner.id_note = note.id_note
join jeu on jeu.id_jeu = concerner.id_jeu and jeu.extension = false
ORDER BY ic DESC;

drop table if EXISTS Score_pondere;

CREATE TABLE Score_pondere as 

select id_note, score*ic as score_ic, ic
from Indice_confiance;

select j1.nom, j2.nom as "etend", coalesce(round(sum(score_ic)/sum(ic), 2), -1) as moyenne, count(concerner.id_note) as total_note
from jeu j1 FULL OUTER JOIN concerner ON concerner.id_jeu = j1.id_jeu
FULL OUTER JOIN score_pondere ON score_pondere.id_note = concerner.id_note
LEFT OUTER JOIN jeu j2 ON j1.id_jeu_if_extension = j2.id_jeu
GROUP BY j1.id_jeu, j2.nom
ORDER BY moyenne desc, total_note DESC;
