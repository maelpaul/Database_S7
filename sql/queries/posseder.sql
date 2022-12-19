select jeu.nom as "jeu", j2.nom as "etend", categorie.nom as "categorie"
from jeu inner join posseder on posseder.id_jeu = jeu.id_jeu
inner join categorie on categorie.id_categorie = posseder.id_categorie
left outer join jeu j2 on jeu.id_jeu_if_extension = j2.id_jeu
order by jeu.nom;