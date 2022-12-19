<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Notes des joueurs</h2>
        <br><br>
        <h5 class="header center black-text">Si plusieurs lignes de la table ont le même identifiant, cela signifie qu'une d'entre elles concerne le jeu et les autres les extensions utilisées lors de la partie.</h5>
        <br><br>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>

            <th>Id Note</th>    
            <th>Joueur à l'origine</th>
            <th>Jeu concerné</th>
            <th>Étend le jeu</th>
            <th>Score (/20)</th>
            <th>Commentaire</th>
            <th>Date de la note</th>
            <th>Nombre de joueurs lors de la partie notée</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/notes.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($note =  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$note['id_note'].'</td>';
                echo '<td>'.$note['pseudo'].'</td>';
                echo '<td>'.$note['nom'].'</td>';
                echo '<td>'.$note['etend'].'</td>';
                echo '<td>'.$note['score'].'</td>';
                echo '<td>'.$note['commentaire'].'</td>';
                echo '<td>'.$note['date_note'].'</td>';
                echo '<td>'.$note['nb_joueurs'].'</td>';
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
