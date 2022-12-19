drop function if exists DELETE_GAME( _NOM VARCHAR);

drop function if exists get_id_jeu(_nom VARCHAR);

drop function if exists delete_extension(_id_jeu_etendu INT);

drop function if exists delete_note(_id_jeu INT);

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

create OR REPLACE function delete_extension(_id_jeu_etendu INT)
returns void
language plpgsql
as
$$
begin
    delete from avoir where id_jeu in (select id_jeu from jeu where jeu.ID_JEU_IF_EXTENSION = _id_jeu_etendu);
    delete from posseder where id_jeu in (select id_jeu from jeu where jeu.ID_JEU_IF_EXTENSION = _id_jeu_etendu);
    delete from creer where id_jeu in (select id_jeu from jeu where jeu.ID_JEU_IF_EXTENSION = _id_jeu_etendu);
    delete from illustrer where id_jeu in (select id_jeu from jeu where jeu.ID_JEU_IF_EXTENSION = _id_jeu_etendu);
    delete from concerner where id_jeu in (select id_jeu from jeu where jeu.ID_JEU_IF_EXTENSION = _id_jeu_etendu);
    delete from jeu where id_jeu in (select id_jeu from jeu where jeu.ID_JEU_IF_EXTENSION = _id_jeu_etendu);
end;
$$;

create OR REPLACE function delete_note(_id_jeu INT)
returns void
language plpgsql
as
$$
begin
    CREATE TEMPORARY TABLE id_note_table(id int);
    INSERT INTO id_note_table select id_note from concerner where id_jeu = _id_jeu;
    delete from pertinence where id_note in (select id_note from concerner where id_jeu = _id_jeu);
    delete from concerner where id_jeu = _id_jeu;
    delete from note where id_note in (select id from id_note_table);
    DROP TABLE IF EXISTS id_note_table;
end;
$$;

CREATE OR REPLACE function DELETE_GAME( _NOM VARCHAR) 
RETURNS void 
as 
$BODY$
begin
    perform delete_extension(get_id_jeu(_NOM));
    DELETE FROM avoir
    WHERE id_jeu = get_id_jeu(_NOM);
    DELETE FROM posseder
    WHERE id_jeu = get_id_jeu(_NOM);
    DELETE FROM creer
    WHERE id_jeu = get_id_jeu(_NOM);
    DELETE FROM illustrer
    WHERE id_jeu = get_id_jeu(_NOM);
    if (select ID_JEU_IF_EXTENSION from jeu where id_jeu = get_id_jeu(_NOM)) is null then
        perform delete_note(get_id_jeu(_NOM));
    else
        delete from concerner where id_jeu = get_id_jeu(_NOM);
    end if;
    delete from jeu where id_jeu = get_id_jeu(_NOM); 
end;
$BODY$
LANGUAGE 'plpgsql' 
;

-- SELECT * FROM DELETE_GAME('Catane+');
