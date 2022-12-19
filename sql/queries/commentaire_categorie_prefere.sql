




drop function if exists JOUEUR_COMMENTAIRE_CATEGORIE(numero_joueur int);

CREATE OR REPLACE function JOUEUR_COMMENTAIRE_CATEGORIE(numero_joueur int) 
returns TABLE("Score donnée par le joueur" int, "Commentaire du joueur" varchar, "Nom du jeu" varchar, "Nom de la catégorie" char)
LANGUAGE plpgsql
AS $$
begin
    return query
    select score, commentaire, jeu.nom, categorie.nom
    from note natural join concerner 
    join jeu on concerner.id_jeu = jeu.id_jeu 
    join posseder on jeu.id_jeu = posseder.id_jeu
    join categorie on posseder.ID_CATEGORIE = categorie.ID_CATEGORIE
    where categorie.ID_CATEGORIE = (select preferer.ID_CATEGORIE
                            from PREFERER 
                            where id_joueur = 2
                            LIMIT 1);
end;$$;


