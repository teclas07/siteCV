<?php
class UserManagerPDO extends UserManager
{
  protected $db;
  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  protected function add(User $user)
  {
    $query = $this->db->prepare('INSERT INTO user SET user_id = :user_id, login = :login, email = :email, password =:password,
       profile_picture_url =:profile_picture_url, registration_date = NOW()');

    $query->bindValue(':user_id', $user->getuserId());
    $query->bindValue(':login', $user->getLogin());
    $query->bindValue(':email', $user->getEmail());
    $query->bindValue(':password', $user->getPassword());
    $query->bindValue(':profile_picture_url', $user->getProfilePictureUrl());
    $query->execute();
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM user')->fetchColumn();
  }


  public function delete($user_id)
  {
    $this->db->exec('DELETE FROM user WHERE user_id = '.(int) $user_id);
  }

  public function getList($begin = -1, $limit = -1)
  {
    $sql = 'SELECT user_id, login, email, password, registration_date, profile_picture_url, active FROM user ORDER BY user_id DESC';


    if ($begin != -1 || $limit != -1)
    {
      $sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $begin;
    }

    $query = $this->db->query($sql);
    $test = $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

    $listeUser = $query->fetchAll();

    $query->closeCursor();

    return $listeUser;
  }

  public function getUnique($user_id)
  {
    $query = $this->db->prepare('SELECT user_id, login, email, password, registration_date, profile_picture_url, active FROM user WHERE user_id = :user_id');
    $query->bindValue(':user_id', (int) $user_id, PDO::PARAM_INT);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

    $user = $query->fetch();

    return $user;
  }

  public function getUniqueByLogin($login)
  {
    $query = $this->db->prepare('SELECT user_id, login, email, password, registration_date, profile_picture_url, active FROM user WHERE login LIKE :login');
    $query->bindValue(':login', $login);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

    $user = $query->fetch();

    return $user;
  }

  public function getUniqueByEmail($email)
  {
    $query = $this->db->prepare('SELECT user_id, login, email, password, registration_date, profile_picture_url, active FROM user WHERE email LIKE  :email');
    $query->bindValue(':email', $email);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

    $user = $query->fetch();

    return $user;
  }

  protected function update(User $user)
  {
    $query = $this->db->prepare('UPDATE user SET user_id = :user_id, login = :login,
       email = :email, password =:password, profile_picture_url =:profile_picture_url, active =:active WHERE user_id = :user_id');

    $query->bindValue(':user_id', $user->getUserId(), PDO::PARAM_INT);
    $query->bindValue(':login', $user->getLogin());
    $query->bindValue(':email', $user->getEmail());
    $query->bindValue(':password', $user->getPassword());
    $query->bindValue(':profile_picture_url', $user->getProfilePictureUrl());
    $query->bindValue(':active', $user->getActive());
    $query->execute();
  }
}
