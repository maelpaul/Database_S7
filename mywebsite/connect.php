<?php

    $host = 'localhost';
    $dbname = 'jeux_de_plateau';
    $username = 'moi';
    $password = 'pass';
    $port = 5432;
 
    $dsn = "host=".$host." port=".$port." dbname=".$dbname." user=".$username." password=".$password;

    $connection = pg_connect($dsn);
    if(!$connection) {
        echo 'error';
    }
    if($connection){
        // echo "Connecté à $dbname avec succès!\n";
    }

?>
