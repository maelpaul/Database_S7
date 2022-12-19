<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

<?php $n = $_POST['my_html_input_tag']; ?>

<h2 class="header center black-text">Liste des jeux critiqués classés par catégories pour le thème <?php echo $n ?></h2>
<br><br>
        <h5 class="header center black-text">La table peut être vide s'il n'y a pas de jeu critiqué ayant le thème <?php echo $n?>.</h5>
        <br><br>
        
<?php
    include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
    /* On crée une table avec des données: */
    $creation = file_get_contents('../sql/queries/classement_jeu_bis2.sql');
    /* Execution d'une requete multiple */
        pg_query($connection, $creation);
    ?>

    <table>
        <tr>
        <th>Jeu</th>
        <th>Étend le jeu</th>
            <th>Catégorie</th>
        </tr>

<?php
$requete = 'select * from JEU_THEME(\''.$n.'\')';
/* Si l'execution est reussie... */
$res = pg_query($connection, $requete);
if($res) {
/* ... on récupère un tableau stockant le résultat */
    while ($com =  pg_fetch_assoc($res)) {
        echo "\t".'<tr><td>'.$com['Jeu'].'</td>';
        echo '<td>'.$com['Etend'].'</td>';
        echo '<td>'.$com['Categorie'].'</td>';
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