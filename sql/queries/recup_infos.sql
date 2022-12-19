
drop function if exists INFOS(numero_note int);

CREATE OR REPLACE function INFOS(numero_note int) 
returns TABLE("Commentaires les plus récents" varchar, 
    "Joueurs à l'origine" char,
    "Jeux concernés" varchar,
    "Date du commentaire" date,
    "Score associé" int)
LANGUAGE plpgsql
AS $$
begin
    return query
    SELECT commentaire, joueur.pseudo, jeu.nom, date_note, score 
        FROM note, joueur, jeu, concerner 
        WHERE note.id_joueur = joueur.id_joueur 
        AND note.id_note = concerner.id_note
        AND note.id_note = numero_note 
        AND concerner.id_jeu = jeu.id_jeu
        AND jeu.extension = 'false';
end;$$;

-- select * from JOUEURS_APPRECIE(1);
