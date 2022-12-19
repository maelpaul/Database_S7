<html">

<?php include("utils/header.php"); ?>

<body>

  <?php include("utils/tabs.php"); ?>

  <h2 class="header center black-text">Gestion de la base de données</h2>
  
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Cliquez pour supprimer les tables de la base de données :</h5>
      </div>
      <div class="row left">
        <a href="clean.php" id="button" class="btn waves-effect waves-light red">Clean</a>
      </div>
      <br><br>

    </div>
  </div>

  <br><br>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Cliquez pour créer les tables de la base de données :</h5>
      </div>
      <div class="row left">
        <a href="create.php" id="button" class="btn waves-effect waves-light red">Create</a>
      </div>
      <br><br>

    </div>
  </div>

  <br><br>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Cliquez pour insérer les données dans la base :</h5>
      </div>
      <div class="row left">
        <a href="add_data.php" id="button" class="btn waves-effect waves-light red">Insert</a>
      </div>
      <br><br>

    </div>
  </div>

  <br><br>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row left">
        <h5 class="header col s12 light">Cliquez pour réinitialiser la base de données :</h5>
      </div>
      <div class="row left">
        <a href="reset.php" id="button" class="btn waves-effect waves-light red">Reset</a>
      </div>
      <br><br>

    </div>
  </div>

  <?php include("utils/footer.php"); ?>

  </body>
</html>