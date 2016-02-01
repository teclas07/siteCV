<?php
  class EntityManagerFactory {
    $servername;
    $username;
    $password;
    function EntityManagerFactory($servername, $username, $password) {
      $this->serverbale = $servername;
      $this->username = $username;
      $this->password = $password;

      $link = mysql_connect('example.com:3307', 'mysql_user', 'mysql_password');
      if (!$link) {
        die('Connexion impossible : ' . mysql_error());
      }
      echo 'Connecté correctement';
    }
  }
?>
