<?php
require './lib/autoload.php';

  if (isset($_POST['submit'])) {
    $db = DBFactory::getMysqlConnectionWithPDO();
    $UserManager = new UserManagerPDO($db);
    $UserConfirmationManager = new UserConfirmationManagerPDO($db);

    $User = new User();
    $UserConfirmation = new UserConfirmation();
    $ErrorsValue = array();

    $User->setLogin($_POST['login']);
    $User->setEmail($_POST['email']);
    $User->setPassword($_POST['password'], $_POST['confirmPassword']);
    $UserConfirmation->setLogin($_POST['login']);
    $UserConfirmation->setEmail($_POST['email']);

    try {
      $UserManager->save($User);
      $UserConfirmation->setToken(md5($_POST['login'].$_POST['email'].date('mY')));
      try {
        $UserConfirmationManager->save($UserConfirmation);
        $Email = new EmailManager($UserConfirmation);

        $Email->send();
      } catch (Exception $e) {
        die($e->getMessage());
      }
    } catch (Exception $e) {
      $Errors = $User->getErrors();

      foreach ($Errors as $errors => $error) {
        array_push($ErrorsValue, $error, $User->getError($error));
        echo($User->getError($error));
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
        <div class="col s3 offset-s4">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <form class="col s12" action="signup.php" method="POST">
                  <h4 style="color:#4db6ac">Inscrivez-vous</h4>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="login" name="login" type="text" class="validate" required="" aria-required="true">
                      <label for="login" data-error="wrong">Login</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="email" name="email" type="email" class="validate" required="" aria-required="true">
                      <label for="email">Email</label>
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
                      <input id="confirmPassword" name="confirmPassword" type="password" class="validate" required="" aria-required="true">
                      <label for="confirmPassword">Password</label>
                      <p style="color:#4db6ac">Déjà un compte ?<a href="signin.php"> connectez-vous.</a></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <button type="submit" class="waves-effect waves-light btn" name="submit" value="submit"><i class="material-icons right">done</i>Submit</button>
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
