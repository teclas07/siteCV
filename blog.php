<?php include 'dbb.php' ?>
<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <title>Blog</title>
</head>

<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
    });
  </script>
  <div class="row">
    <div class="col s12 m6">
      <?php
        $conn = new bdd('localhost', 'sitecv', 'root', '');
        foreach($conn->getAllArticles() as $row) {
          $articleId = $row[0];
          ?>
          <div class="card blue-grey darken-1 z-depth-2">
            <div class="card-content white-text">
              <span class="card-title"><?php print_r($row[1]);?></span>
              <p><?php print_r($row[2]);?></p>
            </div>
            <div class="card-action">
              <div class="chip" style="margin-right:20px">
                <?php print_r($conn->getAuteurById($row[4])); ?> le <?php print_r($row[3]); ?>
              </div>
              <!-- Modal Trigger -->
              <a class="waves-effect waves-light btn modal-trigger" href="#modal1">
                <?php
                    $nbr = $conn->getNumberOfComment($articleId);
                    $comm;
                    if ($nbr <= 1) {
                      $comm = 'Commentaire';
                    }
                    else {
                      $comm = 'Commentaires';
                    }
                    print_r($nbr.' '.$comm);
                  ?>
              </a>

              <!-- Modal Structure -->
              <div id="modal1" class="modal bottom-sheet">
                <div class="modal-content">
                  <?php
                    foreach ($conn->getCommentFor($articleId) as $comment) {
                  ?>
                      <h4><?php print_r($conn->getUserById($articleId)); ?></h4>
                      <p><?php print_r($comment[3])?></p>
                  <?php
                    }
                  ?>
                </div>
                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
            ?>
          </div>
        </div>
      </body>
</html>
