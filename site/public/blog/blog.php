<?php
  session_start();
  include('app/autoload.php');
  $db = DBFactory::getMysqlConnectionWithPDO();
  $ArticleManager = new ArticleManagerPDO($db);
  $AuthorManager = new AuthorManagerPDO($db);
  $CommentManager = new CommentManagerPDO($db);
  $CategoryManager = new CategoryManagerPDO($db);
  $UserManager = new UserManagerPDO($db);
?>

<main>
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
                          <textarea id="Comment" class="materialize-textarea" style="color:#4db6ac"></textarea>
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
                     <p style="color:#4db6ac"><?php print_r($comment->getContent());?></p>
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
</main>
