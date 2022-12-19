
drop function if exists COMMENTAIRES_RECENT(nombre_commentaires int);

CREATE OR REPLACE function COMMENTAIRES_RECENT(nombre_commentaires int) 
returns TABLE("Commentaires les plus récents" varchar, 
    "Joueurs à l'origine" char,
    "Jeux concernés" varchar,
    "Date du commentaire" date,
    "Score associé" int)
LANGUAGE plpgsql
AS $$
begin
    RETURN QUERY SELECT commentaire, joueur.pseudo, jeu.nom, date_note, score 
    FROM note, joueur, jeu, concerner 
    WHERE note.id_joueur = joueur.id_joueur 
    AND note.id_note = concerner.id_note 
    AND concerner.id_jeu = jeu.id_jeu
    AND jeu.extension = 'false'
    ORDER BY date_note desc
    LIMIT nombre_commentaires;
end;$$;

-- SELECT * from COMMENTAIRES_RECENT(2);