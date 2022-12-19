

drop function if exists JEU_THEME(theme varchar);

CREATE OR REPLACE function JEU_THEME(theme varchar)
returns TABLE("Jeu" varchar, "Etend" varchar, "Categorie" char)
LANGUAGE plpgsql
AS $$
begin
    return query
    select A.nom, j2.nom as "etend", A.cat as "cat" 
    from (select j1.nom, j1.id_jeu_if_extension, c.nom as "cat"
        from jeu j1, avoir, theme t, posseder, categorie c
        where j1.id_jeu = avoir.id_jeu
        and avoir.id_theme = t.id_theme
        and t.nom = theme
        and j1.id_jeu = posseder.id_jeu
        and posseder.id_categorie = c.id_categorie) A
    left outer join jeu j2 on A.id_jeu_if_extension = j2.id_jeu
    order by A.cat, A.nom; 
end;$$;

SELECT * from JEU_THEME('Fantastique');
