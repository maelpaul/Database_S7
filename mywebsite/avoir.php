<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Thèmes des jeux</h2>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>
            <th>Jeu</th>
            <th>Étend le jeu</th>
            <th>Thème</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/avoir.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($jeu =  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$jeu['jeu'].'</td>';
                echo '<td>'.$jeu['etend'].'</td>';
                echo '<td>'.$jeu['theme'].'</td>';
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
