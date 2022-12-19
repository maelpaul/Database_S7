<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

<?php $n = $_POST['my_html_input_tag']; ?>

<h2 class="header center black-text">Liste des <?php echo $n ?> commentaires les plus récents</h2>
    <?php
    include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
    /* On crée une table avec des données: */
    $creation = file_get_contents('../sql/queries/n_derniers_commentaires_bis.sql');
    /* Execution d'une requete multiple */
        pg_query($connection, $creation);
    ?>

    <table>
        <tr>
    <th>Commentaire</th>
    <th>Joueur à l'origine</th>
    <th>Jeu concerné (des extensions peuvent également être concernées)</th>
    <th>Score associé (/20)</th>
    <th>Date du commentaire</th>
        </tr>

<?php
$requete = "select * from COMMENTAIRES_RECENT($n)";
/* Si l'execution est reussie... */
$res = pg_query($connection, $requete);
if($res) {
/* ... on récupère un tableau stockant le résultat */
    while ($com =  pg_fetch_assoc($res)) {
        echo "\t".'<tr><td>'.$com['Commentaires les plus récents'].'</td>';
        echo '<td>'.$com['Joueurs à l\'origine'].'</td>';
        echo '<td>'.$com['Jeux concernés'].'</td>';
        echo '<td>'.$com['Score associé'].'</td>';
        echo '<td>'.$com['Date du commentaire'].'</td>';
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