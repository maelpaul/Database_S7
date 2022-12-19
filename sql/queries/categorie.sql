



drop function if exists JEUX_COMMENTAIRE_CATEGORIE(numero_theme int);

CREATE OR REPLACE function JEUX_COMMENTAIRE_CATEGORIE(numero_theme int)
returns TABLE("Nom du jeu" varchar, "Nom de la catégorie" char)
LANGUAGE plpgsql
AS $$
begin
    return query
    select jeu.nom, categorie.nom
    from avoir join jeu on jeu.id_jeu = avoir.id_jeu
    join posseder on posseder.id_jeu = jeu.id_jeu 
    join categorie on posseder.id_categorie = CAtegorie.id_categorie
    join concerner on concerner.id_jeu = jeu.id_jeu
    where avoir.id_theme = numero_theme
    group by categorie.nom, jeu.nom;
end;$$;
