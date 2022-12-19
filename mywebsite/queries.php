<html">

<?php include("utils/header.php"); ?>

<body>

  <?php include("utils/tabs.php"); ?>

  <h2 class="header center black-text">Consultations des résultats des requêtes SQL</h2>
  
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Cliquez pour afficher la liste des jeux critiqués classés par catégories pour un thème donné :</h5>
      </div>
      <div class="row left">
        <a href="panel_theme_cat.php" id="button" class="btn waves-effect waves-light red">Consulter la liste</a>
      </div>
      <br><br>

    </div>
  </div>

  <br><br>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Cliquez pour afficher la liste des joueurs ayant apprécié un commentaire :</h5>
      </div>
      <div class="row left">
        <a href="panel_joueur_com.php" id="button" class="btn waves-effect waves-light red">Consulter la liste</a>
      </div>
      <br><br>

    </div>
  </div>

  <br><br>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Cliquez pour afficher, pour un joueur donné, la liste des commentaires sur un jeu dans l'une de ses catégories préférées :</h5>
      </div>
      <div class="row left">
        <a href="panel_com_cat.php" id="button" class="btn waves-effect waves-light red">Consulter la liste</a>
      </div>
      <br><br>

    </div>
  </div>
  <br><br>
  <?php include("utils/footer.php"); ?>

  </body>
</html>