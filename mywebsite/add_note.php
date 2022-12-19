<html">
<?php include("utils/headermodif.php"); ?>
    <body>
    <center>
    <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <br><br><br><br><br>

<h5 class="header center s12 light">Entrez les informations en veillant à ne laisser aucun champ vide (excepté le champ "Commentaire") :</h5>
    <form action="add_note_validation.php" method="post">

    <br><br>Pseudo du joueur<br>
<select name="pseudo" size="1">
<option value = ''></option>
<?php
    $requete = ("select pseudo from joueur where pseudo <> 'Deleted User' order by pseudo");
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($j =  pg_fetch_assoc($res)) {
                echo '<option value="'.$j['pseudo'].'">'.$j['pseudo'].'</option>';
            }
            /*liberation de l'objet requete:*/
        }
            pg_free_result($res);
            /*fermeture de la connexion avec la base*/
?>

</select>

<br><br>

Nom du jeu<br>
<select name="jeu" size="1">
<option value = ''></option>
<?php
    $requete2 = ("select nom from jeu where jeu.ID_JEU_IF_EXTENSION is NULL order by nom");
    /* Si l'execution est reussie... */
    $res2 = pg_query($connection, $requete2);
    if($res2) {
        /* ... on récupère un tableau stockant le résultat */
            while ($j =  pg_fetch_assoc($res2)) {
                echo '<option value="'.$j['nom'].'">'.$j['nom'].'</option>';
            }
            /*liberation de l'objet requete:*/
        }
            pg_free_result($res2);
            /*fermeture de la connexion avec la base*/
            pg_close($connection);
?>

</select>

<br><br>

Score du jeu (/20)<br>
<select name="score" size="1">
<option value = ''></option>
<?php
    for ($i = 0; $i <= 20; $i++) {
        echo '<option value="'.$i.'">'.$i.'</option>';
    }
?>

</select>

<br><br>

Nombre de joueurs<br>
<select name="nb" size="1">
<option value = ''></option>
<?php
    for ($i = 1; $i <= 10; $i++) {
        echo '<option value="'.$i.'">'.$i.'</option>';
    }
?>

</select>

<br><br>

Commentaire <br>
<input type="text" name="commentaire" value=""/>
<br><br>
<input type="submit" name="my_form_submit_button" 
           value="Valider"/>
</form>
<div class="row center card-action black-text">
        <br><br>
                        <a href="update.php">Retour à la page des mises à jour</a>
    </br></br>
                        </div>
    </center>
</body>
</html>
