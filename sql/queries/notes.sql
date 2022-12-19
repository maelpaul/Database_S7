select joueur.pseudo, j1.nom, note.*, j2.nom as "etend"
from note 
join joueur on note.id_joueur = joueur.id_joueur 
join concerner on note.id_note = concerner.id_note 
join jeu j1 on concerner.id_jeu = j1.id_jeu
left outer join jeu j2
on j1.id_jeu_if_extension = j2.id_jeu
order by id_note;