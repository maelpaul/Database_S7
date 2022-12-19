<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Commentaire qui laisse le moins indifférent</h2>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>
            <th>Commentaire</th>
    <th>Joueur à l'origine</th>
    <th>Jeu concerné (des extensions peuvent également être concernées)</th>
    <th>Score associé (/20)</th>
    <th>Date du commentaire</th>
            <th>Nombre de jugements</th>
            <th>Nombre de "utile"</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/nb_jugements_bis.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($row =  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$row['commentaire'].'</td>';
                echo '<td>'.$row['pseudo'].'</td>';
                echo '<td>'.$row['nom'].'</td>';
                echo '<td>'.$row['score'].'</td>';
                echo '<td>'.$row['date_note'].'</td>';
                echo '<td>'.$row['Nombre de jugements'].'</td>';
                echo '<td>'.$row['Nombre de \'utile\''].'</td>';
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
