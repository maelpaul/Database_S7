select j1.nom, j2.nom as "etend", coalesce(round(avg(score), 2), -1) as moyenne, count(concerner.id_note) as total_note
from jeu j1 FULL OUTER JOIN concerner ON concerner.id_jeu = j1.id_jeu
FULL OUTER JOIN note ON note.id_note = concerner.id_note
LEFT OUTER JOIN jeu j2 ON j1.id_jeu_if_extension = j2.id_jeu
GROUP BY j1.id_jeu, j2.nom
ORDER BY moyenne desc, total_note DESC;
