<?php
  class User {

    protected $user_id,
              $login,
              $email,
              $password,
              $registration_date,
              $profile_picture_url,
              $active,
              $errors = [],
              $errorsValue = array(0 => "", 1 => "Le login doit être valide.", 2 => "Le login que vous avez choisi est déjà utilisé.",
              3 => "Vous n'avez pas saisi une adresse email valide.", 4 => "L'adresse email que vous avez saisi est déjà utilisé.",
              5 => "Le mot de passe doit faire au moins six caractères.", 6 => "Les mots de passes ne correspondent pas.");

    const INVALID_LOGIN = 1;
    const LOGIN_ALREADY_USED = 2;
    const INVALID_EMAIL = 3;
    const EMAIL_ALREADY_USED = 4;
    const INVALID_PASSWORD = 5;
    const PASSWORD_CONFIRMATION = 6;

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
      $db = DBFactory::getMysqlConnectionWithPDO();
      $UserManager = new UserManagerPDO($db);

      if (!is_string($login) || empty($login)) {
        $this->errors[] = self::INVALID_LOGIN;
      } else {
        if ($UserManager->getUniqueByLogin($login) != false) {
          $this->errors[] = self::LOGIN_ALREADY_USED;
        } else {
          $this->login = $login;
        }
      }
    }

    public function setEmail($email) {
      $db = DBFactory::getMysqlConnectionWithPDO();
      $UserManager = new UserManagerPDO($db);

      if (!is_string($email) || empty($email)) {
        $this->errors[] = self::INVALID_EMAIL;
      } else {
        if ($UserManager->getUniqueByEmail($email) != false) {
          $this->errors[] = self::EMAIL_ALREADY_USED;
        } else {
          $this->email = $email;
        }
      }
    }

    public function setPassword($password, $confirm) {
      if (!is_string($password) || empty($password) || strlen($password) < 6) {
        $this->errors[] = self::INVALID_PASSWORD;
      } else {
        if ($password != $confirm) {
          $this->errors[] = self::PASSWORD_CONFIRMATION;
        } else {
          $this->password = md5($password);
        }
      }
    }

    public function setRegistrationDate($registrationDate) {
      $this->registration_date = $registrationDate;
    }

    public function setProfilePictureUrl($profilePictureUrl) {
      $this->profile_picture_url = $profilePictureUrl;
    }

    public function setActive($active) {
      $this->active = $active;
    }
    public function setErrors($errors) {
      $this->errors = $errors;
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

    public function getProfilePictureUrl() {
      return $this->profile_picture_url;
    }

    public function getActive() {
      return $this->active;
    }
    public function getErrors() {
      return $this->errors;
    }

    public function getError($errorCode) {
      return $this->errorsValue[$errorCode];
    }
}

?>
