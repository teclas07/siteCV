<?php
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
