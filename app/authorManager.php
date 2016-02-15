<?php
abstract class AuthorManager {

  abstract protected function add(Author $author);
  abstract public function count();
  abstract public function delete($author_id);
  abstract public function getList($begin = -1, $limit = -1);
  abstract public function getUnique($author_id);

  public function save(Author $author)
  {
    if ($author->isValid()) {
      $author->isNew() ? $this->add($author) : $this->update($author);
    } else {
      throw new RuntimeException('L\'auteur doit être valide pour être enregistrée');
    }
  }
  abstract protected function update(Author $author);
}
?>
