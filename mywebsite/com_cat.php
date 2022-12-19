<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

<?php $n = $_POST['my_html_input_tag']; ?>

<h2 class="header center black-text">Liste des commentaires sur un jeu dans l'une des catégories préférées de <?php echo $n ?></h2>
<br><br>
        <h5 class="header center black-text">Le jeu et la catégorie sont tirés au sort (la catégorie fait partie des catégories préférées de <?php echo $n ?> et le jeu fait partie de la catégorie tirée au sort).</h5>
        <br>
        <h5 class="header center black-text">La table peut être vide s'il n'y a pas de commentaire concernant le jeu tiré au sort.</h5>
        <br><br>
        
<?php
    include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
    /* On crée une table avec des données: */
    $creation = file_get_contents('../sql/queries/commentaire_categorie_prefere_bis.sql');
    /* Execution d'une requete multiple */
        pg_query($connection, $creation);
    ?>

    <table>
        <tr>
        <th>Jeu</th>
        <th>Étend le jeu</th>
            <th>Catégorie</th>
            <th>Commentaire</th>
            <th>Joueur à l'origine</th>
            <th>Score (/20)</th>
            <th>Date du commentaire</th>   
        </tr>

<?php
$requete = 'select * from JOUEUR_COMMENTAIRE_CATEGORIE(\''.$n.'\')';
/* Si l'execution est reussie... */
$res = pg_query($connection, $requete);
if($res) {
/* ... on récupère un tableau stockant le résultat */
    while ($com =  pg_fetch_assoc($res)) {
        echo "\t".'<tr><td>'.$com['Nom du jeu'].'</td>';
        echo '<td>'.$com['Etend'].'</td>';
        echo '<td>'.$com['Nom de la catégorie'].'</td>';
        echo '<td>'.$com['Commentaire'].'</td>';
        echo '<td>'.$com['Joueur'].'</td>';
        echo '<td>'.$com['Score donnée par le joueur'].'</td>';
        echo '<td>'.$com['Date du commentaire'].'</td>';
        echo '</tr>'."\n";
    }
}
pg_free_result($res);
/*fermeture de la connexion avec la base*/
pg_close($connection);
?>
</table>

<div class="row center card-action black-text">
<br><br>
                <a href="queries.php">Retour aux consultations</a>
</br></br>
                </div>

                <?php include("utils/footer.php"); ?>
    </body>
</html>