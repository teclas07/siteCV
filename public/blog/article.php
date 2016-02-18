<?php
  $db = DBFactory::getMysqlConnectionWithPDO();
  $ArticleManager = new ArticleManagerPDO($db);
  $AuthorManager = new AuthorManagerPDO($db);
  $CommentManager = new CommentManagerPDO($db);
  $CategoryManager = new CategoryManagerPDO($db);
  $UserManager = new UserManagerPDO($db);
?>
<main>
  <div class="row">
    <div class="col s6  offset-s3">
      <?php include('content.php') ?>
      <?php include('comment.php') ?>
    </div>
  </div>
</main>
