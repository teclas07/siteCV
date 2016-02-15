<?php
require_once('config.php');
define("EXT", ".php");
define("PATH", "public/");
if(! empty($_GET['url']))
    {
        $url = $_GET['url'];
    }
    else {
        $url = 'blog';
    }
require_once "public/includes/header".EXT;
require_once "public/includes/navigation".EXT;

switch ($url) {

    case 'blog':
        include PATH.'blog'.EXT;
    break;

    case 'add-comment':
      echo('toto');
     break;

    default:
        header("Location: blog.php?url=blog");
    break;
}
require_once "public/includes/footer".EXT;

?>
