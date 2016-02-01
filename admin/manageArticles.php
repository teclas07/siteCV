<?php include '../dbb.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Blog</title>
  </head>
  <body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

    <main>
      <div class="row">
        <div class="col s12">
          <table>
            <thead>
              <tr>
                <th data-field="id">Artcile ID</th>
                <th data-field="title">Article title</th>
                <th data-field="author">Author</th>
                <th data-field="date">Date</th>
                <th data-field="edit">Edit</th>
                <th data-field="delete">Delete</th>
              </tr>
              <tbody>
                <?php
                  $conn = new bdd('localhost', 'sitecv', 'root', '');
                  foreach($conn->getAllArticles() as $row) {
                  ?>
                    <tr>
                      <td><?php print_r($row[0]); ?></td>
                      <td><?php print_r($row[1]); ?></td>
                      <td><?php print_r($conn->getAuteurById($row[4])); ?></td>
                      <td><?php print_r($row[3]); ?></td>
                      <td><form action="addArticle.php"><button class="btn waves-effect waves-light" type="submit" name="articleId" value="<?php print_r($row[0]); ?>">Edit</button></form></td>
                      <td><form action="addArticle.php"><button class="btn waves-effect waves-light" type="submit" name="articleId" value="<?php print_r($row[0]); ?>">Supprimer</button></form></td>
                    </tr>
                  <?php
                  }
                ?>
             </tbody>
            </thead>
          </table>
        </div>
      </div>
    </main>

  </body>
</html>
