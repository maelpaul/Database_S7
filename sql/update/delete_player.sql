drop function if exists DELETE_PLAYER( _PSEUDO CHAR);

drop function if exists get_id_player(_pseudo CHAR);

drop function if exists replace_id_player(_id_player int);

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

create OR REPLACE function replace_id_player(_id_player int)
returns void
language plpgsql
as
$$
begin
   if _id_player <> 0 then
      UPDATE note
      SET id_joueur = 0
      where id_joueur = _id_player;
      UPDATE pertinence
      SET id_joueur = 0
      where id_joueur = _id_player;   
   end if;
end;
$$;

CREATE OR REPLACE function DELETE_PLAYER( _PSEUDO CHAR) 
RETURNS void 
as 
$BODY$
begin
   DELETE FROM aimer
   WHERE id_joueur = get_id_player(_PSEUDO);
   DELETE FROM preferer
   WHERE id_joueur = get_id_player(_PSEUDO);
   PERFORM replace_id_player(get_id_player(_PSEUDO));
   DELETE FROM joueur
   WHERE id_joueur = get_id_player(_PSEUDO);  
end;
$BODY$
LANGUAGE 'plpgsql' 
;

-- SELECT * FROM DELETE_PLAYER('Ereizam');
