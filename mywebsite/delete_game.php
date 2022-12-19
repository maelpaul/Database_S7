<html">
<?php include("utils/headermodif.php"); ?>
    <body>
    <center>
    <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <br><br><br><br><br>

<h5 class="header center s12 light">Entrez les informations en veillant à ne laisser aucun champ vide :</h5>
    <form action="delete_game_validation.php" method="post">

<br><br>

Nom du jeu à supprimer<br>
<select name="nom" size="1">
<option value = ''></option>
<?php
    $requete = ("select nom from jeu order by nom");
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($j =  pg_fetch_assoc($res)) {
                echo '<option value="'.$j['nom'].'">'.$j['nom'].'</option>';
            }
            /*liberation de l'objet requete:*/
        }
            pg_free_result($res);
            /*fermeture de la connexion avec la base*/
            pg_close($connection);
?>

</select>

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
