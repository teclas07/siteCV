<?php
  class User {

    protected $user_id,
              $login,
              $email,
              $password,
              $registration_date,
              $profile_picture_url,
              $errors = [];

    const INVALID_LOGIN = 1;
    const INVALID_EMAIL = 2;
    const INVALID_PASSWORD = 3;

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
      return empty($this->user_id);
    }

    public function isValid() {
      return !(empty($this->login) || empty($this->email) || empty($this->password));
    }

    public function setUserId($userId) {
      $this->user_id = $userId;
    }

    public function setLogin($login) {
      $this->login = $login;
    }

    public function setEmail($email) {
      $this->email = $email;
    }

    public function setPassword($password) {
      $this->password = $password;
    }

    public function setRegistrationDate($registrationDate) {
      $this->registration_date = $registrationDate;
    }

    public function setPorfilePictureUrl($profilePictureUrl) {
      $this->profile_picture_url = $profilePictureUrl;
    }

    public function getUserId() {
      return $this->user_id;
    }

    public function getLogin() {
      return $this->login;
    }

    public function getEmail() {
      return $this->email;
    }

    public function getPassword() {
      return $this->password;
    }

    public function getRegistrationDate() {
      return $this->registration_date;
    }
}

?>
