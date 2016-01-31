<?php
  class bdd {
    var $host;
    var $table;
    var $user;
    var $password;
    var $url;
    var $dbh;

    function __construct($host, $table, $user, $password) {
      $this->host = $host;
      $this->table = $table;
      $this->user = $user;
      $this->password = $password;
      $this->url = 'mysql:host='.$this->host.';dbname='.$this->table;

      try {
        $this->dbh = new PDO($this->url, $this->user, $this->password,
          array(PDO::ATTR_PERSISTENT => true));
      } catch (Exception $e) {
        die("Impossible de se connecter: " . $e->getMessage());
      }
    }

    function __destruct() {
        $this->dbh = null;
    }

    function getAllArticles() {
      return ($this->dbh->query('SELECT * from blog'));
    }

    function getAuteurById($id) {
      $f =  $this->dbh->query('SELECT username from auteur WHERE auteur_id = '.$id)->fetch();
      $result = $f['username'];
      return $result;
    }

    function getNumberOfComment($articleId) {
        $f = $this->dbh->query('SELECT count(*) from commentaire WHERE article_id = '.$articleId);
        $row = $f->fetch(PDO::FETCH_NUM);
        return ($row[0]);
    }

    function getCommentFor($articleId) {
      return ($this->dbh->query('SELECT * from commentaire WHERE article_id = '.$articleId));
    }

    function getUserById($userId) {
      $f = $this->dbh->query('SELECT * from utilisateur WHERE user_id = '.$userId)->fetch();
      $result = $f['username'];
      return $result;
    }
  }
?>
