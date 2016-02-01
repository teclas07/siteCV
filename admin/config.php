<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Blog</title>
  </head>
  <body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

    <div class="row">
    <form class="col s6" action="setup.php" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <input id="name" name="name" type="text" class="validate">
          <label for="name">Nom de la base de données</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="identifiant" name="identifiant" type="text" class="validate">
          <label for="identifiant">Identifiant</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Mot de passe</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="host" name="host" type="text" class="validate">
          <label for="host">Hôte de la base de données</label>
        </div>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light" type="submit">Configurer
           <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>

  </body>
</html>
