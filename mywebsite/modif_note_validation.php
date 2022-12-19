<html>
    <?php include("utils/header.php"); ?>
    <body>
    <?php include("utils/tabs.php"); ?>
        <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            $update = file_get_contents('../sql/update/modif_note.sql');
            $update_res = pg_query($connection, $update);
            $num =  $_POST["num"];
            $score = $_POST["score"];
            $com = pg_escape_literal($_POST["com"]);
            $nb_joueur = $_POST["nb"];
            $requete = "select * from MODIFY_NOTE($num, $score, $com, $nb_joueur)";
            $res = pg_query($connection,  $requete);
           
            ?>
            <?php if($res) : ?>
                <div class="row">
                    <div class="col s4 m4 offset-s4 offset-m4">
                    <div class="card green darken-1">
                        <div class="card-content white-text">
                        <span class="card-title">Modification réussie</span>
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
