<?php
  class UserConfirmation {
    protected $confirmation_id,
              $login,
              $email,
              $token;

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

    public function isnew() {
      return empty($this->confirmation_id);
    }

    public function isValid() {
      return !(empty($this->login) || empty($this->email) || empty($this->token));
    }

    public function getConfirmationId() {
      return $this->confirmation_id;
    }
    public function getLogin() {
      return $this->login;
    }

    public function getEmail() {
      return $this->email;
    }

    public function getToken() {
      return $this->token;
    }

    public function setConfirmationId($confirmationId) {
      $this->confirmation_id = $confirmationId;
    }

    public function setLogin($userId) {
      $this->login = $userId;
    }

    public function setEmail($email) {
      $this->email = $email;
    }

    public function setToken($token) {
      $this->token = $token;
    }
  }
?>
