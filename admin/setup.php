<?php
  include 'dbb.php';

  $conn = new bdd($_POST['host'], $_POST['name'], $_POST['identifiant'], $_POST['password']);

  $conn->createBlogTable();
  $conn->createAuteurTable();
  $conn->createCommentaireTable();
  $conn->createUtilisateurTable();
 ?>
