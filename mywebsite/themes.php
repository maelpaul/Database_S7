<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Thèmes</h2>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>
            <th>Nom</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/themes.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($th =  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$th['nom'].'</td>';
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
