<?php
  require './lib/autoload.php';

  $db = DBFactory::getMysqlConnectionWithPDO();
  $UserManager = new UserManagerPDO($db);
  $UserConfirmationManager = new UserConfirmationManagerPDO($db);
  $result;

  if(isset($_GET['log'])) {
    $User = $UserManager->getUniqueByLogin($_GET['log']);
    $Confirm = $UserConfirmationManager->getUniqueByLogin($_GET['log']);

    if ($User->getActive()) {
      $result = "Votre compte est déjà activé.";
    } else {
      if ($_GET['token'] == $Confirm->getToken()) {
        $User->setActive(true);

        try {
          $UserManager->save($User);
          $result = "Votre à bien été activé.";
        } catch(Exception $e) {
          die($e->getMessage());
          $result = "Un erreur est survenue.";
        }
      } else {
        $result = "Un erreur est survenue.";
      }
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Romain MARGHERITI</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <header>
      <nav>
        <div class="nav-wrapper light-blue darken-3">
          <ul id="nav-mobile" class="center hide-on-med-and-down">
            <li><a href="index.html">Index</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="#">link3</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Statut de votre compte</span>
              <p><?php isset($result) ? print_r($result) : print_r(" ")  ?></p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer class="page-footer light-blue darken-3">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
            </ul>
          </div>
        </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
  </footer>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</html>
