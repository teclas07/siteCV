<?php
class CommentManagerPDO extends CommentManager
{
  protected $db;
  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  protected function add(Comment $comment)
  {
    $query = $this->db->prepare('INSERT INTO comment SET article_id = :article_id, user_id = :user_id, content = :content, post_timestamp = :post_timestamp = NOW()');

    $query->bindValue(':article_id', $comment->getArticleId());
    $query->bindValue(':content', $comment->getContent());
    $query->bindValue(':user_id', $comment->getUserId());
    $query->bindValue(':post_timestamp', $comment->getPostTimestamp());

    $query->execute();
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM comment')->fetchColumn();
  }

  public function delete($comment_id)
  {
    $this->db->exec('DELETE FROM comment WHERE comment_id = '.(int) $comment_id);
  }

  public function getList($begin = -1, $limit = -1)
  {
    $sql = 'SELECT article_id, comment_id, user_id, content, post_timestamp, edit_timestamp FROM comment ORDER BY comment_id DESC';


    if ($begin != -1 || $limit != -1)
    {
      $sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $begin;
    }

    $query = $this->db->query($sql);
    $test = $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

    $listeComment = $query->fetchAll();

    $query->closeCursor();

    return $listeComment;
  }

  public function getListByArticleId($begin = -1, $limit = -1, $articleId)
  {
    $sql = 'SELECT article_id, comment_id, user_id, content, post_timestamp, edit_timestamp FROM comment WHERE article_id = '.$articleId.' ORDER BY comment_id DESC';


    if ($begin != -1 || $limit != -1)
    {
      $sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $begin;
    }

    $query = $this->db->query($sql);
    $test = $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

    $listeComment = $query->fetchAll();

    $query->closeCursor();

    return $listeComment;
  }

  public function getAll()
  {
    $sql = 'SELECT comment_id, article_id, user_id, content, post_timestamp, edit_timestamp FROM comment ORDER BY comment_id DESC';

    $query = $this->db->query($sql);
    $test = $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

    $listeComment = $query->fetchAll();

    $query->closeCursor();

    return $listeComment;
  }

  public function getUnique($comment_id)
  {
    $query = $this->db->prepare('SELECT comment_id, article_id, user_id, content, post_timestamp, edit_timestamp FROM comment WHERE comment_id = :comment_id');
    $query->bindValue(':comment_id', (int) $comment_id, PDO::PARAM_INT);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

    $comment = $query->fetch();

    return $comment;
  }

  protected function update(Comment $comment)
  {
    $query = $this->db->prepare('UPDATE comment SET content = :content, edit_timestamp = NOW() WHERE comment_id = :comment_id');

    $query->bindValue(':content', $comment->getContent());
    $query->bindValue(':comment_id', $comment->comment_id(), PDO::PARAM_INT);

    $query->execute();
  }
}
