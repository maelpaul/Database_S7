select jeu.nom as "jeu", j2.nom as "etend", theme.nom as "theme"
from jeu inner join avoir on avoir.id_jeu = jeu.id_jeu
inner join theme on theme.id_theme = avoir.id_theme
left outer join jeu j2 on jeu.id_jeu_if_extension = j2.id_jeu
order by jeu.nom;