<?php

define("EXT", ".php");
define("PATH", "public/");
if(! empty($_GET['url']))
    {
        $url = $_GET['url'];
    }
    else {
        $url = 'home';
    }
require_once "public/includes/header".EXT;
require_once "public/includes/navigation".EXT;

switch ($url) {

    case 'home':
        include PATH.'home'.EXT;
    break;

    default:
        header("Location: index.php?url=home");
    break;
}
require_once "public/includes/footer".EXT;

?>
