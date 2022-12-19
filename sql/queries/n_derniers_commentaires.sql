
drop function if exists COMMENTAIRES_RECENT(nombre_commentaires int);

CREATE OR REPLACE function COMMENTAIRES_RECENT(nombre_commentaires int) 
returns TABLE("Commentaires les plus récents" varchar, "date du commentaire" date)
LANGUAGE plpgsql
AS $$
begin
    return query
    SELECT commentaire, date_note
    FROM Note 
    ORDER BY date_note desc
    LIMIT nombre_commentaires;
end;$$;
