<?php
require 'lib/autoload.php';

  $db = DBFactory::getMysqlConnectionWithPDO();
  $ArticleManager = new ArticleManagerPDO($db);
  $AuthorManager = new AuthorManagerPDO($db);
  $CommentManager = new CommentManagerPDO($db);
  $CategoryManager = new CategoryManagerPDO($db);
  $UserManager = new UserManagerPDO($db);
?>

<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <title>Blog</title>
</head>

<body>
  <div class="row">
    <div class="col s12 m6">
          <?php
          foreach ($ArticleManager->getList(0, 5) as $articles => $article) {
            $author = $AuthorManager->getUnique($article->getAuthorId());
            $category = $CategoryManager->getUnique($article->getCategoryId());
            $Comments = $CommentManager->getListByArticleId(-1, -1, $article->getArticleID());
            $nbr = count($Comments);
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
                  if (!strtotime($article->getEditTimestamp()) == 0) print_r('Edit at '.$article->getEditTimestamp().' in '.$category->getName());
                  ?>
                </div>
                <!-- Modal Trigger -->
                <button class="waves-effect waves-light btn" onclick="toggle_visibility('test#<?php print_r($article->getArticleId()); ?>');"><i class="material-icons left">comment</i><?php $nbr > 1 ? print_r($nbr.' comments.') : print_r($nbr.' comment.') ?></button>
                <div id="test#<?php print_r($article->getArticleId()); ?>" style="display:none">
                  <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="Comment" class="materialize-textarea"></textarea>
                          <label for="Comment">Let a comment ..</label>
                        </div>
                        <div class="input-field col s12">
                          <button class="waves-effect waves-light btn"><i class="material-icons left">done</i>submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <?php
                  foreach ($CommentManager->getListByArticleId(-1, -1, $article->getArticleID()) as $comments => $comment) {
                    $User = $UserManager->getUnique($comment->getUserId());
                  ?>
                  <div class="card">
                   <div class="card-content">
                     <span class="card-title"><?php print_r($User->getLogin());?></span>
                     <p><?php print_r($comment->getContent());?></p>
                   </div>
                   <div class="card-action">
                     <a href="#"><?php print_r($User->getLogin().' Posted at '.$comment->getPostTimestamp());?></a>
                   </div>
                 </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
  </div>
  </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
</script>
<script type="text/javascript">
   function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
   }
</script>
</html>
