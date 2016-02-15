<?php
class UserConfirmationManagerPDO extends UserConfirmationManager
{
  protected $db;
  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  protected function add(UserConfirmation $user_confirmation)
  {
    $query = $this->db->prepare('INSERT INTO user_confirmation SET confirmation_id =:confirmation_id, login = :login, email = :email, token = :token');

    $query->bindValue(':confirmation_id', $user_confirmation->getConfirmationId());
    $query->bindValue(':login', $user_confirmation->getLogin());
    $query->bindValue(':email', $user_confirmation->getEmail());
    $query->bindValue(':token', $user_confirmation->getToken());
    $query->execute();
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM user_confirmation')->fetchColumn();
  }


  public function delete($confirmation_id)
  {
    $this->db->exec('DELETE FROM user_confirmation WHERE confirmation_id = '.(int) $confirmation_id);
  }

  public function getUnique($confirmation_id)
  {
    $query = $this->db->prepare('SELECT confirmation_id, login, email, token FROM user_confirmation WHERE confirmation_id = :confirmation_id');
    $query->bindValue(':confirmation_id', (int) $confirmation_id, PDO::PARAM_INT);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'UserConfirmation');

    $user_confirmation = $query->fetch();

    return $user_confirmation;
  }

  public function getUniqueByLogin($login)
  {
    $query = $this->db->prepare('SELECT confirmation_id, login, email, token FROM user_confirmation WHERE login = :login');
    $query->bindValue(':login', $login);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'UserConfirmation');

    $user_confirmation = $query->fetch();

    return $user_confirmation;
  }
}
