drop function if exists ADD_GAME(NOM int, EDITEUR char, ANNEE_PARUTION date, DUREE int, NB_JOUEURS int, EST_EXTENSION int, JEU_ETENDU varchar);

drop function if exists get_last_id_game();

drop function if exists get_bool(_extension int);

drop function if exists get_id_jeu(_nom VARCHAR);

create OR REPLACE function get_last_id_game()
returns int
language plpgsql
as
$$
declare
   _count integer;
begin
   SELECT id_jeu into _count from jeu order by id_jeu desc limit 1;
   
   return _count + 1;
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

CREATE OR REPLACE function ADD_GAME(_NOM char, _EDITEUR char, _ANNEE_PARUTION int, _DUREE int, _NB_JOUEURS int, EST_EXTENSION int, JEU_ETENDU varchar) 
RETURNS void 
as 
$BODY$
begin
    INSERT INTO JEU(ID_JEU, NOM, EDITEUR, ANNEE_PARUTION, DUREE, NB_JOUEURS,EXTENSION,ID_JEU_IF_EXTENSION)
    VALUES (get_last_id_game(), _NOM, _EDITEUR, _ANNEE_PARUTION, _DUREE, _NB_JOUEURS, get_bool(EST_EXTENSION), get_id_jeu(JEU_ETENDU));
end;
$BODY$
LANGUAGE 'plpgsql' 
;


-- SELECT * from ADD_GAME('truc', 'troc', 1456, 43, 5, 0, '');

-- SELECT * from jeu;
