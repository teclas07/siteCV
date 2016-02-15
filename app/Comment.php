<?php
class Comment {
  protected $comment_id,
            $article_id,
            $user_id,
            $content,
            $post_timestamp,
            $edit_timestamp,
            $error = [];

  const INVALID_CONTENT = 1;

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

  public function setArticleId($articleId) {
    $this->article_id = $articleId;
  }
  public function setUserId($userId) {
    $this->user_id = $userId;
  }

  public function setContent($content) {
    if (!is_string($content) || empty($content)) {
      $this->erreurs[] = self::INVALID_CONTENT;
    } else {
      $this->content = $content;
    }
  }

  public function setPostTimestamp($postTimestamp) {
    $this->post_timestamp = $postTimestamp;
  }

  public function setEditTimestamp($editTimespam) {
    $this->edit_timestamp = $editTimespam;
  }

  public function getArticleId() {
    return $this->article_id;
  }
  public function getUserId() {
    return $this->user_id;
  }

  public function getContent() {
    return $this->content;
  }

  public function getPostTimestamp() {
    return $this->post_timestamp;
  }

  public function getEditTimestamp() {
    return $this->edit_timestamp;
  }
}
?>
