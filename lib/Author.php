<?php
  class Author {
    var $toto;
    var $tata;
    protected $author_id,
              $username,
              $password,
              $biography,
              $error = [];

    const INVALID_PASSWORD;
    const INVALID_USERNAME;

    public function __constructor() {

    }

    public function setAuthorId($authorId) {
      $this->author_id = $authorId;
    }

    public function setUsername($username) {
      if (!is_string($username) || empty($username)) {
				$this->erreurs[] = self::INVALID_USERNAME;
			} else {
				$this->username = $username;
			}
    }

    public function setPassword($password) {
      $this->password = $password;
    }

    public function setBiography($biography) {
      $this->biography = $biography;
    }

    public function getAuthorId() {
      return $this->author_id;
    }

    public function getUsername() {
      return $this->username;
    }

    public function getPassword() {
      return $this->password;
    }

    public function getBiography() {
      return $this->biography;
    }
}
?>
