<?php
require '../lib/autoload.php';

  $db = DBFactory::getMysqlConnectionWithPDO();
  $ArticleManager = new ArticleManagerPDO($db);
  $article = new Article();

  if(isset($_GET['edit'])) {
    $article = $ArticleManager->getUnique($_GET['edit']);
  }
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

  <title>add article</title>
</head>

<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <main>
    <div class="row">
      <form class="col s12" action="articles.php" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input id="title" name="title" type="text" class="validate" value="<?php print_r($article->getTitle());?>">
            <label for="title">Title</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <textarea id="content" name="content" class="materialize-textarea"><?php print_r($article->getContent());?></textarea>
            <label for="content"></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <button type="submit" class="waves-effect waves-light btn" name="<?php isset($_GET['edit']) ? print_r('edit'): print_r('add') ?>" value="<?php print_r($article->getArticleId());?>">Enregistrer</button>
          </div>
        </div>
      </form>
    </div>
  </main>
  </body>
</html>
