

drop function if exists JOUEUR_COMMENTAIRE_CATEGORIE(pseudo_joueur varchar);

CREATE OR REPLACE function JOUEUR_COMMENTAIRE_CATEGORIE(pseudo_joueur varchar) 
returns TABLE("Joueur" char, "Score donnée par le joueur" int, "Commentaire" varchar,
    "Date du commentaire" date, "Nom du jeu" varchar, "Nom de la catégorie" char, "id_jeu" int, "Etend" varchar)
LANGUAGE plpgsql
AS $$
begin
    return query
    select C.*, j2.nom as "etend" from
        (select joueur.pseudo, score, commentaire, note.date_note, B.nom_jeu, B.cat_nom, B.id_jeu_if_extension
        from note natural join concerner
        join joueur on joueur.id_joueur = note.id_joueur 
        join jeu on concerner.id_jeu = jeu.id_jeu 
        join posseder on jeu.id_jeu = posseder.id_jeu
        join categorie on posseder.ID_CATEGORIE = categorie.ID_CATEGORIE
        right outer join (select jeu.id_jeu as "jeu", jeu.nom as "nom_jeu", jeu.id_jeu_if_extension, A.cat as "cat_jeu", A.cat_nom
                                from jeu, posseder, categorie, (select preferer.ID_CATEGORIE as "cat", categorie.nom as "cat_nom"
                                    from PREFERER, joueur, categorie
                                    where preferer.id_joueur = joueur.id_joueur
                                    and joueur.pseudo = pseudo_joueur
                                    and preferer.ID_CATEGORIE = categorie.ID_CATEGORIE
                                    order by random()
                                    LIMIT 1) A
                                where posseder.id_jeu = jeu.id_jeu
                                and posseder.ID_CATEGORIE = categorie.ID_CATEGORIE
                                and categorie.id_categorie = A.cat
                                order by random()
                                LIMIT 1) B
                            on jeu.id_jeu = B.jeu and categorie.id_categorie = B.cat_jeu) C
    LEFT OUTER JOIN jeu j2 ON C.id_jeu_if_extension = j2.id_jeu
    order by C.date_note desc;
end;$$;

-- SELECT * from JOUEUR_COMMENTAIRE_CATEGORIE('Ereizam');
