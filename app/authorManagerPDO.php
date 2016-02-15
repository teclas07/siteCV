<?php
class AuthorManagerPDO extends AuthorManager
{
  protected $db;
  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  protected function add(Author $author)
  {
    $query = $this->db->prepare('INSERT INTO author SET author_id = :author_id, username = :username, password = :password, biography =:biography');

    $query->bindValue(':username', $author->getUsername());
    $query->bindValue(':author_id', $author->getAuthorId());
    $query->bindValue(':password', $author->getPassword());
    $query->bindValue(':biography', $author->getBiography());

    $query->execute();
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM author')->fetchColumn();
  }

  public function delete($author_id)
  {
    $this->db->exec('DELETE FROM author WHERE author_id = '.(int) $author_id);
  }

  public function getList($begin = -1, $limit = -1)
  {
    $sql = 'SELECT author_id, username, password, biography FROM author ORDER BY author_id DESC';


    if ($begin != -1 || $limit != -1)
    {
      $sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $begin;
    }

    $query = $this->db->query($sql);
    $test = $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Author');

    $listeAuthor = $query->fetchAll();

    $query->closeCursor();

    return $listeAuthor;
  }

  public function getUnique($author_id)
  {
    $query = $this->db->prepare('SELECT author_id, author_id, username, password, biography FROM author WHERE author_id = :author_id');
    $query->bindValue(':author_id', (int) $author_id, PDO::PARAM_INT);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Author');

    $author = $query->fetch();

    return $author;
  }

  protected function update(Author $author)
  {
    $query = $this->db->prepare('UPDATE author SET author_id = :author_id, username = :username, password = :password, biography = :biography WHERE author_id = :author_id');

  //  $query->bindValue(':biography' $author->getBiography());
    $query->bindValue(':username', $author->getUsername());
    $query->bindValue(':password', $author->getPassword());
    $query->bindValue(':author_id', $author->author_id(), PDO::PARAM_INT);

    $query->execute();
  }
}
