select personne.*, jeu.nom as "jeu", j2.nom as "etend"
from personne inner join creer on personne.id_personne = creer.id_personne
inner join jeu on jeu.id_jeu = creer.id_jeu
left outer join jeu j2 on jeu.id_jeu_if_extension = j2.id_jeu
order by personne.nom;
