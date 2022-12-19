select joueur.pseudo as "emetteur", pertinence.pertinent, A.* from 
(select joueur.pseudo as "editeur", jeu.nom, note.* 
from note, joueur, jeu, concerner 
where note.id_joueur = joueur.id_joueur 
and note.id_note = concerner.id_note 
and concerner.id_jeu = jeu.id_jeu
and jeu.extension = 'false') A, pertinence, joueur
where A.id_note = pertinence.id_note
and joueur.id_joueur = pertinence.id_joueur
order by A.id_note;