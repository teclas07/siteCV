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
