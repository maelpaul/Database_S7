drop function if exists DELETE_NOTE( _ID INT);

CREATE OR REPLACE function DELETE_NOTE( _ID INT) 
RETURNS void 
as 
$BODY$
begin
    delete from pertinence where id_note = _ID;
    delete from concerner where id_note = _ID;
    delete from note where id_note = _ID;
end;
$BODY$
LANGUAGE 'plpgsql' 
;

-- select * from DELETE_NOTE(1);
