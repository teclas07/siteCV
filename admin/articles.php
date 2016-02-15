<?php
require '../config.php';

  $db = DBFactory::getMysqlConnectionWithPDO();
  $ArticleManager = new ArticleManagerPDO($db);
  $AuthorManager = new AuthorManagerPDO($db);
  $CategoryManager = new CategoryManagerPDO($db);
  $article = new Article();

  if (isset($_GET['delete'])) {
    $ArticleManager->delete($_GET['delete']);
  }

  if (isset($_POST['add'])) {
    echo($_POST['category']);
    $categoryId;
    if (!isset($_POST['category'])) {
      $categoryId = 0;
    } else {
      $categoryId = $_POST['category'];
    }

    $article->setTitle($_POST['title']);
    $article->setContent($_POST['content']);
    $article->setCategoryId($categoryId);
    $article->setAuthorId(1);

    try {
      $ArticleManager->save($article);
    } catch (Exception $e) {
      echo($e->getMessage());
    } finally {
      $_POST['add'] == null;
    }
  }

  if (isset($_POST['edit'])) {
    $article = $ArticleManager->getUnique($_POST['edit']);
    try {
      $ArticleManager->save($article);
    } catch (Exception $e) {
      echo($e->getMessage());
    } finally {
      $_POST['edit'] == null;
    }
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

  <!-- Compiled and minified JavaScript -->
  <title>Blog</title>
</head>

<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

  <main>
    <a href="add-article.php" class="waves-effect waves-light btn">Add article</a>
    <table>
        <thead>
          <tr>
              <th data-field="article_id">Id</th>
              <th data-field="title">Title</th>
              <th data-field="post_timestamp">Post Timestamp</th>
              <th data-field="edit_timestamp">Edit Timestramp</th>
              <th data-field="author">author</th>
              <th data-field="category">Category</th>
              <th data-field="edit">Edit</th>
              <th data-field="delete">Delete</th>
          </tr>
        </thead>

        <tbody>
          <?php
            foreach ($ArticleManager->getList() as $articles => $article) {
              $author = $AuthorManager->getUnique($article->getAuthorId());
              $category = $CategoryManager->getUnique($article->getCategoryId());
          ?>
          <tr>
            <td><?php print_r($article->getArticleId());?></td>
            <td><?php print_r($article->getTitle());?></td>
            <td><?php print_r($article->getPostTimestamp());?></td>
            <td><?php print_r($article->getEditTimestamp());?></td>
            <td><?php print_r($author->getUsername());?></td>
            <td><?php print_r($category->getName());?></td>
            <td><form action="add-article.php"><button class="waves-effect waves-light btn" name="edit" value="<?php print_r($article->getArticleId());?>">Edit</button></form></td>
            <td><form action="articles.php"><button class="waves-effect waves-light btn" name="delete" value="<?php print_r($article->getArticleId());?>">Delete</button></form></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
  </main>
</boy>
</htlm>
