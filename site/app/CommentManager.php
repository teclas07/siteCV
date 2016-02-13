<?php
abstract class CommentManager {

  abstract protected function add(Comment $comment);
  abstract public function count();
  abstract public function delete($comment_id);
  abstract public function getList($begin = -1, $limit = -1);
  abstract public function getUnique($comment_id);

  public function save(Comment $comment)
  {
    if ($comment->isValid()) {
      $comment->isNew() ? $this->add($comment) : $this->update($comment);
    } else {
      throw new RuntimeException('Le commentaire doit être valide pour être enregistrée');
    }
  }
  abstract protected function update(Comment $comment);
}
?>
