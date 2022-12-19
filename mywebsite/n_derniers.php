<html">
<?php include("utils/headermodif.php"); ?>
    <body>
    <center>
    <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
                        <br><br><br><br><br>

<h5 class="header center s12 light">Sélectionnez le nombre de commentaires voulus :</h5>
    <form action="n_derniers_coms.php" method="post">
<select name="my_html_input_tag" size="1">
<option value = ''></option>
<?php
    $requete = "select id_note from note order by id_note";
    /* Si l'execution est reussie... */
    $res = pg_query($connection, $requete);
    if($res) {
        /* ... on récupère un tableau stockant le résultat */
            while ($nt =  pg_fetch_assoc($res)) {
                echo '<option value="'.$nt['id_note'].'">'.$nt['id_note'].'</option>';
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
                        <a href="stats.php">Retour aux statistiques</a>
    </br></br>
                        </div>
    </center>
</body>
</html>
