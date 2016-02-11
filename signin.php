<?php
  require './lib/autoload.php';
  session_start();
  $db = DBFactory::getMysqlConnectionWithPDO();
  $UserManager = new UserManagerPDO($db);

  if (isset($_POST['signin'])) {
    $User = new User();
    $User = $UserManager->getUniqueByLogin($_POST['login']);

    if ($User != false) {
      if ($User->getPassword() == md5($_POST['password'])) {
        $_SESSION['User'] = $User;
      } else {
        unset($User);
        echo('Mauvais mot de passe.');
      }
    } else {
      echo('ce login n\'existe pas.');
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
            <li><a href="#"><?php if(isset($_SESSION['User'])) { print_r($_SESSION['User']->getLogin()); }?></a></li>
          </ul>
        </div>
      </nav>
    </header>

    <main>
      <div class="row">
        <div class="col s3 offset-s4">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <form class="col s12" action="signin.php" method="post">
                  <h4 style="color:#4db6ac">Connectez-vous</h4>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="login" name="login" type="text" class="validate" required="" aria-required="true">
                      <label for="login">Login</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="password" name="password" type="password" class="validate" required="" aria-required="true">
                      <label for="password">Password</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <button type="submit" class="waves-effect waves-light btn" name="signin"><i class="material-icons right">done</i>Submit</button>
                    </div>
                  </div>
                </form>
              </div>
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
