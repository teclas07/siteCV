<?php
  class Author {
    protected $author_id,
              $username,
              $password,
              $biography,
              $error = [];

    const INVALID_PASSWORD = 1;
    const INVALID_USERNAME = 2;

    public function __constructor($valors = []) {
			if (!empty($valors)) {
				$this->hydrate($valor);
			}
		}

		public function hydrate($datas) {
			foreach ($datas as $attribut => $valor)
			{
				$methode = 'set'.ucfirst($attribut);

				if (is_callable([$this, $methode]))
				{
					$this->$methode($valor);
				}
			}
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
