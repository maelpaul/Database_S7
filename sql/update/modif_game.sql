drop function if exists MODIFY_GAME( _JEU_A_MODIF VARCHAR, _NOM VARCHAR, _EDITEUR CHAR, _ANNEE_PARUTION INT, _DUREE INT, _NB_JOUEURS INT, _EXTENSION INT, _JEU_ETENDU VARCHAR);

drop function if exists get_id_jeu(_nom VARCHAR);

drop function if exists get_bool(_extension int);

create OR REPLACE function get_id_jeu(_nom VARCHAR)
returns int
language plpgsql
as
$$
declare
   _id integer;
begin
    if _nom <> '' then
      SELECT id_jeu into _id from jeu where jeu.nom = _nom;
      return _id;
   else return NULL;
   end if;
end;
$$;

create OR REPLACE function get_bool(_extension int)
returns boolean
language plpgsql
as
$$
declare
   _bool boolean;
begin
   if _extension = 0 then return false;
   else return true;
   end if;
end;
$$;

CREATE OR REPLACE function MODIFY_GAME(_JEU_A_MODIF VARCHAR, _NOM VARCHAR, _EDITEUR CHAR, _ANNEE_PARUTION INT, _DUREE INT, _NB_JOUEURS INT, _EXTENSION INT, _JEU_ETENDU VARCHAR)
RETURNS void 
as 
$BODY$
begin
    update jeu
    set nom = _NOM, editeur = _EDITEUR, annee_parution = _ANNEE_PARUTION, duree = _DUREE, nb_joueurs = _NB_JOUEURS, extension = get_bool(_EXTENSION), id_jeu_if_extension = get_id_jeu(_JEU_ETENDU)
    where id_jeu = get_id_jeu(_JEU_A_MODIF);
end;
$BODY$
LANGUAGE 'plpgsql' 
;

-- SELECT * FROM MODIFY_GAME('7Wonders', 'yop', 'OMG', 2001, 15, 5, false, '');
