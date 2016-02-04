<?php
require 'lib/autoload.php';

  $db = DBFactory::getMysqlConnectionWithPDO();
  $ArticleManager = new ArticleManagerPDO($db);
  $AuthorManager = new AuthorManagerPDO($db);
  $CommentManager = new CommentManagerPDO($db);
?>

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
          foreach ($ArticleManager->getList(0, 5) as $articles => $article) {
            $author = $AuthorManager->getUnique($article->getAuthorId());
            //$comments = $CommentManager->getByArticleId($article->getArticleId());
            ?>
            <div class="card blue-grey darken-1 z-depth-2">
              <div class="card-content white-text">
                <span class="card-title"><?php print_r($article->getTitle()); ?></span>
                <p><?php print_r($article->getContent());?></p>
              </div>
              <div class="card-action">
                <div class="chip" style="margin-right:20px">
                  <?php
                  print_r($author->getUsername().' ');
                  print_r($article->getPostTimestamp().' ');
                  if (!strtotime($article->getEditTimestamp()) == 0) print_r('Edit at '.$article->getEditTimestamp());
                  ?>
                </div>
                <!-- Modal Trigger -->
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">
                  
                </a>

                <!-- Modal Structure -->
                <div id="modal1" class="modal bottom-sheet">
                  <div class="modal-content">
                    <h5></h5>
                    <p></p>
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
