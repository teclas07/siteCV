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
      } catch (Exception $error) {
        die("Impossible de se connecter: " . $error->getMessage());
      }
    }

    function __destruct() {
        $this->dbh = null;
    }

    /** TABLES CREATIONS **/
    function createBlogTable() {
      try {
        $this->dbh->query('
          CREATE TABLE IF NOT EXISTS `blog` (
            `artilce_id` int(11) NOT NULL AUTO_INCREMENT,
            `titre` varchar(128) NOT NULL,
            `contenu` text NOT NULL,
            `date` datetime NOT NULL,
            `auteur_id` int(11) NOT NULL,
            PRIMARY KEY (`artilce_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2'
        );
        print_r("Table 'Blog' créée.");
      } catch (Exception $error) {
        die("Impossible de créer la table 'Blog': " . $error->getMessage());
      }
    }

    function createAuteurTable() {
      try {
        $this->dbh->query('
          CREATE TABLE IF NOT EXISTS `auteur` (
          `auteur_id` int(11) NOT NULL AUTO_INCREMENT,
          `username` varchar(25) NOT NULL,
          `biographie` text NOT NULL,
          `signaute` varchar(128) NOT NULL,
          PRIMARY KEY (`auteur_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2
          '
        );
        print_r("Table 'Auteur' créée.");
      } catch (Exception $error) {
        die("Impossible de créer la table 'Auteur': " . $error->getMessage());
      }
    }

    function createCommentaireTable() {
      try {
        $this->dbh->query('
        CREATE TABLE IF NOT EXISTS `commentaire` (
          `commentaire_id` int(11) NOT NULL AUTO_INCREMENT,
          `article_id` int(11) NOT NULL,
          `user_id` int(11) NOT NULL,
          `contenu` text NOT NULL,
          `date` datetime NOT NULL,
          PRIMARY KEY (`commentaire_id`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2'
        );
        print_r("Table 'Commentaire' créée.");
      } catch (Exception $error) {
        die("Impossible de créer la table 'Commentaire': " . $error->getMessage());
      }
    }

    function createUtilisateurTable() {
      try {
        $this->dbh->query('
          CREATE TABLE IF NOT EXISTS `utilisateur` (
          `user_id` int(11) NOT NULL AUTO_INCREMENT,
          `username` varchar(25) NOT NULL,
          `password` char(32) NOT NULL,
          `email` varchar(255) NOT NULL,
          PRIMARY KEY (`user_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2'
        );
        print_r("Table 'Utilisateur' créée.");
      } catch (Exception $error) {
        die("Impossible de créer la table 'Utilisateur': " . $error->getMessage());
      }
    }


    //********//
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
