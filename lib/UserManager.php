<?php
abstract class UserManager {

  abstract protected function add(User $user);
  abstract public function count();
  abstract public function delete($user_id);
  abstract public function getList($begin = -1, $limit = -1);
  abstract public function getUnique($user_id);

  public function save(User $user)
  {
    if ($user->isValid()) {
      $user->isNew() ? $this->add($user) : $this->update($user);
    } else {
      throw new RuntimeException('L\'utilisateur doit être valide pour être enregistrée');
    }
  }
  abstract protected function update(User $user);
}
?>
