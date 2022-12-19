
drop function if exists JOUEURS_APPRECIE(numero_note int);

CREATE OR REPLACE function JOUEURS_APPRECIE(numero_note int) 
returns TABLE ("Joueurs qui ont apprécie le commentaire" char)
LANGUAGE plpgsql
AS $$
begin
    return query
    SELECT pseudo 
    from joueur inner join pertinence on pertinence.id_joueur = joueur.id_joueur
    where pertinence.id_note = numero_note and pertinence.pertinent
    order by pseudo;
end;$$;

-- select * from JOUEURS_APPRECIE(1);



