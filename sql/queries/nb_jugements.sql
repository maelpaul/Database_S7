



SELECT commentaire, count(pertinence) as "Nombre de jugements"
from note
JOIN pertinence ON pertinence.id_note = note.id_note
GROUP BY note.id_note
HAVING count(pertinence) >=  ALL (SELECT count(*)
                                FROM pertinence
                                GROUP BY id_note)
LIMIT 1;
