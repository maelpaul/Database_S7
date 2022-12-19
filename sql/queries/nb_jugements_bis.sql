SELECT commentaire, joueur.pseudo, jeu.nom, date_note, score, count(pertinence) as "Nombre de jugements", A.utile as "Nombre de 'utile'"
FROM note, joueur, jeu, concerner, pertinence, (select id_note, count(*) as "utile" from pertinence where pertinence.pertinent = 'true' group by id_note) A
WHERE note.id_joueur = joueur.id_joueur 
AND note.id_note = concerner.id_note 
AND concerner.id_jeu = jeu.id_jeu
AND pertinence.id_note = note.id_note
AND A.id_note = note.id_note
AND pertinence.id_note = A.id_note
AND jeu.extension = 'false'
GROUP BY note.id_note, joueur.pseudo, jeu.nom, A.utile
HAVING count(pertinence) >=  ALL (SELECT count(*)
                                FROM pertinence
                                GROUP BY id_note)
order by random()
LIMIT 1;
