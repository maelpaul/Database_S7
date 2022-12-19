<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Classement des jeux (chaque note est pondérée par son indice de confiance)</h2>
        <br><br>
                 <h5 class="header center black-text">Si le score est égal à -1, cela signifie que le jeu n'a pas encore été noté.</h5>
         <br><br>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>

            <th>Jeu</th>
            <th>Étend le jeu</th>
            <th>Score (/20)</th>
            <th>Nombre de notes</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/classement_jeu_ic.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($p=  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$p['nom'].'</td>';
                echo '<td>'.$p['etend'].'</td>';
                if (is_null($p['moyenne']))
                    echo '<td>'."Pas de note".'</td>';
                else
                    echo '<td>'.$p['moyenne'].'</td>';
                echo '<td>'.$p['total_note'].'</td>';
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
