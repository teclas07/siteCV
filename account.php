<?php
require_once('config.php');
session_start();
define("EXT", ".php");
define("PATH", "public/");
if(! empty($_GET['url']))
    {
        $url = $_GET['url'];
    }
    else {
        $url = 'account';
    }

  require_once "public/includes/header".EXT;
  require_once "public/includes/navigation".EXT;

  switch ($url) {

      case 'account':
          include PATH.'account'.EXT;
      break;

      default:
          header("Location: account.php?url=account");
      break;
  }
  require_once "public/includes/footer".EXT;

?>
