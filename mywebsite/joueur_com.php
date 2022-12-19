<html">

<?php include("utils/header.php"); ?>

    <body>

    <?php include("utils/tabs.php"); ?>

<?php $n = $_POST['my_html_input_tag']; ?>

<h2 class="header center black-text">Liste des joueurs ayant apprécié la note n°<?php echo $n ?></h2>
<br><br>
        <h5 class="header center black-text">Contenu de la note :</h5>
        <br><br>
        
<?php
    include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
    /* On crée une table avec des données: */
    $creation = file_get_contents('../sql/queries/recup_infos.sql');
    /* Execution d'une requete multiple */
        pg_query($connection, $creation);
    ?>

    <table>
        <tr>
        <th>Joueur à l'origine</th>
            <th>Jeu concerné (des extensions peuvent également être concernées)</th>
            <th>Score (/20)</th>
            <th>Commentaire</th>
            <th>Date de la note</th>  
        </tr>

<?php
$requete = "select * from INFOS($n)";
/* Si l'execution est reussie... */
$res = pg_query($connection, $requete);
if($res) {
/* ... on récupère un tableau stockant le résultat */
    while ($inf =  pg_fetch_assoc($res)) {
        echo "\t".'<tr><td>'.$inf['Joueurs à l\'origine'].'</td>';
        echo '<td>'.$inf['Jeux concernés'].'</td>';
        echo '<td>'.$inf['Score associé'].'</td>';
        echo '<td>'.$inf['Commentaires les plus récents'].'</td>';
        echo '<td>'.$inf['Date du commentaire'].'</td>';
        echo '</tr>'."\n";
    }
    /*liberation de l'objet requete:*/
}
    pg_free_result($res);
    /*fermeture de la connexion avec la base*/
    pg_close($connection);
?>
</table>

<br><br>

        <h5 class="header center black-text">Liste des joueurs ayant apprécié la note :</h5>
        <br><br>

    <?php
    include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
    /* On crée une table avec des données: */
    $creation2 = file_get_contents('../sql/queries/joueur_apprecie_commentaire.sql');
    /* Execution d'une requete multiple */
        pg_query($connection, $creation2);
    ?>

    <table>
        <tr>
        <th>Pseudo</th>    
        </tr>

<?php
$requete2 = "select * from JOUEURS_APPRECIE($n)";
/* Si l'execution est reussie... */
$res2 = pg_query($connection, $requete2);
if($res2) {
/* ... on récupère un tableau stockant le résultat */
    while ($com =  pg_fetch_assoc($res2)) {
        echo "\t".'<tr><td>'.$com['Joueurs qui ont apprécie le commentaire'].'</td>';
        echo '</tr>'."\n";
    }
    /*liberation de l'objet requete:*/
}
    pg_free_result($res2);
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