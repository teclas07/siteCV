<?php
foreach ($ArticleManager->getList() as $articles => $article) {
  $author = $AuthorManager->getUnique($article->getAuthorId());
  $comments = $CommentManager->getList('article_id', (int)$article->getArticleId());
  $nbr = count($comments);
?>

<div class="card grey lighten-4 z-depth-1">
  <div class="card-content white-text">
    <span class="card-title" style="color:#4db6ac"><?php print_r($article->getTitle()); ?></span>
      <p style="color:#4db6ac">
        <?php print_r($article->getContent()); ?>
      </p>
    </div>
    <div class="card-action">
      <div class="teal lighten-2 chip" style="margin-right:20px; color:white;">
        <?php print_r($author->getUsername().' '.$article->getPostTimestamp()); ?>
      </div>
      <button class="orange darken-3 waves-effect waves-light btn" onclick="toggle_visibility('test#1')"><i class="material-icons left">comment</i>
        <?php $nbr > 1 ? print_r($nbr.' Comments.') : print_r($nbr.' Comments.') ?>
      </button>
<?php } ?>
