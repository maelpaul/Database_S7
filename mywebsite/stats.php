<html>
    <?php include("utils/header.php"); ?>
    <body>
    <?php include("utils/tabs.php"); ?>

    <h2 class="header center black-text">Statistiques</h2>

    <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Afficher le classement des joueurs par nombre de jeux notés :</h5>
      </div>
      <div class="row left">
        <a href="nb_notes.php" id="button" class="btn waves-effect waves-light red">Consulter le classement</a>
      </div>
      <br><br>

    </div>
  </div>

  <br><br><br>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Afficher la liste des commentaires les plus récents :</h5>
      </div>
      <div class="row left">
        <a href="n_derniers.php" id="button" class="btn waves-effect waves-light red">Consulter la liste</a>
      </div>
      <br><br>

    </div>
  </div>

  <br><br><br>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Afficher le commentaire qui laisse le moins indifférent :</h5>
      </div>
      <div class="row left">
        <a href="nb_jugements.php" id="button" class="btn waves-effect waves-light red">Consulter le commentaire</a>
      </div>
      <br><br>

    </div>
  </div>

  <br><br><br>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Afficher le classement des commentaires classés selon leur indice de confiance :</h5>
      </div>
      <div class="row left">
        <a href="indice_confiance.php" id="button" class="btn waves-effect waves-light red">Consulter le classement</a>
      </div>
      <br><br>

    </div>
  </div>

  <br><br><br>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Afficher le classement des jeux (chaque note est pondérée par son indice de confiance) :</h5>
      </div>
      <div class="row left">
        <a href="classement_jeu.php" id="button" class="btn waves-effect waves-light red">Consulter le classement</a>
      </div>
      <br><br>

    </div>
  </div>
  <br><br>
            <?php include("utils/footer.php"); ?>
    </body>
</html>
