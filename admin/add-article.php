<?php
require '../config.php';

  $db = DBFactory::getMysqlConnectionWithPDO();
  $ArticleManager = new ArticleManagerPDO($db);
  $CategoryManager = new CategoryManagerPDO($db);
  $Categories = $CategoryManager->getList();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>add article</title>
</head>

<body>
  <main>
    <a href="articles.php" class="waves-effect waves-light btn">Back to articles</a>
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
            <select multiple name="category">
              <option value="" disabled selected>Choose one or more categories</option>
              <?php
                $index = 1;
                foreach ($Categories as $categories => $category) {
                  if ($category->getCategoryId() != 0) {
              ?>
                <option value="<?php print_r($index);?>"><?php print_r($category->getName());?></option>
              <?php
                  }
                }
              ?>
            </select>
            <label>Categories</label>
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
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</html>
