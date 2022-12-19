drop function if exists MODIFY_NOTE(_ID_NOTE INT, _SCORE INT, _COMMENTAIRE VARCHAR, _NB_JOUEURS INT);

CREATE OR REPLACE function MODIFY_NOTE(_ID_NOTE INT, _SCORE INT, _COMMENTAIRE VARCHAR, _NB_JOUEURS INT)
RETURNS void 
as 
$BODY$
begin
   if (_SCORE not in (select score from note where id_note = _ID_NOTE)) or (_COMMENTAIRE not in (select commentaire from note where id_note = _ID_NOTE)) then
      delete from pertinence where id_note = _ID_NOTE;
   end if;
   update note
   set score = _SCORE, commentaire = _COMMENTAIRE, date_note = current_date, nb_joueurs = _NB_JOUEURS
   where id_note = _ID_NOTE;
end;
$BODY$
LANGUAGE 'plpgsql' 
;

-- SELECT * FROM MODIFY_NOTE(1, 2, 'nul bluelock', 2);
