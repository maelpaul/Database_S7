select joueur.*, theme.nom as "theme"
from joueur, theme, aimer
where joueur.id_joueur = aimer.id_joueur
and theme.id_theme = aimer.id_theme
order by joueur.pseudo;