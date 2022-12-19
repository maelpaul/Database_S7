
drop function if exists JOUEURS_APPRECIE(numero_note int);

CREATE OR REPLACE function JOUEURS_APPRECIE(numero_note int) 
returns TABLE ("Joueurs qui ont apprécie le commentaire" char,
    "Commentaires les plus récents" varchar, 
    "Joueurs à l'origine" char,
    "Jeux concernés" varchar,
    "Date du commentaire" date,
    "Score associé" int)
LANGUAGE plpgsql
AS $$
begin
    return query
    SELECT joueur.pseudo, A.* 
    from joueur, pertinence, (SELECT commentaire, joueur.pseudo as "A_pseudo", jeu.nom, date_note, score 
        FROM note, joueur, jeu, concerner 
        WHERE note.id_joueur = joueur.id_joueur 
        AND note.id_note = concerner.id_note
        AND note.id_note = numero_note 
        AND concerner.id_jeu = jeu.id_jeu
        AND jeu.extension = 'false') A
    where pertinence.id_note = numero_note
    and pertinence.id_joueur = joueur.id_joueur 
    and pertinence.pertinent;
end;$$;

-- select * from JOUEURS_APPRECIE(1);
