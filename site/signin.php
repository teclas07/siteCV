<?php

define("EXT", ".php");
define("PATH", "public/");
if(! empty($_GET['url']))
    {
        $url = $_GET['url'];
    }
    else {
        $url = 'signin';
    }
require_once "public/includes/header".EXT;
require_once "public/includes/navigation".EXT;

switch ($url) {

    case 'signin':
        include PATH.'signin'.EXT;
    break;

    case 'password_forget':
        include PATH.'password_forget'.EXT;
    break;

    default:
        header("Location: signin.php?url=signin");
    break;
}
require_once "public/includes/footer".EXT;

?>
