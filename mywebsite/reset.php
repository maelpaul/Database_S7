<html>
    <?php include("utils/header.php"); ?>
    <body>
    <?php include("utils/tabs.php"); ?>
        <?php
            include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
            /* On crée une table avec des données: */
            $remove = file_get_contents('../sql/clean.sql');
            $create = file_get_contents('../sql/create.sql');
            $insert = file_get_contents('../sql/add_data.sql');
            /* Execution d'une requete multiple */
                $remove_res = pg_query($connection, $remove);
                $create_res = pg_query($connection, $create);
                $insert_res = pg_query($connection, $insert);
            ?>
            <?php if($remove_res and $create_res and $insert_res) : ?>
                <div class="row">
                    <div class="col s4 m4 offset-s4 offset-m4">
                    <div class="card green darken-1">
                        <div class="card-content white-text">
                        <span class="card-title">Création des tables et insertion des données réussies</span>
                        </div>
                        <div class="card-action">
                        <a href="gestion.php">Retour à la page de gestion</a>
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
                        <a href="gestion.php">Retour à la page de gestion</a>
                        </div>
                    </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php include("utils/footer.php"); ?>
    </body>
</html>
