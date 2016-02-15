<?php
class CategoryManagerPDO extends CategoryManager
{
  protected $db;
  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  protected function add(Category $category)
  {
    $query = $this->db->prepare('INSERT INTO category SET name = :name, description = :description, creation_date = NOW()');

    $query->bindValue(':name', $category->getTitle());
    $query->bindValue(':description', $category->getContent());

    $query->execute();
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM category')->fetchColumn();
  }


  public function delete($category_id)
  {
    $this->db->exec('DELETE FROM category WHERE category_id = '.(int) $category_id);
  }

  public function getList($begin = -1, $limit = -1)
  {
    $sql = 'SELECT category_id, name, description, creation_date FROM category ORDER BY category_id DESC';


    if ($begin != -1 || $limit != -1)
    {
      $sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $begin;
    }

    $query = $this->db->query($sql);
    $test = $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Category');

    $listeCategory = $query->fetchAll();

    $query->closeCursor();

    return $listeCategory;
  }

  public function getUnique($category_id)
  {
    $query = $this->db->prepare('SELECT category_id, name, description, creation_date FROM category WHERE category_id = :category_id');
    $query->bindValue(':category_id', (int) $category_id, PDO::PARAM_INT);
    $query->execute();

    $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Category');

    $category = $query->fetch();

    return $category;
  }

  protected function update(Category $category)
  {
    $query = $this->db->prepare('UPDATE category SET name = :name, description = :description WHERE category_id = :category_id');

    $query->bindValue(':name', $category->getTitle());
    $query->bindValue(':description', $category->getContent());
    $query->bindValue(':category_id', $category->getCategoryId(), PDO::PARAM_INT);

    $query->execute();
  }
}
