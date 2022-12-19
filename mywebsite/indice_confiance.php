<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Classement des commentaires classés selon leur indice de confiance</h2>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>

            <th>Pseudo</th>
            <th>Score (/20)</th>
            <th>Commentaire</th>
            <th>Jeu associé (des extensions peuvent également être associées)</th>
            <th>Indice de confiance</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/indice_confiance.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($p=  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$p['pseudo'].'</td>';
                echo '<td>'.$p['score'].'</td>';
                echo '<td>'.$p['commentaire'].'</td>';
                echo '<td>'.$p['nom'].'</td>';
                echo '<td>'.$p['ic'].'</td>';
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