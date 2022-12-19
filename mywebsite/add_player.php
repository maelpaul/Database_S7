<html">
<?php include("utils/headermodif.php"); ?>
    <body>
    <center>
    <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            ?>
            <br><br><br><br><br>

<h5 class="header center s12 light">Entrez les informations en veillant à ne laisser aucun champ vide :</h5>
    <form action="add_player_validation.php" method="post">

    <br><br>

    Pseudo<br>
    <input type="text" name="pseudo" value=""/> 
    <br>
    <br>Nom<br>
    <input type="text" name="nom" value=""/>
    <br>
    <br>Prénom<br>
    <input type="text" name="prenom" value=""/>
    <br>
    <br>Mail<br>
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
