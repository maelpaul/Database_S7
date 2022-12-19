drop function if exists MODIFY_PLAYER( _JOUEUR_A_MODIF VARCHAR, _PSEUDO CHAR, _NOM CHAR, _PRENOM CHAR, _MAIL CHAR);

drop function if exists get_id_player(_pseudo CHAR);

create OR REPLACE function get_id_player(_pseudo CHAR)
returns int
language plpgsql
as
$$
declare
   _id integer;
begin
   SELECT id_joueur into _id from joueur where joueur.pseudo = _pseudo;
   return _id;
end;
$$;

CREATE OR REPLACE function MODIFY_PLAYER( _JOUEUR_A_MODIF VARCHAR, _PSEUDO CHAR, _NOM CHAR, _PRENOM CHAR, _MAIL CHAR)
RETURNS void 
as 
$BODY$
begin
    update joueur 
    set pseudo = _PSEUDO, nom = _NOM, prenom = _PRENOM, mail = _MAIL
    where id_joueur = get_id_player(_JOUEUR_A_MODIF);
end;
$BODY$
LANGUAGE 'plpgsql' 
;

-- SELECT * FROM MODIFY_PLAYER('Ereizam', 'yop', 'OMG', 'mario', 'mario@OMG.com');
