<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Jeux</h2>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>

            <th>Nom</th>
            <th>Éditeur</th>
            <th>Année de parution</th>
            <th>Durée (en minutes)</th>
            <th>Nombre de joueurs</th>
            <th>Est une extension</th>
            <th>Étend le jeu</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/jeux.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($jeu =  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$jeu['nom'].'</td>';
                echo '<td>'.$jeu['editeur'].'</td>';
                echo '<td>'.$jeu['annee_parution'].'</td>';
                echo '<td>'.$jeu['duree'].'</td>';
                echo '<td>'.$jeu['nb_joueurs'].'</td>';
                if ($jeu['extension'] == 't') {echo '<td> true </td>';}
                else {echo '<td> false </td>';}
                echo '<td>'.$jeu['etend'].'</td>';
                echo '</tr>'."\n";
            }
            /*liberation de l'objet requete:*/
        }
            pg_free_result($res);
            /*fermeture de la connexion avec la base*/
            pg_close($connection);
?>
        </table>
        
        <div class="row center card-action black-text">
        <br><br>
                        <a href="infos.php">Retour aux informations</a>
    </br></br>
                        </div>

        <?php include("utils/footer.php"); ?>
    </body>
</html>
