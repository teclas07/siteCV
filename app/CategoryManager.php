<?php
abstract class CategoryManager {

  abstract protected function add(Category $category);
  abstract public function count();
  abstract public function delete($category_id);
  abstract public function getList($begin = -1, $limit = -1);
  abstract public function getUnique($category_id);

  public function save(Category $category)
  {
    if ($category->isValid()) {
      $category->isNew() ? $this->add($category) : $this->update($category);
    } else {
      throw new RuntimeException('La categorie doit être valide pour être enregistrée');
    }
  }
  abstract protected function update(Category $category);
}
?>
