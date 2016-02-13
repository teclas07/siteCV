<?php

define("EXT", ".php");
define("PATH", "public/");
if(! empty($_GET['url']))
    {
        $url = $_GET['url'];
    }
    else {
        $url = 'signup';
    }
require_once "public/includes/header".EXT;
require_once "public/includes/navigation".EXT;

switch ($url) {

    case 'signup':
        include PATH.'signup'.EXT;
    break;

    default:
        header("Location: signup.php?url=signup");
    break;
}
require_once "public/includes/footer".EXT;

?>
