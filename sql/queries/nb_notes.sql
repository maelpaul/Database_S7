SELECT joueur.*,  count(id_note) as "Nombre de jeux notés"
FROM joueur
LEFT OUTER JOIN note ON  note.id_joueur = joueur.id_joueur
GROUP BY joueur.id_joueur
ORDER BY count(id_note) DESC;
