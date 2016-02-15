<?php
abstract class UserConfirmationManager {

  abstract protected function add(UserConfirmation $userConfirmation);
  abstract public function count();
  abstract public function delete($confirmation_id);
  abstract public function getUnique($confirmation_id);

  public function save(UserConfirmation $userConfirmation)
  {
    if ($userConfirmation->isValid()) {
      $userConfirmation->isNew() ? $this->add($userConfirmation) : $this->update($userConfirmation);
    } else {
      throw new RuntimeException('La confirmation doit être valide pour être enregistrée');
    }
  }
}
?>
