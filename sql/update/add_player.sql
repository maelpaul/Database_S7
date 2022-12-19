drop function if exists ADD_PLAYER( _PSEUDO CHAR, _NOM CHAR, _PRENOM CHAR, _MAIL CHAR);

drop function if exists get_last_id_player();

create OR REPLACE function get_last_id_player()
returns int
language plpgsql
as
$$
declare
   _count integer;
begin
   SELECT ID_JOUEUR into _count from JOUEUR order by ID_JOUEUR desc limit 1;
   
   return _count + 1;
end;
$$;

CREATE OR REPLACE function ADD_PLAYER( _PSEUDO CHAR, _NOM CHAR, _PRENOM CHAR, _MAIL CHAR) 
RETURNS void 
as 
$BODY$
begin
    INSERT INTO JOUEUR(ID_JOUEUR, PSEUDO, NOM, PRENOM, MAIL)
    VALUES (get_last_id_player(), _PSEUDO, _NOM, _PRENOM, _MAIL);
end;
$BODY$
LANGUAGE 'plpgsql' 
;

-- select * from ADD_PLAYER('a', 'b', 'c', 'd');
-- select * from joueur;

