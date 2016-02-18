<?php
require_once('config.php');
session_start();
define("EXT", ".php");
define("PATH_FN", "public/functions/");
if(! empty($_GET['focus']))
    {
        $url = $_GET['focus'];
    }
    else {
        $url = 'home';
    }

switch ($url) {

    case 'null':
        exit;
    break;

    case 'signin':
      if (isset($_POST['toto']) && $_POST['toto'] == '123') {
        include PATH_FN.'signin'.EXT;
      }

      if (!empty($_SESSION['User'])) {
        header("Location: index.php");
      } else {
        header("Location: signin.php");
      }
    break;

    case 'signup':
      if (isset($_POST['toto']) && $_POST['toto'] == '123') {
        include PATH_FN.'signup'.EXT;
      }
    break;

    case 'logout':
      include PATH_FN.'logout'.EXT;
      header("Location: index.php");
    break;

    default:
      header("Location: action.php?focus=null");
    break;
}

?>
