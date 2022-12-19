<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Illustrateurs de jeux</h2>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>

            <th>Nom</th>
            <th>Prénom</th>
            <th>Jeu illustré</th>
            <th>Étend le jeu</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/illustrer.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($p=  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$p['nom'].'</td>';
                echo '<td>'.$p['prenom'].'</td>';
                echo '<td>'.$p['jeu'].'</td>';
                echo '<td>'.$p['etend'].'</td>';
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
