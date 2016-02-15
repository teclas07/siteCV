<?php
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
      }
    }
  }
