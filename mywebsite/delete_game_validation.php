<html>
    <?php include("utils/header.php"); ?>
    <body>
    <?php include("utils/tabs.php"); ?>
        <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            $update = file_get_contents('../sql/update/delete_game.sql');
            $update_res = pg_query($connection, $update);
            $name =  pg_escape_literal($_POST["nom"]);
            $requete = "select * from DELETE_GAME($name)";
            $res = pg_query($connection,  $requete);
           
            ?>
            <?php if($res) : ?>
                <div class="row">
                    <div class="col s4 m4 offset-s4 offset-m4">
                    <div class="card green darken-1">
                        <div class="card-content white-text">
                        <span class="card-title">Suppression réussie</span>
                        </div>
                        <div class="card-action">
                        <a href="update.php">Retour à la page des mises à jour</a>
                        </div>
                    </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col s12 s4 m4 offset-s4 offset-m4">
                    <div class="card red darken-1">
                        <div class="card-content white-text">
                        <span class="card-title">Erreur</span>
                        </div>
                        <div class="card-action">
                        <a href="update.php">Retour à la page des mises à jour</a>
                        <?php  echo pg_last_error($connection); ?>
                        </div>
                    </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php include("utils/footer.php"); ?>
    </body>
</html>
