<html">
<?php include("utils/headermodif.php"); ?>
    <body>
    <center>
    <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <br><br><br><br><br>

<h5 class="header center s12 light">Entrez les informations en veillant à ne laisser aucun champ vide (excepté le champ "Jeu étendu") :</h5>
    <form action="add_game_validation.php" method="post">

    <br><br>Nom du jeu<br>
    <input type="text" name="nom" value=""/> 

<br><br>

Éditeur<br>
    <input type="text" name="editeur" value=""/>

<br><br>

Année de parution <br>
<select name="annee" size="1">
<option value = ''></option>
<?php
    for ($i = 1950; $i <= 2023; $i++) {
        echo '<option value="'.$i.'">'.$i.'</option>';
    }
?>

</select>

<br><br>

Durée (en minutes)<br>
<select name="duree" size="1">
<option value = ''></option>
<?php
    for ($i = 5; $i <= 120; $i = $i + 5) {
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

Est une extension<br>
<select name="ext" size="1">

    <option value=0>false</option>
    <option value=1>true</option>

</select>

<br><br>

Jeu étendu<br>
<select name="etend" size="1">
<option value = ''></option>
<?php
    $requete = ("select nom from jeu where jeu.ID_JEU_IF_EXTENSION is NULL order by nom");
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
