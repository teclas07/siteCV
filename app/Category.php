<?php
  class Category {
    protected $category_id,
              $name,
              $desciption,
              $creation_date,
              $errors = [];
    const INVALID_NAME = 1;
    const INVALID_DESCRIPTION = 2;

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

    public function isnew() {
			return empty($this->category_id);
		}

		public function isValid() {
			return !(empty($this->name) || empty($this->description));
		}

    public function setCategoryId($categoryId) {
      $this->category_id = $categoryId;
    }

    public function setName($name) {
      $this->name = $name;
    }

    public function setDescription($description) {
      $this->description = $description;
    }

    public function setCreationDate($creationDate) {
      $this->creationDate = $creationDate;
    }

    public function setErrors($errors) {
      $this->errors = $errors;
    }

    public function getCategoryId() {
      return $this->category_id;
    }

    public function getName() {
      return $this->name;
    }

    public function getDescription() {
      return $this->description;
    }

    public function getCreationDate() {
      return $this->creationDate;
    }

    public function getErrors() {
      return $errors;
    }
  }
 ?>
