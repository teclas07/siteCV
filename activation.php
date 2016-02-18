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
        $url = 'activation';
    }
require_once "public/includes/header".EXT;
require_once "public/includes/navigation".EXT;

switch ($url) {

    case 'activation':
        include PATH.'activation'.EXT;
    break;

    default:
        header("Location: activation.php?url=activation");
    break;
}
require_once "public/includes/footer".EXT;
?>
