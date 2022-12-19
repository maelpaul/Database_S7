<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Classement des joueurs par nombre de jeux notés</h2>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>
            <th>Pseudo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Nombre de jeux notés</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/nb_notes.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($joueur =  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$joueur['pseudo'].'</td>';
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
        
        <div class="row center card-action black-text">
        <br><br>
                        <a href="stats.php">Retour aux statistiques</a>
    </br></br>
                        </div>

        <?php include("utils/footer.php"); ?>
    </body>
</html>
