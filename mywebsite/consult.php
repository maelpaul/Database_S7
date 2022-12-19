<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <h2>Exemple de requête PHP PostgreSQL</h2>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            /* On crée une table avec des données: */
            $creation = file_get_contents('sql/create.sql');
            $insert = file_get_contents('sql/add_data.sql');
            /* Execution d'une requete multiple */
                pg_query($connection, $creation);
                pg_query($connection, $insert);
                // echo "Création de la table JOUEUR\n";
            ?>
            <table>
                <tr>
            <th>Id_joueur</th>
            <th>Pseudo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Nombre de jeux notés</th>
                </tr>
<?php
    $requete = file_get_contents('sql/select.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($joueur =  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$joueur['id_joueur'].'</td>';
                echo '<td>'.$joueur['pseudo'].'</td>';
                echo '<td>'.$joueur['nom'].'</td>';
                echo '<td>'.$joueur['prenom'].'</td>';
                echo '<td>'.$joueur['mail'].'</td>';
                echo '<td>'.$joueur['Nombre de jeux notés'].'</td>';
                echo '</tr>'."\n";
            }
            /*liberation de l'objet requete:*/
        }
            pg_free_result($res);
            /*fermeture de la connexion avec la base*/
            pg_close($connection);
?>
        </table>
    </body>
</html>
