<?php
	class Article {
		public $errors = [],
							$artilce_id,
							$title,
							$content,
							$post_timestamp,
							$edit_timestamp,
							$category_id,
							$author_id;


		const INVALID_AUTHOR = 1;
		const INVALID_TITLE = 2;
		const INVALID_CONTENT = 3;

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

		public function setArticleId($artilceId) {
			$this->article_id = (int) $articleId;
		}

		public 	function setTitle($title) {
			if (!is_string($title) || empty($title)) {
				$this->erreurs[] = self::INVALID_TITLE;
			} else {
				$this->title = $title;
			}
		}

		public function setContent($content) {
			if (!is_string($content) || empty($content)) {
				$this->erreurs[] = self::INVALID_CONTENT;
			} else {
				$this->content = $content;
			}
		}

		public function setPostTimestamp(DateTime $postTimestamp) {
			$this->post_timestamp = $postTimestamp;
		}

		public function setEditTimestamp(DateTime $editTimespam) {
			$this->edit_timestamp = $editTimespam;
		}

		public function setAuthorId($authorId) {
			$this->author_id = $authorId;
		}

		public function getErrors() {
			return $this->errors;
		}

		public function getArticleId() {
			return $this->article_id;
		}

		public function getTitle() {
			return $this->title;
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

		public function getAuthorId() {
			return $this->author_id;
		}
	}
?>