select j1.*, j2.nom as "etend"
from jeu j1
left outer join jeu j2 
on j1.id_jeu_if_extension = j2.id_jeu
order by j1.nom asc;