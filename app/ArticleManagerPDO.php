<?php
class ArticleManagerPDO extends ArticleManager
{
  protected $db;
  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  protected function add(Article $article)
  {
    $query = $this->db->prepare('INSERT INTO article SET author_id = :author_id, title = :title, content = :content, post_timestamp = NOW(), category_id = :category_id');

    $query->bindValue(':title', $article->getTitle());
    $query->bindValue(':author_id', $article->getAuthorId());
    $query->bindValue(':content', $article->getContent());
    $query->bindvalue(':category_id', $article->getCategoryId());
    $query->execute();
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM article')->fetchColumn();
  }


  public function delete($article_id)
  {
    $this->db->exec('DELETE FROM article WHERE article_id = '.(int) $article_id);
  }

  public function getList($begin = -1, $limit = -1)
  {
    $sql = 'SELECT article_id, author_id, title, content, post_timestamp, edit_timestamp, category_id FROM article ORDER BY article_id DESC';


    if ($begin != -1 || $limit != -1)
    {
      $sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $begin;
    }

    $query = $this->db->query($sql);
    $test = $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Article');

    $listeArticle = $query->fetchAll();

    $query->closeCursor();

    return $listeArticle;
  }

  public function getUnique($article_id)
  {
    $query = $this->db->prepare('SELECT article_id, author_id, title, content, post_timestamp, edit_timestamp, category_id FROM article WHERE article_id = :article_id');
    $query->bindValue(':article_id', (int) $article_id, PDO::PARAM_INT);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Article');

    $article = $query->fetch();

    return $article;
  }

  protected function update(Article $article)
  {
    $query = $this->db->prepare('UPDATE article SET author_id = :author_id, title = :title, content = :content, edit_timestamp = NOW(), category_id = :category_id WHERE article_id = :article_id');

    $query->bindValue(':title', $article->getTitle());
    $query->bindValue(':author_id', $article->getAuthorId());
    $query->bindValue(':content', $article->getContent());
    $query->bindvalue(':category_id', $article->getCategoryId());
    $query->bindValue(':article_id', $article->getArticleId(), PDO::PARAM_INT);

    $query->execute();
  }
}
