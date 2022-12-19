<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

        <h2 class="header center black-text">Pertinence des notes</h2>
            <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <table>
                <tr>

            <th>Joueur à l'origine de l'avis</th>
            <th>Id Note concernée</th>    
            <th>Joueur à l'origine de la note</th>
            <th>Jeu concerné (des extensions peuvent également être concernées)</th>
            <th>Score (/20)</th>
            <th>Commentaire</th>
            <th>Date de la note</th>
            <th>Nombre de joueurs lors de la partie notée</th>
            <th>Pertinent</th>
                </tr>
<?php
    $requete = file_get_contents('../sql/queries/pertinence.sql');;
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($note =  pg_fetch_assoc($res)) {
                echo "\t".'<tr><td>'.$note['emetteur'].'</td>';
                echo '<td>'.$note['id_note'].'</td>';
                echo '<td>'.$note['editeur'].'</td>';
                echo '<td>'.$note['nom'].'</td>';
                echo '<td>'.$note['score'].'</td>';
                echo '<td>'.$note['commentaire'].'</td>';
                echo '<td>'.$note['date_note'].'</td>';
                echo '<td>'.$note['nb_joueurs'].'</td>';
                if ($note['pertinent'] == 't') {echo '<td> true </td>';}
                else {echo '<td> false </td>';}
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
