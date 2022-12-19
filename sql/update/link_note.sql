drop function if exists LINK_NOTE(_ID_NOTE INT, _EXTENSION VARCHAR);

drop function if exists get_id_jeu(_nom VARCHAR);

create OR REPLACE function get_id_jeu(_nom VARCHAR)
returns int
language plpgsql
as
$$
declare
   _id integer;
begin
   SELECT id_jeu into _id from jeu where jeu.nom = _nom;
   return _id;
end;
$$;

CREATE OR REPLACE function LINK_NOTE(_ID_NOTE INT, _EXTENSION VARCHAR)
RETURNS void 
as 
$BODY$
begin
    INSERT INTO concerner(ID_NOTE, id_jeu)
    VALUES (_ID_NOTE, get_id_jeu(_EXTENSION));
end;
$BODY$
LANGUAGE 'plpgsql' 
;

-- select * from LINK_NOTE(1, 'Catane+');
