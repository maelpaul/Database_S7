select joueur.*, categorie.nom as "categorie"
from joueur, categorie, preferer
where joueur.id_joueur = preferer.id_joueur
and categorie.id_categorie = preferer.id_categorie
order by joueur.pseudo;