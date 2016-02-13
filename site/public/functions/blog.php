<?php
  session_start();
  $db = DBFactory::getMysqlConnectionWithPDO();
  $ArticleManager = new ArticleManagerPDO($db);
  $AuthorManager = new AuthorManagerPDO($db);
  $CommentManager = new CommentManagerPDO($db);
  $CategoryManager = new CategoryManagerPDO($db);
  $UserManager = new UserManagerPDO($db);
