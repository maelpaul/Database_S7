<html">
<?php include("utils/headermodif.php"); ?>
    <body>
    <center>
    <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <br><br><br><br><br>

<h5 class="header center s12 light">Entrez les informations en veillant à ne laisser aucun champ vide :</h5>
    <form action="modif_player_validation.php" method="post">

<br><br>

Pseudo du joueur à modifier<br>
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
                        pg_close($connection);
?>

</select>

<br><br>

Nouveau pseudo du joueur<br>
    <input type="text" name="new_pseudo" value=""/> 
    
    <br><br>

Nom du joueur<br>
    <input type="text" name="nom" value=""/> 


    <br><br>

Prénom du joueur<br>
    <input type="text" name="prenom" value=""/> 

    <br><br>

Mail du joueur<br>
    <input type="text" name="mail" value=""/> 

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
