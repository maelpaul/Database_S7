drop function if exists ADD_NOTE(  _PSEUDO CHAR, _NOM_JEU VARCHAR, _SCORE INT, _COMMENTAIRE VARCHAR, _NB_JOUEURS INT);

drop function if exists get_last_id_note();

drop function if exists get_id_jeu(_nom VARCHAR);

drop function if exists get_id_joueur(_pseudo CHAR);

create OR REPLACE function get_last_id_note()
returns int
language plpgsql
as
$$
declare
   _count integer;
begin
   SELECT ID_NOTE into _count from NOTE order by ID_NOTE desc limit 1;
   
   return _count + 1;
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
   SELECT id_jeu into _id from jeu where jeu.nom = _nom;
   
   return _id;
end;
$$;

create OR REPLACE function get_id_joueur(_pseudo CHAR)
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

CREATE OR REPLACE function ADD_NOTE( _PSEUDO CHAR, _NOM_JEU VARCHAR, _SCORE INT, _COMMENTAIRE VARCHAR, _NB_JOUEURS INT) 
RETURNS void 
as 
$BODY$
begin
    INSERT INTO NOTE(ID_NOTE, ID_JOUEUR, SCORE, COMMENTAIRE, DATE_NOTE, NB_JOUEURS)
    VALUES (get_last_id_note(), get_id_joueur(_PSEUDO), _SCORE, _COMMENTAIRE, CURRENT_DATE, _NB_JOUEURS);
    INSERT INTO concerner(ID_NOTE, id_jeu)
    VALUES (get_last_id_note()-1, get_id_jeu(_NOM_JEU));
end;
$BODY$
LANGUAGE 'plpgsql' 
;

-- select * from ADD_NOTE('Ereizam', 'Catane', 3, 'NULLLLLL', 3); 
