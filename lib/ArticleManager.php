<?php
abstract class ArticleManager {

  abstract protected function add(Article $article);
  abstract public function count();
  abstract public function delete($article_id);
  abstract public function getList($begin = -1, $limit = -1);
  abstract public function getUnique($article_id);

  public function save(Article $article)
  {
    if ($article->isValid()) {
      $article->isNew() ? $this->add($article) : $this->update($article);
    } else {
      throw new RuntimeException('La news doit être valide pour être enregistrée');
    }
  }
  abstract protected function update(Article $article);
}
?>
